import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InnerBlocks,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import metadata from './block.json';

const ALLOWED_BLOCKS = [
	'olenka/whats-inside-item'
];

const TEMPLATE = [
	[
		'olenka/whats-inside-item',
		{
			heading: 'Block theme architecture',
			description:
				'Built for the modern WordPress site editor, with a structure that supports templates, template parts, patterns, and global styles.',
		},
	],
	[
		'olenka/whats-inside-item',
		{
			heading: 'Tailwind CSS workflow',
			description:
				'Uses Tailwind CSS for a fast, utility-first styling approach without relying on a large custom stylesheet.',
		},
	],
	[
		'olenka/whats-inside-item',
		{
			heading: 'Vite-powered assets',
			description:
				'Frontend, editor, admin, and block assets are compiled through Vite for a modern and efficient development workflow.',
		},
	],
	[
		'olenka/whats-inside-item',
		{
			heading: 'Composer autoloading',
			description:
				'PHP is organized with PSR-4 autoloading under the OLENKA namespace, making the codebase easier to extend and maintain.',
		},
	],
	[
		'olenka/whats-inside-item',
		{
			heading: 'Custom Gutenberg blocks',
			description:
				'Includes support for custom blocks, including static and server-rendered patterns, so the theme can grow with project needs.',
		},
	],
	[
		'olenka/whats-inside-item',
		{
			heading: 'Templates and patterns',
			description:
				'Comes with a structured set of templates, template parts, and block patterns for building pages and post layouts more efficiently.',
		},
	],
];

export default function edit({ attributes, setAttributes }) {
	const { tagline, heading, description } = attributes;

	const blockProps = useBlockProps();

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Section Settings', metadata.textdomain)}>
					<TextControl
						label={__('Tagline', metadata.textdomain)}
						value={tagline}
						onChange={(value) => setAttributes({ tagline: value })}
						placeholder={__('What\'s inside', metadata.textdomain)}
					/>
					<TextControl
						label={__('Heading', metadata.textdomain)}
						value={heading}
						onChange={(value) => setAttributes({ heading: value })}
						placeholder={__('Enter heading…', metadata.textdomain)}
					/>
					<TextControl
						label={__('Description', metadata.textdomain)}
						value={description}
						onChange={(value) => setAttributes({ description: value })}
						placeholder={__('Enter description…', metadata.textdomain)}
					/>
				</PanelBody>
			</InspectorControls>

			<div {...blockProps}>
				<div id="features" className="py-20 md:py-24 border-b border-coffee-02">
					<div className="max-w-5xl mx-auto px-6">
						<div className="mb-12">
							<RichText
								tagName="span"
								className="inline-block text-xs font-medium tracking-widest uppercase text-coffee-03 mb-4"
								value={tagline}
								onChange={(value) => setAttributes({ tagline: value })}
								placeholder={__('What\'s inside', metadata.textdomain)}
								allowedFormats={[]}
							/>

							<RichText
								tagName="h2"
								className="text-2xl md:text-3xl font-semibold leading-tight text-coffee-06 mb-4 max-w-xl"
								value={heading}
								onChange={(value) => setAttributes({ heading: value })}
								placeholder={__('Enter heading…', metadata.textdomain)}
								allowedFormats={['core/bold', 'core/italic']}
							/>

							<RichText
								tagName="p"
								className="text-coffee-05 leading-relaxed max-w-2xl"
								value={description}
								onChange={(value) => setAttributes({ description: value })}
								placeholder={__('Enter description…', metadata.textdomain)}
								allowedFormats={['core/bold', 'core/italic', 'core/link']}
							/>
						</div>

						<div className="olenka-whats-inside-items-editor">
							<InnerBlocks
								allowedBlocks={ALLOWED_BLOCKS}
								template={TEMPLATE}
								templateLock={false}
								orientation="horizontal"
							/>
						</div>
					</div>
				</div>
			</div>
		</>
	);
}
