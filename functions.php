<?php

/**
 * This file contains functions and hooks.
 *
 * @package Olenka Theme Starter Kit
 * @author Maksym Marko <markomaksym@gmail.com>
 *
 * @link https://markomaksym.com.ua/
 */

require_once get_template_directory() . '/vendor/autoload.php';

/**
 * Define version to use it with JS and CSS files.
 */
if (! defined('OLENKA_THEME_VERSION')) {

    define('OLENKA_THEME_VERSION', wp_get_theme()->get('Version'));
}

/**
 * Initialize the Olenka Theme Starter Kit.
 */
new \OLENKA\OlenkaThemeStarterKit();
