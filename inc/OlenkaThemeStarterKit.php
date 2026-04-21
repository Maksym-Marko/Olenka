<?php 

/**
 * The Olenka Theme Starter Kit class.
 *
 * @since 1.0.0
 */

namespace OLENKA;

use OLENKA\Hooks\OlenkaEnqueueScripts;

class OlenkaThemeStarterKit
{
    public function __construct()
    {

        /**
         * Initialize the Olenka Enqueue Scripts.
         */
        new OlenkaEnqueueScripts();
    }
}