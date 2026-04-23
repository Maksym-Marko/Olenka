import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InnerBlocks,
	RichText,
	InspectorControls,
	PanelColorSettings,
} from '@wordpress/block-editor';
import { PanelBody, TextControl, ToggleControl } from '@wordpress/components';
import metadata from './block.json';

const ALLOWED_BLOCKS = [
	'olenka/inner-box'
];

const TEMPLATE = [
	[
		'olenka/inner-box',
		{
			heading: 'Block theme architecture',
			description:
				'Built for the modern WordPress site editor, with a structure that supports templates, template parts, patterns, and global styles.',
		},
	],
	[
		'olenka/inner-box',
		{
			heading: 'Tailwind CSS workflow',
			description:
				'Uses Tailwind CSS for a fast, utility-first styling approach without relying on a large custom stylesheet.',
		},
	],
	[
		'olenka/inner-box',
		{
			heading: 'Vite-powered assets',
			description:
				'Frontend, editor, admin, and block assets are compiled through Vite for a modern and efficient development workflow.',
		},
	],
	[
		'olenka/inner-box',
		{
			heading: 'Composer autoloading',
			description:
				'PHP is organized with PSR-4 autoloading under the OLENKA namespace, making the codebase easier to extend and maintain.',
		},
	],
	[
		'olenka/inner-box',
		{
			heading: 'Custom Gutenberg blocks',
			description:
				'Includes support for custom blocks, including static and server-rendered patterns, so the theme can grow with project needs.',
		},
	],
	[
		'olenka/inner-box',
		{
			heading: 'Templates and patterns',
			description:
				'Comes with a structured set of templates, template parts, and block patterns for building pages and post layouts more efficiently.',
		},
	],
];

export default function edit({ attributes, setAttributes }) {
	const { tagline, heading, description, backgroundColor, subline, displaySubline, showBorderBottom } = attributes;

	const blockProps = useBlockProps({
		style: backgroundColor ? { backgroundColor } : {},
	});

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Section Settings', metadata.textdomain)}>
					<TextControl
						__next40pxDefaultSize
						__nextHasNoMarginBottom
						label={__('Tagline', metadata.textdomain)}
						value={tagline}
						onChange={(value) => setAttributes({ tagline: value })}
						placeholder={__('What\'s inside', metadata.textdomain)}
					/>
					<TextControl
						__next40pxDefaultSize
						__nextHasNoMarginBottom
						label={__('Heading', metadata.textdomain)}
						value={heading}
						onChange={(value) => setAttributes({ heading: value })}
						placeholder={__('Enter heading…', metadata.textdomain)}
					/>
					<TextControl
						__next40pxDefaultSize
						__nextHasNoMarginBottom
						label={__('Description', metadata.textdomain)}
						value={description}
						onChange={(value) => setAttributes({ description: value })}
						placeholder={__('Enter description…', metadata.textdomain)}
					/>
					<ToggleControl
						__nextHasNoMarginBottom
						label={__('Show Border Bottom', metadata.textdomain)}
						checked={showBorderBottom}
						onChange={(val) => setAttributes({ showBorderBottom: val })}
					/>
					<ToggleControl
						__nextHasNoMarginBottom
						label={__('Display Subline', metadata.textdomain)}
						checked={displaySubline}
						onChange={(val) => setAttributes({ displaySubline: val })}
						help={__('Toggle to display the subline below the boxes grid.', metadata.textdomain)}
					/>
					{displaySubline && (
						<TextControl
							__next40pxDefaultSize
							__nextHasNoMarginBottom
							label={__('Subline', metadata.textdomain)}
							value={subline}
							onChange={(value) => setAttributes({ subline: value })}
							placeholder={__('Enter subline…', metadata.textdomain)}
						/>
					)}
				</PanelBody>
			<PanelColorSettings
				title={__('Color Settings', metadata.textdomain)}
				initialOpen={false}
				colorSettings={[
					{
						value: backgroundColor,
						onChange: (color) => setAttributes({ backgroundColor: color }),
						label: __('Background Color', metadata.textdomain),
					},
				]}
			/>
			</InspectorControls>

			<div {...blockProps}>
				<div id="features" className={`py-20 md:py-24${showBorderBottom ? ' border-b border-coffee-02' : ''}`}>
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

						<div className="olenka-inner-boxs-editor">
							<InnerBlocks
								allowedBlocks={ALLOWED_BLOCKS}
								template={TEMPLATE}
								templateLock={false}
								orientation="horizontal"
							/>
						</div>

						{displaySubline && (
							<p className="text-sm text-coffee-05 mt-8">{subline}</p>
						)}
					</div>
				</div>
			</div>
		</>
	);
}
