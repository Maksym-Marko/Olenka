import { useBlockProps, InnerBlocks, RichText } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const { tagline, heading, description, backgroundColor, subline, displaySubline } = attributes;

	const blockProps = useBlockProps.save({
		style: backgroundColor ? { backgroundColor } : {},
	});

	return (
		<div {...blockProps}>
			<div id="features" className="py-20 md:py-24 border-b border-coffee-02">
				<div className="max-w-5xl mx-auto px-6">
					<div className="mb-12">
					<RichText.Content
						tagName="span"
						className="inline-block text-xs font-medium tracking-widest uppercase text-coffee-03 mb-4"
						value={tagline}
					/>

						<RichText.Content
							tagName="h2"
							className="text-2xl md:text-3xl font-semibold leading-tight text-coffee-06 mb-4 max-w-xl"
							value={heading}
						/>

						<RichText.Content
							tagName="p"
							className="text-coffee-05 leading-relaxed max-w-2xl"
							value={description}
						/>
					</div>

					<div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
						<InnerBlocks.Content />
					</div>

					{displaySubline && (
						<p className="text-sm text-coffee-05 mt-8">{subline}</p>
					)}
				</div>
			</div>
		</div>
	);
}
