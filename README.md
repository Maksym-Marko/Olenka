# Olenka — WordPress Block Theme Starter Kit

![Olenka Theme Screenshot](https://raw.githubusercontent.com/Maksym-Marko/Olenka/main/screenshot.png)

**Olenka** is a developer-focused boilerplate for building modern WordPress block themes. It provides a clean, minimal, and scalable foundation with Composer autoloading, Vite-powered asset compilation, Tailwind CSS, custom Gutenberg blocks, and a structured set of templates, template parts, and block patterns.

**Current Version**: 1.0.0

Fork or download Olenka from [GitHub](https://github.com/Maksym-Marko/Olenka) and start building your next WordPress block theme right away.

---

## 🚀 Quick Start

### Prerequisites

- PHP 8.0 or higher
- WordPress 6.0 or higher
- Node.js 18+ and npm
- Composer (version 2.8.4 or higher)

### Installation & Setup

1. **Clone or download the theme** into your WordPress themes directory:
   ```bash
   cd wp-content/themes/
   git clone https://github.com/Maksym-Marko/Olenka olenka
   cd olenka
   ```

2. **Install PHP dependencies** (PSR-4 autoloading):
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**:
   ```bash
   npm install
   ```

4. **Start development** with file watching:
   ```bash
   npm run dev
   ```

5. **Build assets for production**:
   ```bash
   npm run build
   ```

6. **Activate the theme** in the WordPress admin panel under **Appearance → Themes**.

---

## 🛠️ Development Workflow

### Available NPM Scripts

| Command | Description |
|---|---|
| `npm run dev` | Build assets in watch mode (development) |
| `npm run build` | Build all assets for production |

### Asset Compilation

All source files live in `src/` and compile to `dist/`. Vite handles:

- **Frontend styles & scripts** — `src/frontend/` → `dist/frontend.{css,js}`
- **Editor styles & scripts** — `src/editor/` → `dist/editor.{css,js}`
- **Admin styles & scripts** — `src/admin/` → `dist/admin.{css,js}`
- **Frontend-editor styles & scripts** — `src/frontend-editor/` → `dist/frontend-editor.{css,js}`
- **Gutenberg blocks** — `src/blocks/` → `dist/blocks/`

### Development Workflow

```bash
# Install dependencies (once)
composer install && npm install

# Start development (watch mode)
npm run dev

# When ready for production
npm run build
```

---

## 🎯 Theme Features

### Block Editor (Gutenberg)
- **Custom Blocks**: Example `badge` block included with static (`save`) rendering
- **SSR Blocks**: Server-side rendering pattern with PHP `render.php`
- **Block Styles & Editor Styles**: Separate frontend (`style.scss`) and editor (`editor.scss`) stylesheets per block
- **Block Patterns**: Ready-made layout patterns for rapid page building
- **Aggregated Block Assets**: All block styles/scripts compiled into single `dist/blocks/index.{css,js}` for efficiency; per-block `view` scripts stay scoped

### Theme Styles & Color Schemes
Three built-in style variations shipped in `styles/`:
- `funky.json` — vibrant palette
- `royal.json` — classic, elegant tones
- `serious.json` — minimal, professional look

### Templates
Pre-built block templates in `templates/`:

| Template | Description |
|---|---|
| `index.html` | Default fallback template |
| `front-page.html` | Site front page |
| `page.html` | Standard page |
| `page-full-width.html` | Full-width page |
| `page-full-width-no-title.html` | Full-width, no title |
| `page-with-sidebar.html` | Page with sidebar |
| `single.html` | Single post |
| `archive.html` | Archive / category listing |
| `blog-grid.html` | Blog posts in grid layout |
| `blog-with-sidebar.html` | Blog posts with sidebar |
| `search.html` | Search results |
| `404.html` | 404 error page |

### Template Parts
Reusable parts in `parts/`:
- `header.html`
- `footer.html`

### Block Patterns
Pre-designed patterns in `patterns/`:
- `header.php` / `footer.php` — site header and footer
- `hero-section.php` — hero/banner section
- `page-home.php` — home page layout
- `page-404.php` — 404 page layout
- `page-blog-grid.php` / `page-blog-with-sidebar.php` — blog layouts
- `page-full-width.php` / `page-index.php` / `page-search.php`
- `posts-grid.php` / `posts-grid-modern.php` / `posts-list.php` — post listing variants

### Frontend JavaScript & Tailwind CSS
- **Tailwind CSS v4** via `@tailwindcss/vite` — utility-first styling in frontend and block CSS
- **Frontend JS module** (`src/frontend/`) — vanilla JS entry point for interactive frontend components
- **Frontend-Editor JS module** (`src/frontend-editor/`) — scripts that run in both the editor and the frontend

### PHP / Composer
- **PSR-4 autoloading** under the `OLENKA\` namespace
- `inc/OlenkaThemeStarterKit.php` — main theme bootstrap class
- `inc/Hooks/EnqueueScripts.php` — all asset enqueueing (frontend, editor, admin, block assets)
- `inc/Hooks/GutenbergBlocks.php` — block registration

---

## 🔧 Configuration

### theme.json
Global design tokens (colors, typography, spacing, layout) are defined in `theme.json`. Extend it to match your brand.

### Vite (`vite.config.js`)
- Multiple entry points covering frontend, editor, admin, and frontend-editor bundles
- Auto-discovers block entries under `src/blocks/`
- Copies and rewrites `block.json` files from `src/` to `dist/` on build
- Supports SCSS/Sass out of the box
- React + JSX support via `@vitejs/plugin-react`
- External globals for WordPress-provided libraries (e.g. `wp`, `react`, `react-dom`)

### PHP Namespace
All PHP classes use the `OLENKA\` namespace (PSR-4 autoloaded from the `inc/` directory).

---

## 📁 Project Structure

```bash
olenka/
├── assets/
│   ├── fonts/
│   └── images/
├── dist/                         # Compiled assets (generated)
│   ├── admin.{css,js}
│   ├── blocks/
│   │   ├── badge/
│   │   │   └── block.json
│   │   ├── editor.css
│   │   ├── index.{css,js}
│   │   └── index.deps.json
│   ├── editor.{css,js}
│   ├── frontend-editor.{css,js}
│   ├── frontend.{css,js}
│   └── style.css
├── inc/
│   ├── Hooks/
│   │   ├── EnqueueScripts.php
│   │   └── GutenbergBlocks.php
│   └── OlenkaThemeStarterKit.php
├── parts/
│   ├── footer.html
│   └── header.html
├── patterns/
│   ├── footer.php
│   ├── header.php
│   ├── hero-section.php
│   ├── page-404.php
│   ├── page-blog-grid.php
│   ├── page-blog-with-sidebar.php
│   ├── page-full-width.php
│   ├── page-home.php
│   ├── page-index.php
│   ├── page-search.php
│   ├── posts-grid-modern.php
│   ├── posts-grid.php
│   └── posts-list.php
├── src/
│   ├── admin/
│   │   ├── assets/css/admin.css
│   │   └── main.js
│   ├── assets/
│   │   └── css/
│   │       ├── contact-form-7.scss
│   │       └── frontend.scss
│   ├── blocks/
│   │   ├── badge/
│   │   │   ├── block.json
│   │   │   ├── edit.jsx
│   │   │   ├── editor.scss
│   │   │   ├── index.js
│   │   │   ├── save.jsx
│   │   │   └── style.scss
│   │   └── index.js
│   ├── editor/
│   │   ├── assets/css/editor.css
│   │   └── main.js
│   ├── frontend/
│   │   ├── assets/css/frontend.css
│   │   ├── components/olenkaButton.js
│   │   └── main.js
│   ├── frontend-editor/
│   │   ├── assets/css/editor-frontend.css
│   │   └── main.js
│   ├── index.js
│   └── style.css
├── styles/
│   ├── funky.json
│   ├── royal.json
│   └── serious.json
├── templates/
│   ├── 404.html
│   ├── archive.html
│   ├── blog-grid.html
│   ├── blog-with-sidebar.html
│   ├── front-page.html
│   ├── index.html
│   ├── page.html
│   ├── page-full-width.html
│   ├── page-full-width-no-title.html
│   ├── page-with-sidebar.html
│   ├── search.html
│   └── single.html
├── vendor/                       # Composer autoloader
├── composer.json
├── functions.php
├── package.json
├── screenshot.png
├── style.css                     # Theme header
├── theme.json
└── vite.config.js
```

---

## 🚨 Troubleshooting

### Build Errors

```bash
# Clear node_modules and reinstall
rm -rf node_modules package-lock.json
npm install

# Clear dist and rebuild
rm -rf dist/
npm run build
```

### Autoloading Issues

```bash
# Regenerate Composer autoloader
composer dump-autoload
```

### Theme Not Appearing
- Ensure `style.css` contains a valid WordPress theme header (it does by default)
- Verify the theme folder is placed directly under `wp-content/themes/`
- Check file permissions on the theme directory

### Blocks Not Showing in Editor
- Run `npm run build` to compile block assets
- Confirm `dist/blocks/badge/block.json` exists after build
- Check block registration in `inc/Hooks/GutenbergBlocks.php`

### Styles Not Loading
- Confirm `npm run build` (or `npm run dev`) has been run
- Check that `dist/` contains compiled CSS and JS files
- Review `inc/Hooks/EnqueueScripts.php` for the correct file paths

### Development Tips

1. Run `npm run dev` during active development — it watches all source files and rebuilds on change
2. Use `theme.json` to define your global design tokens; avoid hardcoding colors/fonts in CSS where possible
3. Keep block styles scoped — frontend styles go in `style.scss`, editor-only styles in `editor.scss`
4. Use the `OLENKA\` namespace for any new PHP classes under `inc/`
5. Enable **WordPress debug mode** (`WP_DEBUG`) for PHP error output during development

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome! Feel free to:

- **Fork** the repository on [GitHub](https://github.com/Maksym-Marko/Olenka)
- **Open an issue** to report a bug or request a feature
- **Submit a pull request** with your improvements

---

## 📄 License

This project is licensed under the **GPL v2 or later** — see the WordPress licensing guidelines for details.

---

## 🙏 Acknowledgments

- [WordPress](https://wordpress.org/) and the Gutenberg team for the block editor
- [Vite](https://vite.dev/) for the blazing-fast build tooling
- [Tailwind CSS](https://tailwindcss.com/) for the utility-first CSS framework
- The open-source community for the amazing tools that make this starter kit possible
