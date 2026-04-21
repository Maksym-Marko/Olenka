/**
 * Auto-registers every block under `src/blocks/<name>/index.{js,jsx}`.
 *
 * Drop a new folder in here with its own `index.js` that calls
 * `registerBlockType(...)` and it will be picked up automatically by the
 * aggregated bundle `dist/blocks/index.js` — no edits required.
 */
const blockModules = import.meta.glob('./*/index.{js,jsx}', { eager: true });

// Eagerly import every per-block `style.{scss,css}` so Vite aggregates them
// into a single sibling stylesheet `dist/blocks/index.css` next to this
// entry's `dist/blocks/index.js`. Drop a `style.scss` (or `.css`) into any
// block folder and it's picked up automatically.
import.meta.glob('./*/style.{scss,css}', { eager: true });

// Touch each imported module so bundlers don't tree-shake the side effects
// (registerBlockType calls) away.
Object.keys(blockModules);
