import { __ } from '@wordpress/i18n';
import {
  useBlockProps,
  InspectorControls,
  RichText,
  PanelColorSettings,
} from '@wordpress/block-editor';
import { PanelBody, SelectControl, TextControl, RangeControl } from '@wordpress/components';
import { useSelect } from '@wordpress/data';

export default function Edit({ attributes, setAttributes }) {
  const {
    postType,
    numberOfPosts,
    sectionLabel,
    heading,
    description,
    viewAllText,
    viewAllUrl,
    backgroundColor,
  } = attributes;

  const blockProps = useBlockProps();

  const posts = useSelect(
    (select) =>
      select('core').getEntityRecords('postType', postType, {
        per_page: numberOfPosts,
        _embed: true,
        status: 'publish',
      }),
    [postType, numberOfPosts]
  );

  const postTypeOptions = [
    { label: __('Posts', 'olenka'), value: 'post' },
    { label: __('Pages', 'olenka'), value: 'page' },
  ];

  const placeholderColors = ['bg-coffee-02', 'bg-sand-01', 'bg-sand-02'];
  const lineWidths = ['w-1/2', 'w-2/3', 'w-1/3'];

  const sectionStyle = backgroundColor ? { backgroundColor } : {};
  const sectionClass = [
    'py-24 md:py-28 border-b border-coffee-02',
    !backgroundColor ? 'bg-coffee-01' : '',
  ]
    .filter(Boolean)
    .join(' ');

  return (
    <div {...blockProps}>
      <InspectorControls>
        <PanelColorSettings
          title={__('Color', 'olenka')}
          colorSettings={[
            {
              value: backgroundColor,
              onChange: (value) => setAttributes({ backgroundColor: value || '' }),
              label: __('Background Color', 'olenka'),
            },
          ]}
        />
        <PanelBody title={__('Posts Settings', 'olenka')}>
          <SelectControl
            label={__('Post Type', 'olenka')}
            value={postType}
            options={postTypeOptions}
            onChange={(value) => setAttributes({ postType: value })}
          />
          <RangeControl
            __next40pxDefaultSize
            __nextHasNoMarginBottom
            label={__('Number of Posts', 'olenka')}
            value={numberOfPosts}
            onChange={(value) => setAttributes({ numberOfPosts: value })}
            min={1}
            max={6}
          />
          <TextControl
            label={__('View All URL', 'olenka')}
            value={viewAllUrl}
            onChange={(value) => setAttributes({ viewAllUrl: value })}
          />
        </PanelBody>
      </InspectorControls>

      <div id="blog" className={sectionClass} style={sectionStyle}>
        <div className="max-w-5xl mx-auto px-6">
          <div className="mb-12">
            <RichText
              tagName="span"
              className="inline-block text-xs font-medium tracking-widest uppercase text-coffee-03 mb-4"
              value={sectionLabel}
              onChange={(value) => setAttributes({ sectionLabel: value })}
              placeholder={__('From the blog', 'olenka')}
              allowedFormats={[]}
            />
            <RichText
              tagName="h2"
              className="text-2xl md:text-3xl font-semibold leading-tight text-coffee-06 mb-4"
              value={heading}
              onChange={(value) => setAttributes({ heading: value })}
              placeholder={__('Latest posts', 'olenka')}
              allowedFormats={[]}
            />
            <RichText
              tagName="p"
              className="text-coffee-05 leading-relaxed max-w-2xl"
              value={description}
              onChange={(value) => setAttributes({ description: value })}
              placeholder={__('Enter a description…', 'olenka')}
              allowedFormats={['core/bold', 'core/italic']}
            />
          </div>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10">
            {posts === undefined && (
              <p className="col-span-3 text-coffee-05">{__('Loading posts…', 'olenka')}</p>
            )}
            {posts !== null && posts !== undefined && posts.length === 0 && (
              <p className="col-span-3 text-coffee-05">{__('No posts found.', 'olenka')}</p>
            )}
            {posts &&
              posts.map((post, index) => {
                const featuredMedia = post._embedded?.['wp:featuredmedia']?.[0];
                const imageUrl = featuredMedia?.source_url || '';
                const imageAlt =
                  featuredMedia?.alt_text || post.title?.rendered || '';
                const terms = post._embedded?.['wp:term']?.[0] || [];
                const categoryName = terms[0]?.name || '';
                const excerpt = post.excerpt?.rendered
                  ? post.excerpt.rendered.replace(/<[^>]+>/g, '').trim()
                  : '';
                const placeholderColor =
                  placeholderColors[index % placeholderColors.length];
                const lineWidth = lineWidths[index % lineWidths.length];

                return (
                  <article
                    key={post.id}
                    className="bg-linen rounded-xl overflow-hidden flex flex-col"
                  >
                    <div
                      className={`h-32 ${imageUrl ? '' : placeholderColor} rounded-t-xl`}
                      aria-hidden="true"
                    >
                      <div className="h-full w-full flex items-end">
                        {imageUrl ? (
                          <img
                            src={imageUrl}
                            alt={imageAlt}
                            className="w-full h-full object-cover"
                          />
                        ) : (
                          <div className="p-3 w-full">
                            <div
                              className={`h-1 ${lineWidth} rounded-full bg-coffee-03 opacity-50`}
                            ></div>
                          </div>
                        )}
                      </div>
                    </div>
                    <div className="p-6 flex flex-col flex-1">
                      {categoryName && (
                        <span className="text-xs font-medium tracking-widest uppercase text-coffee-03 mb-3">
                          {categoryName}
                        </span>
                      )}
                      <h3
                        className="text-sm font-semibold leading-tight text-coffee-06 mb-3"
                        dangerouslySetInnerHTML={{ __html: post.title?.rendered }}
                      />
                      <p className="text-sm text-coffee-05 leading-relaxed flex-1 mb-4">
                        {excerpt}
                      </p>
                      <a
                        href={post.link}
                        className="text-sm font-medium text-coffee-03 hover:text-coffee-04 transition-colors duration-150"
                      >
                        {__('Read post', 'olenka')} &rarr;
                      </a>
                    </div>
                  </article>
                );
              })}
          </div>

          <div className="text-center">
            <RichText
              tagName="span"
              className="text-sm font-medium text-coffee-03 transition-colors duration-150"
              value={viewAllText}
              onChange={(value) => setAttributes({ viewAllText: value })}
              placeholder={__('View all posts →', 'olenka')}
              allowedFormats={[]}
            />
          </div>
        </div>
      </div>
    </div>
  );
}
