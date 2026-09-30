import { registerBlockType } from '@wordpress/blocks';
import metadata from './block.json';
import edit from './edit';
import save from './save';
import deprecated from './deprecated';

registerBlockType(metadata, {
	/**
	 * @see ./edit.js
	 */
	edit,

	/**
	 * @see ./save.js
	 */
	save,

	/**
	 * @see ./deprecated.js
	 */
	deprecated,
});
