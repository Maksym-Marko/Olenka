# Olenka

## Project Overview

Olenka is a **WordPress block theme (Full Site Editing) starter kit**. It is a developer boilerplate, not an application: projects are built by forking this theme and extending it. The stack combines Composer PSR-4 autoloading for PHP, a Vite build for JS/CSS, Tailwind CSS v4, and custom Gutenberg blocks alongside standard FSE templates, parts, patterns, and style variations.

Because it is a starter kit, **the existing code is the specification**. When adding or changing anything, first read the closest existing example and mirror its structure. Do not introduce new architectures, build tools, or conventions.

## Tech Stack

- **PHP** 8.0+ (`composer.json` requires `php >=8.0`; note `style.css` still says "Requires PHP 7.4" — treat 8.0+ as the real floor).
- **WordPress** 6.0+, block theme / FSE (`theme.json` version 3).
- **Composer** — PSR-4 autoloading only, no runtime PHP dependencies.
- **Node.js** 20.19+ or 22.12+ / npm (required by Vite 8).
- **Vite** 8 (Rolldown-based) with `@vitejs/plugin-react`, `rollup-plugin-external-globals`, `sass`.
- **Tailwind CSS v4** via `@tailwindcss/vite`.
- **React/JSX** for block editor code (provided by WordPress at runtime, not bundled).

## Project Structure

```
Olenka/
├── inc/                     # PHP source (PSR-4: OLENKA\ → inc/)
│   ├── OlenkaThemeStarterKit.php   # bootstrap class
│   └── Hooks/
│       ├── EnqueueScripts.php      # all script/style enqueueing
│       └── GutenbergBlocks.php     # block registration + categories
├── src/                     # ALL editable JS/SCSS/block source
│   ├── style.css                   # Tailwind entry (@theme tokens) → dist/style.css
│   ├── index.js                    # placeholder ("Silence is golden")
│   ├── frontend/                   # frontend JS+CSS bundle
│   ├── frontend-editor/            # bundle loaded on frontend AND editor
│   ├── editor/                     # editor-only bundle (admin editor screen)
│   ├── admin/                      # wp-admin bundle
│   ├── assets/css/                 # shared SCSS (frontend.scss, contact-form-7.scss)
│   └── blocks/                     # Gutenberg block sources (one folder per block)
│       ├── index.js                # auto-aggregates every block's index + style
│       └── <block-name>/           # block.json, edit.jsx, save.jsx|render.php, *.scss
├── templates/               # FSE block templates (*.html)
├── parts/                   # template parts: header.html, footer.html
├── patterns/                # block patterns (*.php with header docblock)
├── styles/                  # theme style variations: funky/royal/serious.json
├── assets/                  # static fonts + images (referenced by PHP/blocks)
├── dist/                    # GENERATED build output (git-ignored) — never edit
├── vendor/                  # GENERATED Composer autoloader (git-ignored)
├── node_modules/            # GENERATED npm deps (git-ignored)
├── functions.php            # loads vendor autoload, boots OlenkaThemeStarterKit
├── theme.json               # global design tokens, settings, customTemplates
├── style.css                # WordPress theme header (metadata only)
├── vite.config.js           # build pipeline (block discovery/aggregation logic)
├── composer.json            # PSR-4 autoload config
└── package.json             # npm scripts (dev/build)
```

## Source vs Generated Files

**Edit only source. Never hand-edit generated output — it is overwritten on every build and is git-ignored.**

- **Source (edit these):** everything in `src/`, `inc/`, `templates/`, `parts/`, `patterns/`, `styles/`, `assets/`, plus `theme.json`, `functions.php`, `composer.json`, `package.json`, `vite.config.js`.
- **Generated (never edit):**
  - `dist/` — entire folder is Vite output. Includes `dist/blocks/*/block.json` (copied + rewritten from `src`), `dist/blocks/index.{js,css}`, `dist/blocks/editor.css`, `dist/blocks/index.deps.json`, `dist/{frontend,frontend-editor,editor,admin,style}.{js,css}`.
  - `vendor/` — Composer autoloader (regenerate with `composer dump-autoload`).
  - `node_modules/` — npm packages.

`.gitignore` excludes `vendor/`, `node_modules/`, `dist/`, `build/`, `*.min.css`, `*.min.js`. A fresh checkout has **none** of these — the theme will not render blocks or load assets until dependencies are installed and `npm run build` has run at least once.

## PHP Architecture

