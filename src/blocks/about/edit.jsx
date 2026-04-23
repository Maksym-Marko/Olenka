import { __ } from '@wordpress/i18n';
import { useBlockProps, InnerBlocks, MediaUpload, MediaUploadCheck, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, Button, TextControl, RangeControl, ToggleControl } from '@wordpress/components';
import metadata from './block.json';

const ALLOWED_BLOCKS = ['core/group', 'core/heading', 'core/paragraph', 'core/buttons', 'olenka/badge'];

const TEMPLATE = [
	[
		'core/paragraph',
		{
			className: 'is-style-default',
			content: 'About the developer',
			style: {
				spacing: { margin: { top: 'var:preset|spacing|mini', bottom: '0px' } },
				typography: { textTransform: 'uppercase' },
			},
			textColor: 'main',
			fontSize: 'xxx-small',
		},
	],
	[
		'core/heading',
		{
			content: 'Built by Maksym Marko',
			level: 2,
			style: {
				typography: { fontStyle: 'normal', fontWeight: '600' },
				spacing: { margin: { top: '0px', bottom: 'var:preset|spacing|small' } },
			},
			fontSize: 'large',
		},
	],
	[
		'core/group',
		{
			layout: { type: 'flex', orientation: 'vertical' },
		},
		[
			[
				'core/paragraph',
				{
					content:
						'Hi, I’m Maksym — a web developer helping businesses build and improve their online presence since 2015. I work with WordPress, PHP, Vue.js, Laravel, HTML, CSS, and front-end systems that support real project needs.',
					style: {
						elements: { link: { color: { text: 'var:preset|color|dark' } } },
					},
					textColor: 'dark',
					fontSize: 'medium',
				},
			],
			[
				'core/paragraph',
				{
					content:
						'Olenka brings together the parts of modern WordPress development I find most useful: a clean starting point, structured templates, pattern-based building, modern asset tooling, and enough flexibility to shape a theme around content instead of forcing content into a rigid design.',
					style: {
						elements: { link: { color: { text: 'var:preset|color|dark' } } },
					},
					textColor: 'dark',
					fontSize: 'medium',
				},
			],
			[
				'core/paragraph',
				{
					content:
						'Over the years, I’ve worked with clients from different countries and across different kinds of projects. Olenka reflects that practical experience: less noise, more structure, and a reliable foundation you can keep building on.',
					style: {
						elements: { link: { color: { text: 'var:preset|color|dark' } } },
					},
					textColor: 'dark',
					fontSize: 'medium',
				},
			],
			[
				'core/list',
				{
					className: 'space-y-3 mb-8 border-l-2 border-coffee-02 pl-5',
					style: {
						elements: { link: { color: { text: 'var:preset|color|dark' } } },
					},
					textColor: 'dark',
					fontSize: 'xxx-small',
				},
				[
					['core/list-item', { content: 'Building websites and web applications since 2015' }],
					['core/list-item', { content: 'Focused on WordPress and practical development workflow' }],
					['core/list-item', { content: 'Designed as a reliable starting point for custom projects' }],
				],
			],
			[
				'core/buttons',
				{
					style: {
						spacing: { margin: { top: 'var:preset|spacing|small' } },
					},
				},
				[
					[
						'core/button',
						{
							textColor: 'main-dark',
							className: 'is-style-outline',
							style: {
								border: {
									radius: {
										topLeft: '5px',
										topRight: '5px',
										bottomLeft: '5px',
										bottomRight: '5px',
									},
									width: '1px',
								},
								spacing: {
									padding: {
										left: 'var:preset|spacing|small',
										right: 'var:preset|spacing|small',
										top: 'var:preset|spacing|mini',
										bottom: 'var:preset|spacing|mini',
									},
								},
								elements: {
									link: { color: { text: 'var:preset|color|main-dark' } },
								},
							},
							fontSize: 'xx-small',
							borderColor: 'main-dark',
							url: 'https://github.com/Maksym-Marko/Olenka',
							children: ['Visit GitHub'],
						},
					],
				],
			],
		],
	],
];

