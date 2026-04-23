import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	RichText,
	InspectorControls,
	PanelColorSettings,
} from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';

export default function edit({ attributes, setAttributes }) {
	const {
		heading,
		description,
		primaryButtonText,
		primaryButtonUrl,
		secondaryLinkText,
		secondaryLinkUrl,
		backgroundColor,
	} = attributes;

	const blockProps = useBlockProps();

	const wrapperStyle = backgroundColor ? { backgroundColor } : {};

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Button Settings', 'olenka')} initialOpen={true}>
					<TextControl
						__next40pxDefaultSize
						__nextHasNoMarginBottom
						label={__('Primary Button Text', 'olenka')}
						value={primaryButtonText}
						onChange={(value) => setAttributes({ primaryButtonText: value })}
					/>
					<TextControl
						__next40pxDefaultSize
						__nextHasNoMarginBottom
						label={__('Primary Button URL', 'olenka')}
						value={primaryButtonUrl}
						onChange={(value) => setAttributes({ primaryButtonUrl: value })}
						type="url"
					/>
					<TextControl
						__next40pxDefaultSize
						__nextHasNoMarginBottom
						label={__('Secondary Link Text', 'olenka')}
						value={secondaryLinkText}
						onChange={(value) => setAttributes({ secondaryLinkText: value })}
					/>
					<TextControl
						__next40pxDefaultSize
						__nextHasNoMarginBottom
						label={__('Secondary Link URL', 'olenka')}
						value={secondaryLinkUrl}
						onChange={(value) => setAttributes({ secondaryLinkUrl: value })}
						type="url"
					/>
				</PanelBody>
				<PanelColorSettings
					title={__('Color Settings', 'olenka')}
					initialOpen={false}
					colorSettings={[
						{
							value: backgroundColor,
							onChange: (color) => setAttributes({ backgroundColor: color }),
							label: __('Background Color', 'olenka'),
						},
					]}
				/>
			</InspectorControls>

			<div
				{...blockProps}
				className={`py-24 md:py-28 border-b border-coffee-02 bg-coffee-01${blockProps.className ? ' ' + blockProps.className : ''}`}
				style={{ ...blockProps.style, ...wrapperStyle }}
			>
				<div className="max-w-5xl mx-auto px-6 text-center">
					<RichText
						tagName="h2"
						className="text-2xl md:text-3xl font-semibold leading-tight text-coffee-06 mb-4"
						value={heading}
						onChange={(value) => setAttributes({ heading: value })}
						placeholder={__('Enter heading…', 'olenka')}
					/>
					<RichText
						tagName="p"
						className="text-coffee-05 leading-relaxed max-w-lg mx-auto mb-10"
						value={description}
						onChange={(value) => setAttributes({ description: value })}
						placeholder={__('Enter description…', 'olenka')}
					/>
					<div className="flex flex-wrap items-center justify-center gap-4">
						<a
							href={primaryButtonUrl}
							className="inline-block bg-coffee-03 hover:bg-coffee-04 text-white text-sm font-medium px-8 py-3 rounded transition-colors duration-150"
							onClick={(e) => e.preventDefault()}
						>
							{primaryButtonText}
						</a>
						<a
							href={secondaryLinkUrl}
							className="text-sm text-coffee-05 hover:text-coffee-03 transition-colors duration-150"
							onClick={(e) => e.preventDefault()}
						>
							{secondaryLinkText}
						</a>
					</div>
				</div>
			</div>
		</>
	);
}
