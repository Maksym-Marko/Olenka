<?php

/**
 * The Olenka Gutenberg Blocks class.
 *
 * @since 1.0.0
 */

namespace OLENKA\Hooks;

class OlenkaGutenbergBlocks
{
    public function __construct()
    {

        add_action('init', [$this, 'registerBlocks']);
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
}
