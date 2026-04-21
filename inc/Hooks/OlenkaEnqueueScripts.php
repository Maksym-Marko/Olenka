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

        add_action('enqueue_block_editor_assets', [$this, 'blockEditorAssets']);
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
            get_template_directory_uri() . '/dist/frontend.css',
            array(),
            OLENKA_THEME_VERSION
        );

        /**
         *  Frontend Scripts.
         * */
        wp_enqueue_script(
            'olenka-frontend-script',
            get_template_directory_uri() . '/dist/frontend.js',
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
                get_template_directory_uri() . '/dist/editor.css',
                array(),
                OLENKA_THEME_VERSION
            );

            /**
             * Editor Scripts.
             * */
            wp_enqueue_script(
                'olenka-editor-script',
                get_template_directory_uri() . '/dist/editor.js',
                array('wp-blocks'),
                OLENKA_THEME_VERSION
            );
        }
    }

    /**
     * Enqueue scripts and styles loaded for both the site frontend and the
     * block editor (including Tailwind utilities used inside blocks).
     *
     * @return void
     */
    public function editorFrontendAssets()
    {
        /**
         * TailwindCSS — shared by the frontend and the block editor.
         * */
        wp_enqueue_style(
            'olenka-tailwind',
            get_template_directory_uri() . '/dist/style.css',
            array(),
            OLENKA_THEME_VERSION
        );

        /**
         * Editor/Frontend Styles.
         * */
        wp_enqueue_style(
            'olenka-editor-frontend-style',
            get_template_directory_uri() . '/dist/frontend-editor.css',
            array(),
            OLENKA_THEME_VERSION
        );

        /**
         * Editor/Frontend Scripts.
         * */
        wp_enqueue_script(
            'olenka-editor-frontend-script',
            get_template_directory_uri() . '/dist/frontend-editor.js',
            array('jquery'),
            OLENKA_THEME_VERSION,
            true
        );
    }

    /**
     * Enqueue scripts and styles for the block editor.
     *
     * @return void
     */
    public function blockEditorAssets()
    {

        // Block Editor Scripts.
        $blocksFile  = '/dist/blocks/index.js';
        $blocksPath  = get_stylesheet_directory() . $blocksFile;
        $blocksDeps  = get_stylesheet_directory() . '/dist/blocks/index.deps.json';

        if (file_exists($blocksPath)) {
            /**
             * Vite rewrites bare `@wordpress/*` (and React) imports into
             * references to the `wp.*` / React globals at build time, so the
             * bundle is a classic script — NOT an ES module — that just
             * needs the matching WordPress script handles to be loaded
             * first. The handle list is written by the Vite build to
             * `dist/blocks/index.deps.json` and read here so the two stay
             * in sync automatically.
             */
            $deps = [];

            if (file_exists($blocksDeps)) {
                $decoded = json_decode(file_get_contents($blocksDeps), true);

                if (is_array($decoded)) {
                    $deps = $decoded;
                }
            }

            wp_enqueue_script(
                'olenka-blocks-script',
                get_stylesheet_directory_uri() . $blocksFile,
                $deps,
                filemtime($blocksPath),
                true
            );
        }

        // Block Editor Styles.
        $blocksStylesFile = '/dist/blocks/style.css';
        $blocksStylesPath = get_stylesheet_directory() . $blocksStylesFile;

        // Only enqueue if the file exists to avoid filemtime() warnings
        if (file_exists($blocksStylesPath)) {
            wp_enqueue_style(
                'olenka-blocks-style',
                get_stylesheet_directory_uri() . $blocksStylesFile,
                [],
                filemtime($blocksStylesPath)
            );
        }
    }
}