- **Autoloading:** PSR-4, `"OLENKA\\": "inc/"` (see `composer.json`). `optimize-autoloader` is on. Class file paths mirror the namespace: `OLENKA\Hooks\EnqueueScripts` → `inc/Hooks/EnqueueScripts.php`.
- **Bootstrap:** `functions.php` → `require vendor/autoload.php`, defines `OLENKA_THEME_VERSION` from the theme header, then `new \OLENKA\OlenkaThemeStarterKit()`.
- **Root class:** `inc/OlenkaThemeStarterKit.php` (namespace `OLENKA`) instantiates each hook class in its constructor. **To wire up new functionality, add a class under `inc/` and instantiate it here** — follow the existing `new EnqueueScripts(); new GutenbergBlocks();` pattern.
- **Hook classes:** live in `inc/Hooks/` (namespace `OLENKA\Hooks`). Each class registers its own `add_action`/`add_filter` calls inside its constructor and exposes public callback methods. Keep hooks grouped by concern in a dedicated class rather than adding loose functions to `functions.php`.
- **Enqueueing:** ALL asset enqueueing lives in `inc/Hooks/EnqueueScripts.php`. Every enqueue guards with `file_exists()` and versions the asset with `filemtime()`. Handles are prefixed `olenka-`. The mapping is:
  - `frontendAssets` (`wp_enqueue_scripts`) → `dist/frontend.{css,js}` (JS depends on `jquery`).
  - `editorAssets` (`enqueue_block_assets`, admin only) → `dist/editor.{css,js}`.
  - `editorFrontendAssets` (`enqueue_block_assets`) → `dist/style.css` (Tailwind), `dist/frontend-editor.{css,js}`, `dist/blocks/index.css` — loaded on **both** frontend and editor.
  - `blockEditorAssets` (`enqueue_block_assets`) → `dist/blocks/index.js` (deps read from `dist/blocks/index.deps.json`) and `dist/blocks/editor.css`.
  - `adminAssets` (`admin_enqueue_scripts`) → `dist/admin.{css,js}`.
- **Block registration:** `inc/Hooks/GutenbergBlocks.php` on `init` globs `dist/blocks/*/block.json` and calls `register_block_type_from_metadata()` on each. **Blocks are registered from `dist/`, not `src/`** — a block does not exist to WordPress until `npm run build` has produced its `dist/blocks/<name>/block.json`. Same class also registers the `olenka-general` block category (via `block_categories_all`) and sets a dynamic default (`imageUrl`) for `olenka/about` via the `block_type_metadata` filter.
- **Composer-generated files** (`vendor/`) must never be edited manually; regenerate with `composer dump-autoload`.

## Gutenberg Block Architecture

Blocks live one-folder-per-block under `src/blocks/<name>/`. There are two kinds actually present in this repo:

- **Static blocks** (`save.jsx` renders HTML saved into post content): `badge`, `cta`, `hero-section`, `inner-box`, `text-with-boxes-wrapper`, `about`.
- **Dynamic / server-rendered blocks** (`render.php` renders on the server, **no `save.jsx`**): `recent-posts`, `html-tester`.

There are currently **no per-block frontend-interactive `view.js` scripts**, though the build supports per-block `view.{scss,css}` stylesheets (compiled to `dist/blocks/<name>/view.css` and referenced individually by `block.json`).

### Standard block files

| File | Purpose | Static | Dynamic |
|---|---|---|---|
| `block.json` | Metadata, `apiVersion: 3`, `name: olenka/<slug>`, `category: olenka-general` | ✅ | ✅ |
| `index.js` | Calls `registerBlockType(metadata, {...})` | ✅ | ✅ |
| `edit.jsx` | Editor React component (default export) | ✅ | ✅ |
| `save.jsx` | Serialized frontend markup | ✅ | ❌ (omit) |
| `render.php` | Server-rendered frontend markup | ❌ | ✅ (`"render": "file:./render.php"`) |
| `style.scss` | Frontend + editor styles, aggregated into `dist/blocks/index.css` | optional | optional |
| `editor.scss` | Editor-only styles, aggregated into `dist/blocks/editor.css` | optional | optional |
| `view.{scss,css}` | Per-block scoped stylesheet → `dist/blocks/<name>/view.css` (referenced in `block.json`) | optional | optional |

### How block assets are discovered and compiled (see `vite.config.js`)

