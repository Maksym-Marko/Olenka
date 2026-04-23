import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const { heading, description, backgroundColor, headingColor, descriptionColor } = attributes;

	const blockProps = useBlockProps.save();

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
		<article
			{...blockProps}
			className={`bg-coffee-01 rounded-xl p-7 ${blockProps.className}`}
			style={{ ...articleStyle, ...blockProps.style }}
		>
			<RichText.Content
				tagName="h3"
				className="text-sm font-semibold text-coffee-06 mb-3"
				style={headingStyle}
				value={heading}
			/>
			<RichText.Content
				tagName="p"
				className="text-sm text-coffee-05 leading-relaxed"
				style={descriptionStyle}
				value={description}
			/>
		</article>
	);
}
