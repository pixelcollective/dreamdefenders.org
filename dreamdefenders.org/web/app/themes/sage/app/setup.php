<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Theme assets
 */
add_action(
    'wp_enqueue_scripts',
    function () {
        wp_enqueue_style(
            'sage/main.css',
            asset_path('styles/main.css'),
            false,
            null
        );

        wp_enqueue_script(
            'sage/main.js',
            asset_path('scripts/main.js'),
            ['jquery'],
            null,
            true
        );

        if (is_single() &&
            comments_open() &&
            get_option('thread_comments')) :
            wp_enqueue_script('comment-reply');
        endif;
    },
    100
);

/**
 * Theme setup
 */
add_action(
    'after_setup_theme',
    function () {

        /**
         * Enable features from Soil when plugin is activated
         *
         * @link https://roots.io/plugins/soil/
         */
        add_theme_support('soil-clean-up');
        add_theme_support('soil-jquery-cdn');
        add_theme_support('soil-nav-walker');
        add_theme_support('soil-nice-search');
        add_theme_support('soil-relative-urls');

        /**
         * Add theme support for Wide Alignment
         *
         * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
         */
        add_theme_support('align-wide');

        /**
         * Add editor styles
         *
         * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#editor-styles
         */
        add_theme_support('editor-styles');

        // add_theme_support( 'dark-editor-styles');
        // add_editor_style( 'style-editor.css' );

        /**
         * Enable responsive embeds
         *
         * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
         */
        add_theme_support('responsive-embeds');

        /**
         * Enable Editor color palette support
         *
         * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#block-color-palettes
         */
        add_theme_support(
            'editor-color-palette',
            array(
                array(
                'name' => __('strong magenta', 'sage'),
                'slug' => 'strong-magenta',
                'color' => '#a156b4',
                ),
                array(
                'name' => __('light grayish magenta', 'sage'),
                'slug' => 'light-grayish-magenta',
                'color' => '#d0a5db',
                ),
                array(
                'name' => __('very light gray', 'sage'),
                'slug' => 'very-light-gray',
                'color' => '#eee',
                ),
                array(
                'name' => __('very dark gray', 'sage'),
                'slug' => 'very-dark-gray',
                'color' => '#444',
                ),
            )
        );

        /**
         * Enable Editor font size support
         *
         * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#block-color-palettes
         */
        add_theme_support(
            'editor-font-sizes',
            array(
                array(
                'name' => __('Small', 'sage'),
                'size' => 12,
                'slug' => 'small'
                ),
                array(
                'name' => __('Normal', 'sage'),
                'size' => 16,
                'slug' => 'normal'
                ),
                array(
                'name' => __('Large', 'sage'),
                'size' => 36,
                'slug' => 'large'
                ),
                array(
                'name' => __('Huge', 'sage'),
                'size' => 50,
                'slug' => 'huge'
                )
            )
        );

        /**
         * Dequeue Gutenberg CSS
         *
         * @link https://wordpress.org/gutenberg/?s=dequeue (404)
         */
        add_action(
            'wp_enqueue_scripts',
            function () {
                wp_dequeue_style('wp-block-library');
            },
            100
        );

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
        register_nav_menus(
            [
            'primary_navigation' => __('Primary Navigation', 'sage')
            ]
        );

        /**
         * Enable post thumbnails
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

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
         * Use main stylesheet for visual editor
         *
         * @see resources/assets/styles/layouts/_tinymce.scss
         */
        add_editor_style(asset_path('styles/main.css'));
    },
    20
);

/**
 * Register sidebars
 */
add_action(
    'widgets_init',
    function () {
        $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
        ];
        register_sidebar(
            [
            'name'          => __('Primary', 'sage'),
            'id'            => 'sidebar-primary'
            ] + $config
        );
        register_sidebar(
            [
            'name'          => __('Footer', 'sage'),
            'id'            => 'sidebar-footer'
            ] + $config
        );
    }
);

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action(
    'the_post',
    function ($post) {
        sage('blade')->share('post', $post);
    }
);

/**
 * Setup Sage options
 */
add_action(
    'after_setup_theme',
    function () {

        /**
         * Add JsonManifest to Sage container
         */
        sage()->singleton(
            'sage.assets',
            function () {
                return new JsonManifest(
                    config('assets.manifest'),
                    config('assets.uri')
                );
            }
        );

        /**
         * Add Blade to Sage container
         */
        sage()->singleton(
            'sage.blade',
            function (Container $app) {
                $cachePath = config('view.compiled');
                if (!file_exists($cachePath)) :
                    wp_mkdir_p($cachePath);
                endif;
                (new BladeProvider($app))->register();
                return new Blade($app['view']);
            }
        );

        /**
         * Create @asset() Blade directive
         */
        sage('blade')->compiler()->directive(
            'asset',
            function ($asset) {
                return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
            }
        );

        /**
         * Implement log1x blade-svg-sage
         */
        add_filter(
            'bladesvg',
            function () {
                return [
                'svg_path' => 'resources/assets/svg',
                'inline' => true,
                'class' => 'svg'
                ];
            }
        );

        /**
         * Hamburger menu blade directive
         */
        sage('blade')->compiler()->directive('burger', function () {
            return '<div class="burger" data-target="primary-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>';
        });
    }
);

/**
 * Initialize ACF Builder
 */
add_action('init', function () {
    collect(glob(config('theme.dir').'/app/fields/*.php'))->map(function ($field) {
        return require_once($field);
    })->map(function ($field) {
        if ($field instanceof FieldsBuilder) {
            acf_add_local_field_group($field->build());
        }
    });
});

/**
 * Initialize ACF Forms
 */

function register_forms() {
	af_register_form( array(
		'key' => 'form_5c7a417d81cab',
		'title' => 'Newsletter Signup',
		'display' => array(
			'description' => '',
			'success_message' => '',
		),
		'create_entries' => false,
		'restrictions' => array(
			'entries' => false,
			'user' => false,
			'schedule' => false,
		),
		'emails' => false,
	) );
}
add_action( 'af/register_forms', 'register_forms' );