- `src/blocks/index.js` uses `import.meta.glob('./*/index.{js,jsx}')` to auto-register **every** block, and globs every `./*/style.{scss,css}` — so a new block folder is picked up automatically with **no edits to any aggregator file**. Its JS registrations bundle into `dist/blocks/index.js`; its `style.scss` files aggregate into `dist/blocks/index.css`.
- Every block's `editor.scss` is aggregated (via a virtual module) into `dist/blocks/editor.css`.
- `copyBlockManifests` copies each `src/blocks/<name>/block.json` into `dist/blocks/<name>/`, rewriting `.scss` references in `style`/`editorStyle`/`viewStyle` to `.css`, and copies any `*.php` (e.g. `render.php`) into the same dist folder.
- WordPress packages (`@wordpress/*`, `react`, `react-dom`, `jquery`) are marked external and rewritten to `wp.*` / globals; their script handles are written to `dist/blocks/index.deps.json` and used as enqueue dependencies.

### Static-block editor patterns actually used

Import from `@wordpress/blocks`, `@wordpress/block-editor` (`useBlockProps`, `RichText`, `InspectorControls`, `PanelColorSettings`, `InnerBlocks`), `@wordpress/components`, and `@wordpress/i18n` (`__`). Tailwind utility classes are applied directly in `className` in both `edit.jsx` and `save.jsx`. `save.jsx` uses `useBlockProps.save()` and `RichText.Content`.

### block.json conventions (match the neighbors)

Static blocks include `$schema`, `apiVersion: 3`, `version`, `textdomain: "olenka"`, `icon`, `category: "olenka-general"`, and usually `supports.html: false`. Dynamic blocks are more minimal and add `"render": "file:./render.php"`. Do **not** declare `style`/`editorStyle` for aggregated styles — aggregation happens automatically from `style.scss`/`editor.scss`; only reference a stylesheet in `block.json` when you specifically need a per-block scoped `view` sheet.

> Known inconsistency: `src/blocks/recent-posts/block.json` contains a stale `"editorScript": "file:./dist/js/blocks.js"` path that does not exist and is not how this theme loads editor scripts (the aggregated `dist/blocks/index.js` handles registration). Do not copy that field into new blocks.

## JavaScript and Vite

- **Entry points** (`vite.config.js` → `rollupOptions.input`):
  - `frontend` → `src/frontend/main.js`
  - `frontend-editor` → `src/frontend-editor/main.js`
  - `editor` → `src/editor/main.js`
  - `admin` → `src/admin/main.js`
  - `style` → `src/style.css` (standalone Tailwind → `dist/style.css`)
  - `blocks/index` → `src/blocks/index.js` (aggregated block registrations + styles)
  - `blocks/editor` → virtual aggregated editor stylesheet → `dist/blocks/editor.css`
  - per-block `view.{scss,css}` → `dist/blocks/<name>/view.css`
- **Module structure:** each bundle's `main.js` imports its CSS/SCSS and any components (e.g. `src/frontend/components/olenkaButton.js`). Frontend/admin JS wrap logic in a jQuery IIFE `;(function($){ $(function(){ ... }); })(jQuery);`.
- **JSX in `.js`/`.jsx`:** enabled via `@vitejs/plugin-react` (`include: /\.(js|jsx|ts|tsx)$/`).
- **WordPress deps:** never bundled — imports like `@wordpress/blocks` are rewritten to `wp.blocks` globals by `externalGlobals`. If you use a new `@wordpress/*` package, add it to BOTH `wpGlobals` and `wpScriptHandles` in `vite.config.js`, otherwise the build fails on the unmapped external.
- **IIFE wrapping:** every output chunk is wrapped in an IIFE (`wrapChunksInIife`) to avoid leaking minified locals like `_` into WordPress's global Underscore — do not remove this plugin.

## Styling

- **Tailwind CSS v4** is the primary styling system. Tokens are declared in `src/style.css` inside `@theme { ... }` (custom `--color-*` palette). This compiles to `dist/style.css` and is enqueued on **both** frontend and editor (`editorFrontendAssets`). Add/adjust design tokens here.
- **Source stylesheets** (edit these): `src/style.css`, `src/**/*.scss`, `src/**/*.css` under the bundle folders, and per-block `style.scss` / `editor.scss` / `view.scss`.
- **Where styles belong:**
  - Global frontend styles → `src/frontend/` (and `src/assets/css/`).
  - Editor-only global styles → `src/editor/`.
  - Styles for both frontend and editor → `src/frontend-editor/`.
  - wp-admin styles → `src/admin/`.
  - Block frontend+editor styles → the block's `style.scss`; block editor-only → its `editor.scss`; block-scoped view sheet → its `view.scss`.
