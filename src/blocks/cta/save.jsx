import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const {
		heading,
		description,
		primaryButtonText,
		primaryButtonUrl,
		secondaryLinkText,
		secondaryLinkUrl,
		backgroundColor,
	} = attributes;

	const blockProps = useBlockProps.save();

	const wrapperStyle = backgroundColor ? { backgroundColor } : {};

	return (
		<div
			{...blockProps}
			className={`py-24 md:py-28 border-b border-coffee-02 bg-coffee-01${blockProps.className ? ' ' + blockProps.className : ''}`}
			style={{ ...blockProps.style, ...wrapperStyle }}
		>
			<div className="max-w-5xl mx-auto px-6 text-center">
				<RichText.Content
					tagName="h2"
					className="text-2xl md:text-3xl font-semibold leading-tight text-coffee-06 mb-4"
					value={heading}
				/>
				<RichText.Content
					tagName="p"
					className="text-coffee-05 leading-relaxed max-w-lg mx-auto mb-10"
					value={description}
				/>
				<div className="flex flex-wrap items-center justify-center gap-4">
					<a
						href={primaryButtonUrl}
						className="inline-block bg-coffee-03 hover:bg-coffee-04 text-white text-sm font-medium px-8 py-3 rounded transition-colors duration-150"
					>
						{primaryButtonText}
					</a>
					<a
						href={secondaryLinkUrl}
						className="text-sm text-coffee-05 hover:text-coffee-03 transition-colors duration-150"
					>
						{secondaryLinkText}
					</a>
				</div>
			</div>
		</div>
	);
}
