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