- **Global design tokens** (colors, typography, spacing presets) also live in `theme.json`; theme variations live in `styles/*.json`. Prefer `theme.json`/Tailwind tokens over hardcoded values.
- Sass is available (`sass` dev dependency) — use `.scss` where nesting/features help; plain `.css` also works.

## WordPress Templates, Parts and Patterns

- `theme.json` (version 3) — global settings, palette, spacing, typography, and `customTemplates` registrations. **Global design/config changes go here.**
- `templates/*.html` — FSE templates (block markup). Custom page templates listed in `theme.json` `customTemplates` (`blog-grid`, `blog-with-sidebar`, `page-full-width`, `page-full-width-no-title`, `page-with-sidebar`).
- `parts/*.html` — reusable template parts (`header.html`, `footer.html`).
- `patterns/*.php` — block patterns; each starts with a docblock header (`Title`, `Slug: olenka/...`, `Categories`, `Block Types`, etc.) followed by block markup. Patterns may be bound to parts via `Block Types: core/template-part/header`.
- `styles/*.json` — theme style variations (`funky`, `royal`, `serious`) selectable in the Site Editor.

Layout/markup changes to the site chrome normally go in `parts/` + `patterns/`; page structures in `templates/`; design tokens in `theme.json`/`styles/`.

## Environment Setup

Prerequisites: PHP 8.0+, WordPress 6.0+, Node.js 20.19+ or 22.12+ (required by Vite 8), npm, Composer 2.8+.

A fresh clone has no `vendor/`, `node_modules/`, or `dist/`. Nothing works until dependencies are installed and assets are built at least once.

## Olenka Setup Command

When the user says **"Olenka init"**, **"Olenka setup"**, **"initialize Olenka"**, or **"setup Olenka"**, treat it as a natural-language request to prepare the local dev environment. There is **no `Olenka` executable** — do not invent or run one. Perform these steps:

