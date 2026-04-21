import { __ } from '@wordpress/i18n';
import metadata from './block.json';
import { useBlockProps, RichText, InspectorControls, PanelColorSettings } from '@wordpress/block-editor';
import { TextControl } from '@wordpress/components';

export default function edit({ attributes, setAttributes }) {
	const { text, blockBackgroundColor, squareBackgroundColor, textColor } = attributes;

	const blockProps = useBlockProps();

	// Apply colors to the badge container
	const containerStyle = {
		backgroundColor: blockBackgroundColor || '#ffffff',
	};

	// Apply colors to the square
	const squareStyle = {
		backgroundColor: squareBackgroundColor || '#90d092',
	};

	// Apply colors to the text
	const textStyle = {
		color: textColor || '#000000',
	};

	return (
		<>
			<InspectorControls>
				<div className="wp-block-olenka-badge-controls">
					<TextControl
						__next40pxDefaultSize
						__nextHasNoMarginBottom
						label={__('Badge Text', 'olenka')}
						value={text}
						onChange={(value) => setAttributes({ text: value })}
						placeholder={__('Enter badge text', 'olenka')}
					/>
				</div>
				<PanelColorSettings
					title={__('Color Settings', 'olenka')}
					initialOpen={false}
					colorSettings={[
						{
							value: blockBackgroundColor,
							onChange: (color) => setAttributes({ blockBackgroundColor: color }),
							label: __('Block Background Color', 'olenka'),
						},
						{
							value: squareBackgroundColor,
							onChange: (color) => setAttributes({ squareBackgroundColor: color }),
							label: __('Square Background Color', 'olenka'),
						},
						{
							value: textColor,
							onChange: (color) => setAttributes({ textColor: color }),
							label: __('Text Color', 'olenka'),
						},
					]}
				/>
			</InspectorControls>

			<div 
				{...blockProps}
				className={`p-2 inline-flex items-center text-base ${blockProps.className}`}
				style={containerStyle}
			>
				<span 
					className="inline-block px-2 py-2 rounded mr-1"
					style={squareStyle}
				></span>
				<span 
					className="text-base"
					style={textStyle}
				>
					<RichText
						value={text}
						onChange={(value) => setAttributes({ text: value })}
						placeholder={__('Enter badge text...', 'olenka')}
					/>
				</span>
			</div>
		</>
	);
}
