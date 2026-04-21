import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'
import tailwindcss from '@tailwindcss/vite'
import externalGlobals from 'rollup-plugin-external-globals'
import { resolve, dirname } from 'node:path'
import { fileURLToPath } from 'node:url'
import {
  readdirSync,
  existsSync,
  readFileSync,
  writeFileSync,
  mkdirSync,
  renameSync,
  rmSync,
} from 'node:fs'

const __dirname = dirname(fileURLToPath(import.meta.url))

const SRC = resolve(__dirname, 'src')
const OUT = resolve(__dirname, 'dist')
const BLOCKS_SRC = resolve(SRC, 'blocks')
const BLOCKS_OUT = resolve(OUT, 'blocks')

/**
 * Walks src/blocks/* and returns a Rollup `input` map of per-block CSS:
 *   blocks/<name>/editor -> src/blocks/<name>/editor.scss (or .css)
 *   blocks/<name>/view   -> src/blocks/<name>/view.scss   (or .css)
 *
 * Per-block `style.{scss,css}` is intentionally NOT emitted here — those are
 * aggregated into a single `dist/blocks/index.css` via glob imports inside
 * `src/blocks/index.js`, so one stylesheet covers every block. Per-block JS
 * is likewise aggregated into `dist/blocks/index.js`.
 *
 * `editor` and `view` stay per-block because `block.json` references them
 * individually (they must stay scoped to their specific enqueue context).
 */
function discoverBlockEntries() {
  const out = {}
  if (!existsSync(BLOCKS_SRC)) return out

  for (const dirent of readdirSync(BLOCKS_SRC, { withFileTypes: true })) {
    if (!dirent.isDirectory()) continue
    const name = dirent.name
    const blockDir = resolve(BLOCKS_SRC, name)

    for (const kind of ['editor', 'view']) {
      const scss = resolve(blockDir, `${kind}.scss`)
      const css = resolve(blockDir, `${kind}.css`)
      if (existsSync(scss)) out[`blocks/${name}/${kind}`] = scss
      else if (existsSync(css)) out[`blocks/${name}/${kind}`] = css
    }
  }

  return out
}

/**
 * Copies each src/blocks/<name>/block.json into dist/blocks/<name>/block.json
 * and rewrites any `file:./*.scss` references to `file:./*.css` so WordPress
 * picks up the compiled stylesheets.
 */
function copyBlockManifests() {
  return {
    name: 'olenka:copy-block-manifests',
    apply: 'build',
    closeBundle() {
      if (!existsSync(BLOCKS_SRC)) return

      for (const dirent of readdirSync(BLOCKS_SRC, { withFileTypes: true })) {
        if (!dirent.isDirectory()) continue
        const from = resolve(BLOCKS_SRC, dirent.name, 'block.json')
        if (!existsSync(from)) continue

        const manifest = JSON.parse(readFileSync(from, 'utf8'))
        const styleFields = ['style', 'editorStyle', 'viewStyle']

        for (const field of styleFields) {
          const value = manifest[field]
          if (typeof value === 'string') {
            manifest[field] = value.replace(/\.scss$/i, '.css')
          } else if (Array.isArray(value)) {
            manifest[field] = value.map(v =>
              typeof v === 'string' ? v.replace(/\.scss$/i, '.css') : v
            )
          }
        }

        const destDir = resolve(BLOCKS_OUT, dirent.name)
        mkdirSync(destDir, { recursive: true })
        writeFileSync(
          resolve(destDir, 'block.json'),
          JSON.stringify(manifest, null, 2) + '\n'
        )
      }
    },
  }
}

/**
 * WordPress provides these at runtime as wp.* globals / via script modules,
 * so we never want Rollup to pull them into our bundles.
 */
const wpExternal = [
  /^@wordpress\//,
  'jquery',
  'react',
  'react-dom',
  'react/jsx-runtime',
]

const wpGlobals = {
  '@wordpress/blocks':       'wp.blocks',
  '@wordpress/block-editor': 'wp.blockEditor',
  '@wordpress/components':   'wp.components',
  '@wordpress/element':      'wp.element',
  '@wordpress/i18n':         'wp.i18n',
  '@wordpress/data':         'wp.data',
  '@wordpress/hooks':        'wp.hooks',
  '@wordpress/api-fetch':    'wp.apiFetch',
  '@wordpress/dom-ready':    'wp.domReady',
  '@wordpress/compose':      'wp.compose',
  '@wordpress/primitives':   'wp.primitives',
  jquery:                    'jQuery',
  react:                     'React',
  'react-dom':               'ReactDOM',
  'react/jsx-runtime':       'ReactJSXRuntime',
}

/**
 * Maps each `@wordpress/*` / react package we mark as external to the
 * WordPress script handle that exposes it as a `wp.*` / global. These are
 * used as `wp_enqueue_script()` dependencies so the globals exist before the
 * blocks bundle executes in the editor.
 */
