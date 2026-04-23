import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, InspectorControls, PanelColorSettings } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import metadata from './block.json';

export default function edit({ attributes, setAttributes }) {
	const { heading, description, backgroundColor, headingColor, descriptionColor } = attributes;

	const blockProps = useBlockProps();

	const articleStyle = {
		backgroundColor: backgroundColor || undefined,
	};

	const headingStyle = {
		color: headingColor || undefined,
	};

	const descriptionStyle = {
		color: descriptionColor || undefined,
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Card Settings', metadata.textdomain)}>
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
						{
							value: headingColor,
							onChange: (color) => setAttributes({ headingColor: color }),
							label: __('Heading Color', metadata.textdomain),
						},
						{
							value: descriptionColor,
							onChange: (color) => setAttributes({ descriptionColor: color }),
							label: __('Description Color', metadata.textdomain),
						},
					]}
				/>
			</InspectorControls>

			<article
				{...blockProps}
				className={`bg-coffee-01 rounded-xl p-7 ${blockProps.className}`}
				style={{ ...articleStyle, ...blockProps.style }}
			>
				<RichText
					tagName="h3"
					className="text-sm font-semibold text-coffee-06 mb-3"
					style={headingStyle}
					value={heading}
					onChange={(value) => setAttributes({ heading: value })}
					placeholder={__('Enter heading…', metadata.textdomain)}
					allowedFormats={['core/bold', 'core/italic']}
				/>
				<RichText
					tagName="p"
					className="text-sm text-coffee-05 leading-relaxed"
					style={descriptionStyle}
					value={description}
					onChange={(value) => setAttributes({ description: value })}
					placeholder={__('Enter description…', metadata.textdomain)}
					allowedFormats={['core/bold', 'core/italic', 'core/link']}
				/>
			</article>
		</>
	);
}