const ImagePlaceholderIcon = () => (
	<svg
		className="mx-auto"
		xmlns="http://www.w3.org/2000/svg"
		width="49"
		height="49"
		viewBox="0 0 49 49"
		fill="none"
	>
		<path
			d="M41 8.375H8C7.30381 8.375 6.63613 8.65156 6.14384 9.14384C5.65156 9.63613 5.375 10.3038 5.375 11V38C5.375 38.6962 5.65156 39.3639 6.14384 39.8562C6.63613 40.3484 7.30381 40.625 8 40.625H41C41.6962 40.625 42.3639 40.3484 42.8562 39.8562C43.3484 39.3639 43.625 38.6962 43.625 38V11C43.625 10.3038 43.3484 9.63613 42.8562 9.14384C42.3639 8.65156 41.6962 8.375 41 8.375ZM8 10.625H41C41.0995 10.625 41.1948 10.6645 41.2652 10.7348C41.3355 10.8052 41.375 10.9005 41.375 11V31.1694L35.8494 25.6438C35.6056 25.4 35.3162 25.2066 34.9977 25.0747C34.6792 24.9427 34.3379 24.8748 33.9931 24.8748C33.6484 24.8748 33.307 24.9427 32.9885 25.0747C32.67 25.2066 32.3806 25.4 32.1369 25.6438L28.1206 29.66L19.6063 21.1437C19.3625 20.9 19.0731 20.7066 18.7546 20.5747C18.4361 20.4427 18.0947 20.3748 17.75 20.3748C17.4053 20.3748 17.0639 20.4427 16.7454 20.5747C16.4269 20.7066 16.1375 20.9 15.8937 21.1437L7.625 29.4125V11C7.625 10.9005 7.66451 10.8052 7.73483 10.7348C7.80516 10.6645 7.90054 10.625 8 10.625ZM7.625 38V32.5944L17.4838 22.7356C17.5186 22.7005 17.5601 22.6726 17.6058 22.6535C17.6515 22.6345 17.7005 22.6247 17.75 22.6247C17.7995 22.6247 17.8485 22.6345 17.8942 22.6535C17.9399 22.6726 17.9814 22.7005 18.0162 22.7356L33.6556 38.375H8C7.90054 38.375 7.80516 38.3355 7.73483 38.2652C7.66451 38.1948 7.625 38.0995 7.625 38ZM41 38.375H36.8375L29.7125 31.25L33.7269 27.2337C33.7617 27.1989 33.8031 27.1712 33.8486 27.1524C33.8941 27.1335 33.9429 27.1238 33.9922 27.1238C34.0415 27.1238 34.0903 27.1335 34.1358 27.1524C34.1813 27.1712 34.2227 27.1989 34.2575 27.2337L41.3825 34.3587V38C41.3825 38.0499 41.3726 38.0993 41.3533 38.1453C41.3339 38.1913 41.3056 38.2329 41.27 38.2679C41.2344 38.3028 41.1922 38.3302 41.1458 38.3486C41.0994 38.367 41.0499 38.376 41 38.375ZM27.875 19.25C27.875 18.8792 27.985 18.5166 28.191 18.2083C28.397 17.9 28.6899 17.6596 29.0325 17.5177C29.3751 17.3758 29.7521 17.3387 30.1158 17.411C30.4795 17.4834 30.8136 17.662 31.0758 17.9242C31.3381 18.1864 31.5166 18.5205 31.589 18.8842C31.6613 19.2479 31.6242 19.6249 31.4823 19.9675C31.3404 20.3101 31.1 20.603 30.7917 20.809C30.4834 21.015 30.1208 21.125 29.75 21.125C29.2527 21.125 28.7758 20.9275 28.4242 20.5758C28.0725 20.2242 27.875 19.7473 27.875 19.25Z"
			fill="#F2F2E9"
		/>
	</svg>
);

