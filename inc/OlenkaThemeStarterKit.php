<?php

/**
 * The Olenka Theme Starter Kit class.
 *
 * @since 1.0.0
 */

namespace OLENKA;

use OLENKA\Hooks\EnqueueScripts;
use OLENKA\Hooks\GutenbergBlocks;

class OlenkaThemeStarterKit
{
    public function __construct()
    {

        /**
         * Initialize the Olenka Enqueue Scripts.
         */
        new EnqueueScripts();

        /**
         * Initialize the Olenka Gutenberg Blocks.
         */
        new GutenbergBlocks();
    }
}
