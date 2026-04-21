<?php

/**
 * The Olenka Enqueue Scripts class.
 *
 * @since 1.0.0
 */

namespace OLENKA\Hooks;

class OlenkaEnqueueScripts
{
    public function __construct()
    {

        add_action('wp_enqueue_scripts', [$this, 'frontendAssets']);

        add_action('enqueue_block_assets', [$this, 'editorAssets']);

        add_action('enqueue_block_assets', [$this, 'editorFrontendAssets']);
    }

    /**
     * Enqueue scripts and styles on the website frontend.
     * 
     * @return void
     */
    public function frontendAssets()
    {

        /**
         *  Frontend Styles.
         * */
        wp_enqueue_style(
            'olenka-frontend-style',
            get_template_directory_uri() . '/assets/dist/index.css',
            array(),
            OLENKA_THEME_VERSION
        );

        /**
         *  Frontend Scripts.
         * */
        wp_enqueue_script(
            'olenka-frontend-script',
            get_template_directory_uri() . '/assets/dist/index.js',
            array('jquery'),
            OLENKA_THEME_VERSION,
            true
        );
    }

    /**
     * Enqueue scripts and styles for the website editor.
     * 
     * @return void
     */
    public function editorAssets()
    {
        /**
         * Check If it is admin part.
         * */
        if (is_admin()) {
            /**
             * Editor Styles.
             * */
            wp_enqueue_style(
                'olenka-editor-style',
                get_template_directory_uri() . '/assets/dist/index3.css',
                array(),
                OLENKA_THEME_VERSION
            );

            /**
             * Editor Scripts.
             * */
            wp_enqueue_script(
                'olenka-editor-script',
                get_template_directory_uri() . '/assets/dist/index3.js',
                array('wp-blocks'),
                OLENKA_THEME_VERSION
            );
        }
    }

    /**
     * Enqueue scripts and styles for the website editor and frontend.
     * 
     * @return void
     */
    public function editorFrontendAssets()
    {
        /**
         * Editor/Frontend Styles.
         * */
        wp_enqueue_style(
            'olenka-editor-frontend-style',
            get_template_directory_uri() . '/assets/dist/index2.css',
            array(),
            OLENKA_THEME_VERSION
        );
    }
}
