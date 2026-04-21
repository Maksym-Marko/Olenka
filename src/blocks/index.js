/**
 * Auto-registers every block under `src/blocks/<name>/index.{js,jsx}`.
 *
 * Drop a new folder in here with its own `index.js` that calls
 * `registerBlockType(...)` and it will be picked up automatically by the
 * aggregated bundle `dist/blocks/index.js` — no edits required.
 */
const blockModules = import.meta.glob('./*/index.{js,jsx}', { eager: true });

// Touch each imported module so bundlers don't tree-shake the side effects
// (registerBlockType calls) away.
Object.keys(blockModules);
