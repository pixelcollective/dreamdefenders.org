<?php
/**
 * some_like_it_neat functions and definitions
 *
 * @package some_like_it_neat
 */

require 'include/pathname-aliases.php';
require 'include/helper-functions.php';
require 'include/blog-index.php';

if (! function_exists('some_like_it_neat_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function some_like_it_neat_setup()
    {

        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        if (! isset($content_width)) {
            $content_width = 640; /* pixels */
        }

        /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on some_like_it_neat, use a find and replace
        * to change 'some-like-it-neat' to the name of your theme in all the template files
        */
        load_theme_textdomain('some-like-it-neat', get_template_directory() . '/library/languages');

        /**
         * Add Gutenberg Theme support
        */
        add_theme_support('align-wide');

        /*
        * Add default posts and comments RSS feed links to head.
        */
        add_theme_support('automatic-feed-links');

        /**
         * Enable HTML5 markup
         */
        add_theme_support(
            'html5',
            array(
                'comment-list',
                'search-form',
                'comment-form',
                'gallery',
            )
        );

        /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
        */
        add_theme_support('post-thumbnails');

        /*
        * Enable title tag support for all posts.
        *
        * @link http://codex.wordpress.org/Title_Tag
        */
        add_theme_support('title-tag');

        /*
        * Add Editor Style for adequate styling in text editor.
        *
        * @link http://codex.wordpress.org/Function_Reference/add_editor_style
        */
        add_editor_style('/assets/css/editor-style.css');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menu('primary-navigation', __('Primary Menu', 'some-like-it-neat'));
        register_nav_menu('footer-navigation', __('Footer Menu', 'some-like-it-neat'));

        // Enable support for Post Formats.
        if ('yes' === get_theme_mod('some-like-it-neat_post_format_support')) {
            add_theme_support(
                'post-formats',
                array(
                'aside',
                'image', '
					video',
                'quote',
                'link',
                'status',
                'gallery',
                'chat',
                'audio'
                )
            );
        }

        // Enable Support for Jetpack Infinite Scroll
        if ('yes' === get_theme_mod('some-like-it-neat_infinite_scroll_support')) {
            $scroll_type = get_theme_mod('some-like-it-neat_infinite_scroll_type');
            add_theme_support(
                'infinite-scroll',
                array(
                    'type'           => $scroll_type,
                    'footer_widgets' => false,
                    'container'      => 'content',
                    'wrapper'        => true,
                    'render'         => false,
                    'posts_per_page' => false,
                    'render'         => 'some_like_it_neat_infinite_scroll_render',
                )
            );

            function some_like_it_neat_infinite_scroll_render()
            {
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        get_template_part('page-templates/template-parts/content', get_post_format());
                    endwhile;
                endif;
            }
        }

        // Setup the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'some_like_it_neat_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        /**
        * Including Theme Hook Alliance (https://github.com/zamoose/themehookalliance).
        */
        include get_template_directory() . '/library/vendors/theme-hook-alliance/tha-theme-hooks.php' ;

        /**
        * WP Customizer
        */
        include get_template_directory() . '/library/vendors/customizer/customizer.php';

        /**
        * Implement the Custom Header feature.
        */
        //require get_template_directory() . '/library/vendors/custom-header.php'

        /**
        * Custom template tags for this theme.
        */
        include get_template_directory() . '/library/vendors/template-tags.php';

        /**
        * Custom functions that act independently of the theme templates.
        */
        include get_template_directory() . '/library/vendors/extras.php';

        /**
        * Load Jetpack compatibility file.
        */
        include get_template_directory() . '/library/vendors/jetpack.php';

        /**
         * Including TGM Plugin Activation
         */
        include_once get_template_directory().
                     '/library/vendors/tgm-plugin-activation/class-tgm-plugin-activation.php';

        include_once get_template_directory().
                     '/library/vendors/tgm-plugin-activation/tgm-plugin-activation.php';
    }

endif; // some_like_it_neat_setup
add_action('after_setup_theme', 'some_like_it_neat_setup');

/**
 * Enqueue scripts.
 */
if (! function_exists('some_like_it_neat_scripts')) :
    function some_like_it_neat_scripts()
    {

        // Vendor Scripts
        wp_register_script(
            'modernizr-js',
            get_template_directory_uri(). '/assets/js/vendor/modernizr/modernizr.js',
            array( 'jquery' ),
            '2.8.2',
            false
        );
        wp_enqueue_script('modernizr-js');

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        if (SCRIPT_DEBUG || WP_DEBUG) :
            // Concatonated Scripts
            wp_enqueue_script('some_like_it_neat-js', get_stylesheet_directory_uri() . '/assets/js/bundle.js');
        else :
            // Concatonated Scripts
            wp_enqueue_script('some_like_it_neat-js', get_stylesheet_directory_uri() . '/assets/js/bundle.min.js');
        endif;
    }
    add_action('wp_enqueue_scripts', 'some_like_it_neat_scripts');
endif; // Enqueue scripts

/**
 * Enqueue styles.
 */
if (! function_exists('some_like_it_neat_styles')) :
    function some_like_it_neat_styles()
    {
        if (SCRIPT_DEBUG || WP_DEBUG) :
            wp_register_style(
                'some_like_it_neat-style', // handle name
                get_template_directory_uri() . '/assets/css/style.css',
                '',
                '1.2',
                'screen'
            );
            wp_enqueue_style('some_like_it_neat-style');
        else :
            wp_register_style(
                'some_like_it_neat-style', // handle name
                get_template_directory_uri() . '/assets/css/style.css',
                '',
                '1.2',
                'screen'
            );
            wp_enqueue_style('some_like_it_neat-style');
        endif;
    }
    add_action('wp_enqueue_scripts', 'some_like_it_neat_styles');
endif; // Enqueue styles

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function some_like_it_neat_widgets_init()
{
    register_sidebar(
        array(
        'name'          => __('Sidebar', 'some-like-it-neat'),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        )
    );
}
add_action('widgets_init', 'some_like_it_neat_widgets_init');

/**
 * Add Singular Post Template Navigation
 */
if (! function_exists('some_like_it_neat_post_navigation')) :
    function some_like_it_neat_post_navigation()
    {
        if (function_exists('get_the_post_navigation')
            && is_singular() &&
                !is_page_template('page-templates/template-landing-page.php')) :
                    echo get_the_post_navigation(
                        array(
                        'prev_text'    => __('&larr; %title', 'some-like-it-neat'),
                        'next_text'    => __('%title &rarr;', 'some-like-it-neat'),
                        'screen_reader_text' => __('Page navigation', 'some-like-it-neat')
                        )
                    );
        else :
            wp_link_pages(
                array(
                'before' => '<div class="page-links">' . __('Pages:', 'some-like-it-neat'),
                'after'  => '</div>',
                )
            );
        endif;
    }
endif;
add_action('tha_entry_after', 'some_like_it_neat_post_navigation');

// Prevent Auto br tags from being generated.
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

function wpse_wpautop_nobr($content)
{
    return wpautop($content, false);
}

add_filter('the_content', 'wpse_wpautop_nobr');
add_filter('the_excerpt', 'wpse_wpautop_nobr');

// Gravity Forms
// Option to hide labels
add_filter('gform_enable_field_label_visibility_settings', '__return_true');
