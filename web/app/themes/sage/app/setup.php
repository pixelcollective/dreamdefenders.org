<?php

/**
 * Theme setup.
 *
 * @copyright https://roots.io/ Roots
 * @license   https://opensource.org/licenses/MIT MIT
 */

namespace App;

use function Roots\asset;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('sage/vendor.js', asset('scripts/vendor.js')->uri(), ['jquery'], null, true);
    wp_enqueue_script('sage/app.js', asset('scripts/app.js')->uri(), ['sage/vendor.js'], null, true);

    wp_add_inline_script('sage/vendor.js', asset('scripts/manifest.js')->contents(), 'before');

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_style('sage/app.css', asset('styles/app.css')->uri(), false, null);

    /* Poor man's inertia.js 😂 */
    wp_localize_script('sage/app.js', 'sage', [
        'isPage' => is_page(),
        'isHome' => is_home(),
        'isFrontPage' => is_front_page(),
    ]);
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    if ($manifest = asset('scripts/manifest.asset.php')->load()) {
        wp_enqueue_script('sage/vendor.js', asset('scripts/vendor.js')->uri(), ...array_values($manifest));
        wp_enqueue_script('sage/editor.js', asset('scripts/editor.js')->uri(), ['sage/vendor.js'], null, true);

        wp_add_inline_script('sage/vendor.js', asset('scripts/manifest.js')->contents(), 'before');
    }

    wp_enqueue_style('sage/editor.css', asset('styles/editor.css')->uri(), false, null);
}, 100);

/*
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /*
     * Enable features from Soil when plugin is activated
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /*
     * Enable plugins to manage the document title
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /*
     * Register navigation menus
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'about_us' => __('About Us (overlay)', 'sage'),
        'our_vision' => __('Our Vision (overlay)', 'sage'),
        'our_work' => __('Our Work (overlay)', 'sage'),
        'footer_left' => __('Footer left', 'sage'),
        'footer_right' => __('Footer right', 'sage'),
    ]);

    /*
     * Enable post thumbnails
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /*
     * Add theme support for Wide Alignment
     *
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
     */
    add_theme_support('align-wide');

    /*
     * Enable responsive embeds
     *
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /*
     * Enable HTML5 markup support
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /*
     * Enable selective refresh for widgets in customizer
     *
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /*
     * Enable wide and full alignments.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment
     */
    add_theme_support('align-wide');

    /*
     * Set font sizes for the editor
     *
     * @link https://github.com/WordPress/gutenberg/blob/master/docs/designers-developers/developers/themes/theme-support.md#block-font-sizes
     */
    add_theme_support('editor-font-sizes', [
        [
            'name' => __('Small', 'sage'),
            'size' => '1rem',
            'slug' => 'small',
        ],
        [
            'name' => __('Regular', 'sage'),
            'size' => '1.2rem',
            'slug' => 'regular',
        ],
        [
            'name' => __('Large', 'sage'),
            'size' => '1.8rem',
            'slug' => 'large',
        ],
    ]);

    /*
     * Disable custom block editor font sizes
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-font-sizes
     */
    add_theme_support('disable-custom-font-sizes');

    /*
     * Disable block editor color palettes
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes
     */
    add_theme_support('disable-custom-colors');

    /*
     * Enable theme color palette support
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
     */
    add_theme_support('editor-color-palette', [
        [
            'name' => __('Primary', 'sage'),
            'slug' => 'primary',
            'color' => 'rgba(253, 225, 53, 1)',
        ],
        [
            'name' => __('Accent', 'sage'),
            'slug' => 'accent',
            'color' => 'rgba(91, 214, 255, 1)',
        ],
        [
            'name' => __('Black', 'sage'),
            'slug' => 'black',
            'color' => 'rgba(0, 0, 0, 1)',
        ],
        [
            'name' => __('White', 'sage'),
            'slug' => 'white',
            'color' => 'rgba(255, 255, 255, 1)',
        ],
    ]);
}, 20);