const wpScriptHandles = {
  '@wordpress/blocks':       'wp-blocks',
  '@wordpress/block-editor': 'wp-block-editor',
  '@wordpress/components':   'wp-components',
  '@wordpress/element':      'wp-element',
  '@wordpress/i18n':         'wp-i18n',
  '@wordpress/data':         'wp-data',
  '@wordpress/hooks':        'wp-hooks',
  '@wordpress/api-fetch':    'wp-api-fetch',
  '@wordpress/dom-ready':    'wp-dom-ready',
  '@wordpress/compose':      'wp-compose',
  '@wordpress/primitives':   'wp-primitives',
  react:                     'react',
  'react-dom':               'react-dom',
  'react/jsx-runtime':       'react-jsx-runtime',
}

/**
 * Moves the CSS sibling of `dist/blocks/index.js` from `dist/<name>.css` into
 * `dist/blocks/<name>.css`. Vite's default `assetFileNames` template uses
 * only the basename for CSS emitted from a JS chunk, which would otherwise
 * land the aggregated block stylesheet at `dist/index.css` instead of next
 * to its JS entry. Rolldown forbids mutating the bundle in `generateBundle`,
 * so we rename the file on disk in `closeBundle` after Vite writes it.
 */
function relocateBlocksCss() {
  let importedCss = null

  return {
    name: 'olenka:relocate-blocks-css',
    apply: 'build',
    generateBundle(_options, bundle) {
      const entry = bundle['blocks/index.js']
      if (!entry || entry.type !== 'chunk') return

      const set = entry.viteMetadata?.importedCss
      if (!set || set.size === 0) return

      importedCss = Array.from(set).filter(name => !name.startsWith('blocks/'))
    },
    closeBundle() {
      if (!importedCss || importedCss.length === 0) return

      for (const cssName of importedCss) {
        const from = resolve(OUT, cssName)
        const to = resolve(OUT, 'blocks', cssName)
        if (!existsSync(from)) continue
        mkdirSync(dirname(to), { recursive: true })
        renameSync(from, to)

        // Also relocate the sourcemap if one exists.
        const fromMap = `${from}.map`
        const toMap = `${to}.map`
        if (existsSync(fromMap)) renameSync(fromMap, toMap)
      }

      importedCss = null
    },
  }
}

/**
 * Write the WordPress script-handle dependency list for the blocks bundle
 * to `dist/blocks/index.deps.json` so PHP can read it at enqueue time and
 * keep the handle list in sync with what Vite actually marked as external.
 */
function emitBlocksDepsManifest() {
  return {
    name: 'olenka:emit-blocks-deps',
    apply: 'build',
    closeBundle() {
      const handles = Object.values(wpScriptHandles)
      mkdirSync(BLOCKS_OUT, { recursive: true })
      writeFileSync(
        resolve(BLOCKS_OUT, 'index.deps.json'),
        JSON.stringify(handles, null, 2) + '\n'
      )
    },
  }
}

export default defineConfig({
  plugins: [
    // Allow JSX inside .js files (your blocks use it in edit.js / save.js).
    react({
      include: /\.(js|jsx|ts|tsx)$/,
    }),
    tailwindcss(),
    copyBlockManifests(),
    emitBlocksDepsManifest(),
    relocateBlocksCss(),
  ],

  build: {
    outDir: OUT,
    emptyOutDir: true,
    cssCodeSplit: true,
    manifest: false,
    sourcemap: true,

    rollupOptions: {
      input: {
        // Independent JS bundles.
        frontend:          resolve(SRC, 'frontend/main.js'),
        'frontend-editor': resolve(SRC, 'frontend-editor/main.js'),
        editor:            resolve(SRC, 'editor/main.js'),

        // Standalone Tailwind stylesheet -> dist/style.css
        style:             resolve(SRC, 'style.css'),

        // Aggregated block registrations -> dist/blocks/index.js
        'blocks/index':    resolve(BLOCKS_SRC, 'index.js'),

        // Per-block stylesheets -> dist/blocks/<name>/{style,editor,view}.css
        ...discoverBlockEntries(),
      },

      // Rewrites bare `import ... from "@wordpress/blocks"` (and similar)
      // into references to the matching `wp.*` / React globals that
      // WordPress already exposes at runtime. This must run before Rollup's
      // externality checks so the specifiers never reach the browser.
      plugins: [externalGlobals(wpGlobals)],

      // Anything not rewritten by `externalGlobals` must still be declared
      // external so Rollup doesn't try to bundle it; an unmapped WordPress
      // package will then surface as a build error instead of a broken
      // runtime import.
      external: wpExternal,

      output: {
        // IIFE-style globals only work with non-ES output, but the
        // `externalGlobals` plugin above rewrites the imports directly, so
        // we keep the ES format and multi-entry layout.
        format: 'es',
        // Preserve nested paths so blocks land in dist/blocks/<name>/...
        entryFileNames: '[name].js',
        chunkFileNames: 'chunks/[name]-[hash].js',
        assetFileNames: '[name][extname]',
      },
    },
  },
})
