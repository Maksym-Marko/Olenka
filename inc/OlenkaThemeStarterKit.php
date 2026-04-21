<?php

/**
 * The Olenka Theme Starter Kit class.
 *
 * @since 1.0.0
 */

namespace OLENKA;

use OLENKA\Hooks\OlenkaEnqueueScripts;
use OLENKA\Hooks\OlenkaGutenbergBlocks;

class OlenkaThemeStarterKit
{
    public function __construct()
    {

        /**
         * Initialize the Olenka Enqueue Scripts.
         */
        new OlenkaEnqueueScripts();

        /**
         * Initialize the Olenka Gutenberg Blocks.
         */
        new OlenkaGutenbergBlocks();
    }
}
