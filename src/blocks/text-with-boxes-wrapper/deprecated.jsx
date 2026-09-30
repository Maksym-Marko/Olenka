import { useBlockProps, InnerBlocks, RichText } from '@wordpress/block-editor';

/**
 * Deprecation for the previous markup that hardcoded `id="features"` on the
 * inner wrapper. Kept so existing content validates and migrates to the current
 * (anchor-driven) markup without an editor "invalid content" notice.
 */
const v1 = {
	supports: {
		html: false,
	},
	attributes: {
		tagline: { type: 'string', default: "What's inside" },
		heading: { type: 'string', default: 'A practical starter, built around modern WordPress workflow' },
		description: { type: 'string', default: 'Olenka is designed as a clean working base for custom theme development. Instead of filling the homepage with decoration, it focuses on the pieces that matter most when starting a real project.' },
		backgroundColor: { type: 'string', default: '' },
		subline: { type: 'string', default: 'Made for developers who prefer a modern workflow with room for clean customization.' },
		displaySubline: { type: 'boolean', default: false },
		showBorderBottom: { type: 'boolean', default: true },
	},
	save({ attributes }) {
		const { tagline, heading, description, backgroundColor, subline, displaySubline, showBorderBottom } = attributes;

		const blockProps = useBlockProps.save({
			style: backgroundColor ? { backgroundColor } : {},
		});

		return (
			<div {...blockProps}>
				<div id="features" className={`py-20 md:py-24${showBorderBottom ? ' border-b border-coffee-02' : ''}`}>
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
	},
};

export default [v1];