export default function edit({ attributes, setAttributes }) {
	const { imageUrl, imageId, imageAlt, imageOpacity, showBorderBottom } = attributes;

	const blockProps = useBlockProps();

	const onSelectImage = (media) => {
		setAttributes({
			imageUrl: media.url,
			imageId: media.id,
			imageAlt: media.alt || '',
		});
	};

	const removeImage = () => {
		setAttributes({ imageUrl: '', imageId: 0, imageAlt: '' });
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Image Settings', metadata.textdomain)}>

					{imageUrl && (
						<>
							<div className="mb-4">
								<img
									src={imageUrl}
									alt={imageAlt}
									className="max-w-full h-auto rounded"
								/>
							</div>

							<div className="mb-4">
								<TextControl
									__next40pxDefaultSize
									__nextHasNoMarginBottom
									label={__('Alt Text', metadata.textdomain)}
									value={imageAlt}
									onChange={value => setAttributes({ imageAlt: value })}
									placeholder={__('Describe the image…', metadata.textdomain)}
								/>
							</div>

							<RangeControl
								__next40pxDefaultSize
								__nextHasNoMarginBottom
								label={__('Opacity', metadata.textdomain)}
								value={imageOpacity}
								onChange={value => setAttributes({ imageOpacity: value })}
								min={0}
								max={1}
								step={0.05}
							/>
						</>
					)}

					<div className="mt-2 flex gap-2 flex-wrap">
						<MediaUploadCheck>
							<MediaUpload
								onSelect={onSelectImage}
								allowedTypes={['image']}
								value={imageId}
								render={({ open }) => (
									<>
										<Button onClick={open} variant="secondary">
											{imageUrl
												? __('Replace Image', metadata.textdomain)
												: __('Choose Image', metadata.textdomain)}
										</Button>
										{imageUrl && (
											<Button onClick={removeImage} variant="link" isDestructive>
												{__('Remove', metadata.textdomain)}
											</Button>
										)}
									</>
								)}
							/>
						</MediaUploadCheck>
					</div>

				</PanelBody>

				<PanelBody title={__('Content Settings', metadata.textdomain)}>

					<div className="mt-6">
						<ToggleControl
							__nextHasNoMarginBottom
							label={__('Show Border Bottom', metadata.textdomain)}
							checked={showBorderBottom}
							onChange={(val) => setAttributes({ showBorderBottom: val })}
						/>

					</div>
				</PanelBody>

			</InspectorControls>

			<div {...blockProps}>
				<div className={`py-20 md:py-24${showBorderBottom ? ' border-b border-coffee-02' : ''}`}>
					<div className="max-w-5xl mx-auto px-6">
						<div className="flex flex-col md:flex-row gap-8 md:gap-10">

							<div className="flex-shrink-0 flex flex-col items-start gap-2 md:pt-10">
								<MediaUploadCheck>
									<MediaUpload
										onSelect={onSelectImage}
										allowedTypes={['image']}
										value={imageId}
										render={({ open }) => (
											<div
												role="button"
												onClick={open}
												className="bg-coffee-01 aspect-[480/640] w-[180px] flex flex-col items-center justify-center gap-2 flex-shrink-0 pt-2 rounded-md overflow-hidden cursor-pointer"
												style={{ opacity: imageOpacity }}
												title={__('Click to select image', metadata.textdomain)}
											>
												{imageUrl ? (
													<img
														src={imageUrl}
														alt={imageAlt}
														className="w-full h-full object-cover"
													/>
												) : (
													<>
														<ImagePlaceholderIcon />
														<p className="text-base text-coffee-03">
															{__('Add image', metadata.textdomain)}
														</p>
													</>
												)}
											</div>
										)}
									/>
								</MediaUploadCheck>
							</div>

							<div className="min-w-0 max-w-xl">
								<InnerBlocks
									allowedBlocks={ALLOWED_BLOCKS}
									template={TEMPLATE}
									templateLock={false}
								/>
							</div>

						</div>
					</div>
				</div>
			</div>
		</>
	);
}
