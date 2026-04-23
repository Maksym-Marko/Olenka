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
  copyFileSync,
} from 'node:fs'

const __dirname = dirname(fileURLToPath(import.meta.url))

const SRC = resolve(__dirname, 'src')
const OUT = resolve(__dirname, 'dist')
const BLOCKS_SRC = resolve(SRC, 'blocks')
const BLOCKS_OUT = resolve(OUT, 'blocks')

/**
 * Walks src/blocks/* and returns a Rollup `input` map of per-block CSS:
 *   blocks/<name>/view -> src/blocks/<name>/view.scss (or .css)
 *
 * Per-block `style.{scss,css}` and `editor.{scss,css}` are intentionally NOT
 * emitted here — they are aggregated into single stylesheets via glob imports
 * inside `src/blocks/index.js` (frontend + editor) and `src/blocks/editor.js`
 * (editor only), producing `dist/blocks/index.css` and `dist/blocks/editor.css`
 * respectively. Per-block JS is likewise aggregated into `dist/blocks/index.js`.
 *
 * `view` stays per-block because `block.json` references it individually
 * (it must stay scoped to its specific enqueue context).
 */
function discoverBlockEntries() {
  const out = {}
  if (!existsSync(BLOCKS_SRC)) return out

  for (const dirent of readdirSync(BLOCKS_SRC, { withFileTypes: true })) {
    if (!dirent.isDirectory()) continue
    const name = dirent.name
    const blockDir = resolve(BLOCKS_SRC, name)

    for (const kind of ['view']) {
      const scss = resolve(blockDir, `${kind}.scss`)
      const css = resolve(blockDir, `${kind}.css`)
      if (existsSync(scss)) out[`blocks/${name}/${kind}`] = scss
      else if (existsSync(css)) out[`blocks/${name}/${kind}`] = css
    }
  }

  return out
}

/**
 * For each `src/blocks/<name>/` source folder:
 *
 *   - Copies `block.json` into `dist/blocks/<name>/block.json`, rewriting any
 *     `file:./*.scss` references to `file:./*.css` so WordPress picks up the
 *     compiled stylesheets.
 *   - Copies every top-level `*.php` file (e.g. `render.php`) verbatim into
 *     the same dist folder, so `register_block_type_from_metadata()` can
 *     resolve `"render": "file:./render.php"` relative to the dist manifest.
 */
