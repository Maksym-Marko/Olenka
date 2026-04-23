<?php

/**
 * The Olenka Enqueue Scripts class.
 *
 * @since 1.0.0
 */

namespace OLENKA\Hooks;

class EnqueueScripts
{
    public function __construct()
    {

        add_action('wp_enqueue_scripts', [$this, 'frontendAssets']);

        add_action('enqueue_block_assets', [$this, 'editorAssets']);

        add_action('enqueue_block_assets', [$this, 'editorFrontendAssets']);

        add_action('enqueue_block_assets', [$this, 'blockEditorAssets']);

        add_action('admin_enqueue_scripts', [$this, 'adminAssets']);
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
        $frontendStyleFile = '/dist/frontend.css';
        $frontendStylePath = get_stylesheet_directory() . $frontendStyleFile;

        if (file_exists($frontendStylePath)) {
            wp_enqueue_style(
                'olenka-frontend-style',
                get_stylesheet_directory_uri() . $frontendStyleFile,
                [],
                filemtime($frontendStylePath)
            );
        }

        /**
         *  Frontend Scripts.
         * */
        $frontendScriptFile = '/dist/frontend.js';
        $frontendScriptPath = get_stylesheet_directory() . $frontendScriptFile;

        if (file_exists($frontendScriptPath)) {
            wp_enqueue_script(
                'olenka-frontend-script',
                get_stylesheet_directory_uri() . $frontendScriptFile,
                ['jquery'],
                filemtime($frontendScriptPath),
                true
            );
        }
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
            $editorStyleFile = '/dist/editor.css';
            $editorStylePath = get_stylesheet_directory() . $editorStyleFile;

            if (file_exists($editorStylePath)) {
                wp_enqueue_style(
                    'olenka-editor-style',
                    get_stylesheet_directory_uri() . $editorStyleFile,
                    [],
                    filemtime($editorStylePath)
                );
            }

            /**
             * Editor Scripts.
             * */
            $editorScriptFile = '/dist/editor.js';
            $editorScriptPath = get_stylesheet_directory() . $editorScriptFile;

            if (file_exists($editorScriptPath)) {
                wp_enqueue_script(
                    'olenka-editor-script',
                    get_stylesheet_directory_uri() . $editorScriptFile,
                    ['wp-blocks'],
                    filemtime($editorScriptPath)
                );
            }
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
        $tailwindFile = '/dist/style.css';
        $tailwindPath = get_stylesheet_directory() . $tailwindFile;

        if (file_exists($tailwindPath)) {

            wp_enqueue_style(
                'olenka-tailwind',
                get_stylesheet_directory_uri() . $tailwindFile,
                [],
                filemtime($tailwindPath)
            );
        }

        /**
         * Editor/Frontend Styles.
         * */
        $editorFrontendStyleFile = '/dist/frontend-editor.css';
        $editorFrontendStylePath = get_stylesheet_directory() . $editorFrontendStyleFile;

        if (file_exists($editorFrontendStylePath)) {
            wp_enqueue_style(
                'olenka-editor-frontend-style',
                get_stylesheet_directory_uri() . $editorFrontendStyleFile,
                [],
                filemtime($editorFrontendStylePath)
            );
        }

        /**
         * Editor/Frontend Scripts.
         * */
        $editorFrontendScriptFile = '/dist/frontend-editor.js';
        $editorFrontendScriptPath = get_stylesheet_directory() . $editorFrontendScriptFile;

        if (file_exists($editorFrontendScriptPath)) {
            wp_enqueue_script(
                'olenka-editor-frontend-script',
                get_stylesheet_directory_uri() . $editorFrontendScriptFile,
                ['jquery'],
                filemtime($editorFrontendScriptPath),
                true
            );
        }

        /**
         * Aggregated block stylesheet.
         * */
        $blocksStylesFile = '/dist/blocks/index.css';
        $blocksStylesPath = get_stylesheet_directory() . $blocksStylesFile;

        if (file_exists($blocksStylesPath)) {
            wp_enqueue_style(
                'olenka-blocks-style',
                get_stylesheet_directory_uri() . $blocksStylesFile,
                [],
                filemtime($blocksStylesPath)
            );
        }
    }

    /**
     * Enqueue scripts and styles for the block editor.
     *
     * @return void
     */
    public function blockEditorAssets()
    {

        /**
         * Block Editor Scripts.
         * */
        $blocksFile  = '/dist/blocks/index.js';
        $blocksPath  = get_stylesheet_directory() . $blocksFile;
        $blocksDeps  = get_stylesheet_directory() . '/dist/blocks/index.deps.json';

        if (file_exists($blocksPath)) {

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

        /**
         * Block editor-only styles.
         * */
        $blocksEditorStylesFile = '/dist/blocks/editor.css';
        $blocksEditorStylesPath = get_stylesheet_directory() . $blocksEditorStylesFile;

        if (file_exists($blocksEditorStylesPath)) {
            wp_enqueue_style(
                'olenka-blocks-editor-style',
                get_stylesheet_directory_uri() . $blocksEditorStylesFile,
                [],
                filemtime($blocksEditorStylesPath)
            );
        }
    }

    /**
     * Enqueue scripts and styles for the WordPress admin area.
     *
     * @return void
     */
    public function adminAssets()
    {
        /**
         * Admin Styles.
         * */
        $adminStyleFile = '/dist/admin.css';
        $adminStylePath = get_stylesheet_directory() . $adminStyleFile;

        if (file_exists($adminStylePath)) {
            wp_enqueue_style(
                'olenka-admin-style',
                get_stylesheet_directory_uri() . $adminStyleFile,
                [],
                filemtime($adminStylePath)
            );
        }

        /**
         * Admin Scripts.
         * */
        $adminScriptFile = '/dist/admin.js';
        $adminScriptPath = get_stylesheet_directory() . $adminScriptFile;

        if (file_exists($adminScriptPath)) {
            wp_enqueue_script(
                'olenka-admin-script',
                get_stylesheet_directory_uri() . $adminScriptFile,
                ['jquery'],
                filemtime($adminScriptPath),
                true
            );
        }
    }
}