1. **Verify Node.js first (gate):** run `node --version` and check it against the Vite 8 requirement — **Node.js 20.19+ or 22.12+** (i.e. `>=20.19.0 <21`, or `>=22.12.0`; Node 21 and Node <20.19 do not satisfy it). If Node is missing or below the requirement, **stop**: do **not** run `npm install` or `npm run build`. Report the detected version and explain that Olenka requires Node.js 20.19+ or 22.12+, then let the user upgrade before continuing. (Composer steps below may still run, since they don't depend on Node.)
2. **Check Composer deps:** if `vendor/` or `vendor/autoload.php` is missing, run `composer install`. If already present, skip it.
3. **Check npm deps** (only if the Node check in step 1 passed): if `node_modules/` is missing (or clearly incomplete), run `npm install`. If already present, skip it.
4. **Build assets once** (only if the Node check passed) if `dist/` is missing: run `npm run build`. This is required for blocks to register and styles/scripts to load (block registration reads `dist/blocks/*/block.json`). If `dist/` already exists, do not rebuild unless the user asks.
5. **Do not start a watch process** (`npm run dev`) unless the user explicitly asks for development/watch mode.
6. **Do not reinstall** dependencies that are already present and usable.
7. **Report** the detected Node version, what was installed, what was already available, and whether a build ran. If setup was halted on the Node check, make that the headline of the report.

Dependency-presence indicators: `vendor/` + `vendor/autoload.php` (Composer), `node_modules/` (npm), `dist/` with compiled files (build output).

## Development Commands

Only these scripts exist — do not invent others.

| Command | What it does |
|---|---|
| `composer install` | Install PHP deps and generate the PSR-4 autoloader in `vendor/`. |
| `composer dump-autoload` | Regenerate the autoloader after adding/moving PHP classes under `inc/`. |
| `npm install` | Install Node build dependencies. |
| `npm run dev` | `vite build --watch --mode development` — rebuild `dist/` on source change (watch mode). |
| `npm run build` | `vite build` — one-shot production build of all bundles + blocks into `dist/`. |

There are no lint/test scripts and no Composer scripts defined in this repo. Do not claim a test suite exists.

## Development Rules

- **Read before writing.** Open the nearest existing example (block, hook class, pattern) and match its structure, naming, and conventions before implementing.
- **Edit source, not build output.** Change files under `src/` (and `inc/`, `templates/`, etc.), never anything under `dist/`, `vendor/`, or `node_modules/`. Regenerate instead.
- **Keep PHP within the `OLENKA\` namespace / PSR-4 layout.** New classes go under `inc/`, are namespaced to match their path, wire their own hooks in the constructor, and are instantiated from `OlenkaThemeStarterKit`. Run `composer dump-autoload` after adding a class if the autoloader hasn't picked it up.
- **All enqueueing goes through `inc/Hooks/EnqueueScripts.php`**, guarded by `file_exists()` and versioned with `filemtime()`, with `olenka-` handle prefixes.
- **Follow the existing block structure** (see "Adding a Gutenberg Block"). Do not change the aggregation model in `vite.config.js` or the `dist/`-based registration in `GutenbergBlocks.php`.
- **Use WordPress/block-editor APIs already adopted here** (`@wordpress/blocks`, `@wordpress/block-editor`, `@wordpress/components`, `@wordpress/i18n`, jQuery for frontend). If a new `@wordpress/*` package is needed, register it in `wpGlobals` and `wpScriptHandles` in `vite.config.js`.
- **Do not add a new build system, framework, or CSS methodology.** Tailwind v4 + Vite + SCSS is the stack.
- **Do not add dependencies unless necessary.** First check whether WordPress core, an existing `@wordpress/*` package, Tailwind, or existing helpers already provide it.
- **Avoid large refactors and unnecessary abstractions** — make focused changes.
- **Preserve backward compatibility** (attributes, block markup, template/part slugs) unless the task intentionally changes them; changing a static block's `save` output without deprecation invalidates existing content.
- **Escape output in PHP** (`esc_html`, `esc_attr`, `esc_url`, `wp_kses_post`) and guard `render.php` with `if (! defined('ABSPATH')) exit;`, matching `recent-posts/render.php`.

## Adding a Gutenberg Block

1. Create `src/blocks/<name>/` (kebab-case; block name `olenka/<name>`).
2. Copy the closest existing block as a template: a static block (e.g. `badge`, `cta`) or a dynamic one (e.g. `recent-posts`).
3. Add `block.json` (`$schema`, `apiVersion: 3`, `name`, `title`, `category: "olenka-general"`, `icon`, `version`, `textdomain: "olenka"`, `supports`, `attributes`). Match a neighbor's field set.
4. Add `index.js` calling `registerBlockType(metadata, { edit, save })` (static) or `{ edit }` (dynamic — omit `save`).
5. Add `edit.jsx`. Then either `save.jsx` (static) **or** `render.php` with `"render": "file:./render.php"` in `block.json` (dynamic).
6. Add styles as needed: `style.scss` (frontend+editor, aggregated), `editor.scss` (editor-only, aggregated), and/or `view.scss` (per-block scoped, referenced in `block.json`).
7. Run `npm run build` (or have `npm run dev` running). The block is auto-discovered — **no edits needed** to `src/blocks/index.js`, `vite.config.js`, or `GutenbergBlocks.php`.
8. If the block needs PHP-computed defaults, extend `setAboutBlockDefaults`-style logic in `GutenbergBlocks.php` (via the `block_type_metadata` filter) rather than hardcoding.

## Verification Before Finishing Changes

- After changing anything under `src/` (JS/SCSS/blocks), run **`npm run build`** and confirm it completes without errors; verify the expected files appear under `dist/` (e.g. a new block's `dist/blocks/<name>/block.json`).
- After adding/moving PHP classes, run **`composer dump-autoload`** if the class isn't autoloading.
- New blocks only register after a successful build (registration reads `dist/blocks/*/block.json`). Confirm the block appears under the "Olenka - General" category in the editor.
- There is no automated test/lint suite — verification is: successful build, expected `dist/` output, and manual check in the WP editor/frontend. Report honestly if a build fails.

## Important Files

- `functions.php` — bootstrap: loads autoloader, defines `OLENKA_THEME_VERSION`, boots `OlenkaThemeStarterKit`.
- `inc/OlenkaThemeStarterKit.php` — root class; register new feature classes here.
- `inc/Hooks/EnqueueScripts.php` — all script/style enqueueing.
- `inc/Hooks/GutenbergBlocks.php` — block registration, category, metadata defaults.
- `vite.config.js` — build entry points, block discovery/aggregation, WordPress externals, IIFE wrapping.
- `src/blocks/index.js` — auto-aggregator for all blocks.
- `src/style.css` — Tailwind entry + `@theme` design tokens.
- `theme.json` — global settings, tokens, `customTemplates`.
- `composer.json` / `package.json` — autoload config and npm scripts.

> Note: `README.md`'s project structure lists only the `badge` block and predates the current set (`about`, `badge`, `cta`, `hero-section`, `html-tester`, `inner-box`, `recent-posts`, `text-with-boxes-wrapper`). Trust the repository over the README.
