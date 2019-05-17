<?php

namespace App;

use function Roots\app;
use function Roots\asset;
use function Roots\config;
use function Roots\view;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {

    wp_add_inline_script('sage/vendor', asset('scripts/manifest.js')->contents(), 'before');
    wp_enqueue_script('sage/app', asset('scripts/app.js'), [], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    $styles = ['styles/app.css'];

    foreach ($styles as $stylesheet) {
        if (asset($stylesheet)->exists()) {
            wp_enqueue_style('sage/'.basename($stylesheet, '.css'), asset($stylesheet)->uri(), false, null);
        } else {
            die();
        }
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Add theme support for Wide Alignment
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
     */
    add_theme_support('align-wide');

    /**
     * Enable responsive embeds
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Dequeue Gutenberg CSS
     * @link https://wordpress.org/gutenberg/?s=dequeue (404)
     */
    add_action('wp_enqueue_scripts', function () {
        wp_dequeue_style('wp-block-library');
    }, 100);

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/tinymce.scss
     */
    add_editor_style(asset('styles/editor.css')->uri());
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary'
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer'
    ] + $config);
});

/**
 * Block Editor Scripts
 */
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style(
        'sage-editor-styles',
        get_theme_file_uri('storage/theme/assets/styles/editor.css'),
        false,
        '1.0',
        'all'
    );
});
