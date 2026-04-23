<?php

/**
 * The Olenka Gutenberg Blocks class.
 *
 * @since 1.0.0
 */

namespace OLENKA\Hooks;

class GutenbergBlocks
{
    public function __construct()
    {

        add_action('init', [$this, 'registerBlocks']);

        add_filter('block_categories_all', [$this, 'registerBlockCategories'], 10);

        add_filter('block_type_metadata', [$this, 'setAboutBlockDefaults']);
    }

    /**
     * Register Gutenberg blocks.
     * 
     * @return void
     */
    public function registerBlocks()
    {

        $blocksDir = get_stylesheet_directory() . '/dist/blocks';

        if (! is_dir($blocksDir)) {
            return;
        }

        foreach (glob($blocksDir . '/*/block.json') as $blockJson) {
            register_block_type_from_metadata(dirname($blockJson));
        }
    }

    /**
     * Set dynamic defaults for the about block that depend on the theme URL.
     *
     * @param array $metadata Block metadata.
     * @return array
     */
    public function setAboutBlockDefaults(array $metadata): array
    {
        if (($metadata['name'] ?? '') !== 'olenka/about') {
            return $metadata;
        }

        $metadata['attributes']['imageUrl']['default'] =
            get_stylesheet_directory_uri() . '/assets/images/maksym-marko.png';

        return $metadata;
    }

    /**
     * Register Gutenberg categories.
     * 
     * @return void
     */
    public function registerBlockCategories(array $categories)
    {

        array_unshift($categories, [
            'slug'  => 'olenka-general',
            'title' => __('Olenka - General', 'olenka'),
        ]);

        return $categories;
    }
}
