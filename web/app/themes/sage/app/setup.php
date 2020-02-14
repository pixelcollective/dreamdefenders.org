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
    wp_enqueue_script('sage/vendor.js', asset('scripts/vendor.js')->uri(), [], null, true);

    wp_enqueue_script('sage/app.js', asset('scripts/app.js')->uri(), ['sage/vendor.js', 'wp-dom-ready'], null, true);
    wp_localize_script('sage/app.js', 'sage', [
        'post'        => get_post(),
        'isPage'      => (bool) is_page(),
        'isFrontPage' => (bool) is_front_page(),
        'isHome'      => (bool) is_home(),
    ]);

    wp_add_inline_script('sage/vendor.js', asset('scripts/manifest.js')->contents(), 'before');

    wp_enqueue_style('sage/app.css', asset('styles/app.css')->uri(), false, null);
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    if ($manifest = asset('scripts/manifest.asset.php')->get()) {
        wp_enqueue_script(
            'sage/editor.js',
            asset('scripts/editor.js')->uri(),
            $manifest['dependencies'],
            $manifest['version']
        );

        wp_add_inline_script('sage/editor.js', asset('scripts/manifest.js')->contents(), 'before');
    }

    wp_enqueue_style('sage/editor.css', asset('styles/editor.css')->uri(), false, null);
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
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'about_us'           => __('About Us', 'sage'),
        'our_vision'         => __('Our Vision', 'sage'),
        'our_work'           => __('Our Work', 'sage'),
        'our_community'      => __('Our Community', 'sage'),
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
        ]
    ]);

    /**
     * Disable block editor color palettes
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes
     */
    add_theme_support('disable-custom-colors');
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
    'supports' => ['title', 'thumbnail', 'editor', 'meta'],
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
    'supports' => ['title', 'thumbnail', 'editor', 'meta'],
    'template' => [
        ['tinypixel/project-container'],
        ['tinypixel/container'],
    ],
    'template_lock' => 'insert',
]);