function copyBlockManifests() {
  return {
    name: 'olenka:copy-block-manifests',
    apply: 'build',
    closeBundle() {
      if (!existsSync(BLOCKS_SRC)) return

      for (const dirent of readdirSync(BLOCKS_SRC, { withFileTypes: true })) {
        if (!dirent.isDirectory()) continue
        const blockDir = resolve(BLOCKS_SRC, dirent.name)
        const from = resolve(blockDir, 'block.json')
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

        // Copy any PHP files the block ships with (render.php, helpers, etc.)
        // so `file:./*.php` references in block.json resolve correctly against
        // the dist manifest location.
        for (const file of readdirSync(blockDir, { withFileTypes: true })) {
          if (!file.isFile() || !file.name.endsWith('.php')) continue
          copyFileSync(
            resolve(blockDir, file.name),
            resolve(destDir, file.name)
          )
        }
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
  '@wordpress/blocks': 'wp.blocks',
  '@wordpress/block-editor': 'wp.blockEditor',
  '@wordpress/components': 'wp.components',
  '@wordpress/element': 'wp.element',
  '@wordpress/i18n': 'wp.i18n',
  '@wordpress/data': 'wp.data',
  '@wordpress/hooks': 'wp.hooks',
  '@wordpress/api-fetch': 'wp.apiFetch',
  '@wordpress/dom-ready': 'wp.domReady',
  '@wordpress/compose': 'wp.compose',
  '@wordpress/primitives': 'wp.primitives',
  '@wordpress/server-side-render': 'wp.serverSideRender',
  jquery: 'jQuery',
  react: 'React',
  'react-dom': 'ReactDOM',
  'react/jsx-runtime': 'ReactJSXRuntime',
}

/**
 * Maps each `@wordpress/*` / react package we mark as external to the
 * WordPress script handle that exposes it as a `wp.*` / global. These are
 * used as `wp_enqueue_script()` dependencies so the globals exist before the
 * blocks bundle executes in the editor.
 */
const wpScriptHandles = {
  '@wordpress/blocks': 'wp-blocks',
  '@wordpress/block-editor': 'wp-block-editor',
  '@wordpress/components': 'wp-components',
  '@wordpress/element': 'wp-element',
  '@wordpress/i18n': 'wp-i18n',
  '@wordpress/data': 'wp-data',
  '@wordpress/hooks': 'wp-hooks',
  '@wordpress/api-fetch': 'wp-api-fetch',
  '@wordpress/dom-ready': 'wp-dom-ready',
  '@wordpress/compose': 'wp-compose',
  '@wordpress/primitives': 'wp-primitives',
  '@wordpress/server-side-render': 'wp-server-side-render',
  react: 'react',
  'react-dom': 'react-dom',
  'react/jsx-runtime': 'react-jsx-runtime',
}

/**
 * Moves the CSS sibling of `dist/blocks/index.js` from `dist/<name>.css` into
 * `dist/blocks/<name>.css`. Vite's default `assetFileNames` template uses
 * only the basename for CSS emitted from a JS chunk, which would otherwise
 * land the aggregated block stylesheet at `dist/index.css` instead of next
 * to its JS entry. Rolldown forbids mutating the bundle in `generateBundle`,
 * so we collect the names there and rename the files on disk in `closeBundle`
 * after Vite writes them.
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
 * Virtual SCSS aggregator for the editor-only blocks stylesheet.
 *
 * Exposes a virtual module whose content is the concatenation of every
 * per-block `src/blocks/<name>/editor.{scss,css}` source file. Wired up as
 * a CSS-only Rollup input named `blocks/editor` so the compiled output lands
 * at `dist/blocks/editor.css` with no JS sidecar (same pattern Vite already
 * uses for the per-block `view` entries). Editor-only because this file is
 * enqueued by PHP exclusively on `enqueue_block_editor_assets`.
 *
 * The entire aggregator's source is emitted inline (rather than via `@use`
 * / `@import`) so Sass doesn't have to resolve a virtual module's relative
 * imports — works uniformly for `.scss` and `.css` inputs.
 *
 * The `load` hook registers every discovered source (and the blocks root)
 * as a watch dependency via `this.addWatchFile` so edits to any block's
 * `editor.scss` / `editor.css` — or adding a new block folder — invalidate
 * the virtual module and retrigger a rebuild. Without this, Vite has no
 * idea the virtual module depends on those files and changes go unnoticed.
 */
const BLOCKS_EDITOR_VIRTUAL_ID = 'virtual:olenka-blocks-editor.scss'

function blocksEditorAggregator() {
  return {
    name: 'olenka:blocks-editor-aggregator',
    resolveId(id) {
      if (id === BLOCKS_EDITOR_VIRTUAL_ID) return BLOCKS_EDITOR_VIRTUAL_ID
    },
    load(id) {
      if (id !== BLOCKS_EDITOR_VIRTUAL_ID) return

      if (!existsSync(BLOCKS_SRC)) return '/* no blocks discovered */\n'

      // Watch the blocks root so new/removed block folders trigger a reload.
      this.addWatchFile(BLOCKS_SRC)

      const chunks = []
      for (const dirent of readdirSync(BLOCKS_SRC, { withFileTypes: true })) {
        if (!dirent.isDirectory()) continue
        const scss = resolve(BLOCKS_SRC, dirent.name, 'editor.scss')
        const css = resolve(BLOCKS_SRC, dirent.name, 'editor.css')

        // Watch both potential filenames even when missing, so creating
        // `editor.scss` in a block folder (where it didn't exist before)
        // also triggers a rebuild.
        this.addWatchFile(scss)
        this.addWatchFile(css)

        const file = existsSync(scss) ? scss : existsSync(css) ? css : null
        if (!file) continue
        chunks.push(`/* ${dirent.name}/${file.endsWith('.scss') ? 'editor.scss' : 'editor.css'} */\n${readFileSync(file, 'utf8')}`)
      }

      return chunks.join('\n\n') + '\n'
    },
  }
}

/**
 * Wraps every JS chunk in an IIFE so minified local variable names (like `_`,
 * `$`, `e`, `t`, …) never leak into the global scope. Without this, the
 * minifier can choose `_` for a local variable and silently overwrite
 * WordPress's global Underscore.js, causing `_.isArray is not a function` in
 * wp-backbone / media-views.
 */
function wrapChunksInIife() {
  return {
    name: 'olenka:wrap-iife',
    apply: 'build',
    generateBundle(_options, bundle) {
      for (const chunk of Object.values(bundle)) {
        if (chunk.type !== 'chunk') continue

        // The sourcemap comment (`//# sourceMappingURL=...`) must stay on its
        // own line AFTER the IIFE closer. If we naively appended `})();`
        // to `chunk.code`, it would land on the same line as the `//` comment
        // and get swallowed by it, leaving the IIFE unterminated
        // ("Unexpected end of input" at runtime). So we split the trailing
        // sourcemap comment off, close the IIFE, then re-append the comment.
        let body = chunk.code
        let trailer = ''
        const sourceMapRe = /\n?\/\/# sourceMappingURL=[^\n]*\n?$/
        const match = body.match(sourceMapRe)
        if (match) {
          body = body.slice(0, match.index)
          trailer = match[0].startsWith('\n') ? match[0] : `\n${match[0]}`
          if (!trailer.endsWith('\n')) trailer += '\n'
        }

        if (!body.endsWith('\n')) body += '\n'
        chunk.code = `;(function(){\n${body}})();${trailer || '\n'}`
      }
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
    blocksEditorAggregator(),
    relocateBlocksCss(),
    wrapChunksInIife(),
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
        frontend: resolve(SRC, 'frontend/main.js'),
        'frontend-editor': resolve(SRC, 'frontend-editor/main.js'),
        editor: resolve(SRC, 'editor/main.js'),
        admin: resolve(SRC, 'admin/main.js'),

        // Standalone Tailwind stylesheet -> dist/style.css
        style: resolve(SRC, 'style.css'),

        // Aggregated block registrations -> dist/blocks/index.js (+ index.css
        // containing every per-block `style.{scss,css}`, shared frontend + editor).
        'blocks/index': resolve(BLOCKS_SRC, 'index.js'),

        // Aggregated editor-only stylesheet -> dist/blocks/editor.css
        // (virtual SCSS module, see `blocksEditorAggregator`).
        'blocks/editor': BLOCKS_EDITOR_VIRTUAL_ID,

        // Per-block stylesheets -> dist/blocks/<name>/view.css
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
