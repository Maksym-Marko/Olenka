import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const { text, blockBackgroundColor, squareBackgroundColor, textColor } = attributes;
	
	const blockProps = useBlockProps.save();

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
				<RichText.Content
					value={text}
				/>
			</span>
		</div>
	);
}
