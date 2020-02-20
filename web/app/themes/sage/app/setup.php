<?php

/**
 * Theme setup.
 *
 * @copyright https://roots.io/ Roots
 * @license   https://opensource.org/licenses/MIT MIT
 */

namespace App;

use Illuminate\Support\Collection;
use function Roots\asset;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    /** Dequeue jQuery unless it's needed */
    ! is_admin()
        && ! is_admin_bar_showing()
        && ! has_block('pdf-viewer-block/standard', get_the_id())
        && (function () {
            wp_dequeue_script('jquery');
            wp_deregister_script('jquery');
            wp_register_script('jquery', null);
        })();

    /** Dequeue block-library CSS */
    wp_dequeue_style('wp-block-library');
    wp_deregister_style('wp-block-library');
    wp_register_style('wp-block-library', null);

    /** Dequeue wp-performant-media JS  */
    wp_dequeue_script('wp-performant-media.js');
    wp_deregister_script('wp-performant-media.js');
    wp_register_script('wp-performant-media.js', null);

    /** Dequeue wp-performant-media CSS  */
    wp_dequeue_style('wp-performant-media.css');
    wp_deregister_style('wp-performant-media.css');
    wp_register_style('wp-performant-media.css', null);

    /** Dequeue PDF viewer CSS (bundled in app) */
    wp_dequeue_style('pdf-viewer-block-styles');
    wp_deregister_style('pdf-viewer-block-styles');
    wp_register_style('pdf-viewer-block-styles', null);

    /** Dequeue PDF viewer JS if unused */
    ! has_block('pdf-viewer-block/standard', get_the_id()) && (function () {
        wp_dequeue_script('pdf-viewer-block-scripts');
        wp_deregister_script('pdf-viewer-block-scripts');
        wp_register_script('pdf-viewer-block-scripts', null);
    })();

    /** Enqueue application vendor JS 🙏🏽 */
    wp_enqueue_script('sage/vendor', asset('build/scripts/vendor.js')->uri(), ['jquery'], null, true);

    /** Enqueue application JS */
    wp_enqueue_script('sage/compiled', asset('scripts/compiled.js')->uri(), ['sage/vendor'], null, true);

    /** Inlined vendor */
    wp_add_inline_script('sage/vendor', asset('manifest.js')->contents(), 'before');

    /** Poor man's inertia.js 😂 */
    wp_localize_script('sage/compiled.js', 'sage', [
        'isPage'      => is_page(),
        'isHome'      => is_home(),
        'isFrontPage' => is_front_page(),
    ]);

    /** Enqueue application styles */
    wp_enqueue_style('sage/compiled.css', asset('styles/compiled.css')->uri(), false, null);
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_script('sage/editor-theme.js', asset('scripts/editor.js')->uri(), ['wp-polyfill', 'wp-dom', 'wp-edit-post'], time());

    wp_enqueue_style('sage/editor-theme.css', asset('styles/editor-theme.css')->uri(), false, null);
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
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

    /**
     * Enable post thumbnails
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Add theme support for Wide Alignment
     *
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
     */
    add_theme_support('align-wide');

    /**
     * Enable responsive embeds
     *
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     *
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Enable wide and full alignments.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment
     */
    add_theme_support('align-wide');

    /**
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

    /**
     * Disable custom block editor font sizes
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-font-sizes
     */
    add_theme_support('disable-custom-font-sizes');

    /**
     * Disable block editor color palettes
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes
     */
    add_theme_support('disable-custom-colors');

    /**
     * Enable theme color palette support
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
     */
    add_theme_support('editor-color-palette', [
        [
            'name'  => __('Primary', 'sage'),
            'slug'  => 'primary',
            'color' => 'rgba(253, 225, 53, 1)',
        ],
        [
            'name'  => __('Accent', 'sage'),
            'slug'  => 'accent',
            'color' => 'rgba(91, 214, 255, 1)',
        ],
        [
            'name'  => __('Black', 'sage'),
            'slug'  => 'black',
            'color' => 'rgba(0, 0, 0, 1)',
        ],
        [
            'name' => __('White', 'sage'),
            'slug' => 'white',
            'color' => 'rgba(255, 255, 255, 1)',
        ],
    ]);
}, 20);

/**
 * Standard Post Posttype
 */
add_action('init', function () {
    $post = get_post_type_object('post');

    $post->template = [
        ['tinypixel/post-container'],
        ['tinypixel/container'],
    ];

    $post->template_lock = 'INSERT';
    register_post_type('post', $post);
});

/**
 * Freedom Papers PostType
 */
register_post_type('freedom-papers', [
    'capability_type' => 'post',
    'has_archive' => true,
    'show_in_rest' => true,
    'labels' => [
        'name'          => __('Freedom Papers', 'sage'),
        'menu_name'     => __('Freedom Papers', 'sage'),
        'singular_name' => __('Freedom Paper', 'sage'),
    ],
    'menu_icon' => 'dashicons-pressthis',
    'public' => true,
    'rewrite' => ['slug' => 'freedom-papers'],
    'supports' => ['title', 'thumbnail', 'editor', 'meta', 'page-attributes'],
    'template' => [['tinypixel/freedom-paper']],
    'template_lock' => 'insert',
]);

/**
 * Projects PostType
 */
register_post_type('projects', [
    'capability_type' => 'post',
    'has_archive' => true,
    'show_in_rest' => true,
    'labels' => [
        'name' => __('Projects', 'sage'),
        'menu_name' => __('Projects', 'sage'),
        'singular_name' => __('Project', 'sage'),
    ],
    'menu_icon' => 'dashicons-lightbulb',
    'public' => true,
    'rewrite' => ['slug' => 'projects'],
    'supports' => ['title', 'thumbnail', 'editor', 'meta', 'page-attributes'],
    'template' => [
        ['tinypixel/project-container'],
        ['tinypixel/container'],
    ],
    'template_lock' => 'insert',
]);
