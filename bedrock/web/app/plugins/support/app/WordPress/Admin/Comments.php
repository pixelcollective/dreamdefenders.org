<?php

namespace TinyPixel\Support\WordPress\Admin;

use \Roots\Acorn\Application;
use \Illuminate\Support\Facades\View;

class Comments
{
    /**
     * Construct
     *
     * @param \Roots\Acorn\Application
     * @return object self
     */
    public function __construct(\Roots\Acorn\Application $app)
    {
        $this->app = $app;
        return $this;
    }

    /**
     * Disables comments
     */
    public function disable()
    {
        add_action('widgets_init', [$this, 'disableWidget']);
        add_filter('wp_headers', [$this, 'filterHeaders']);
        add_action('template_redirect', [$this, 'filterQuery'], 9);
        add_action('template_redirect', [$this, 'filterAdminBar']);
        add_action('admin_init', [$this, 'filterAdminBar']);
        add_action('wp_loaded', [$this, 'filterWordPressLoaded']);
        add_action('admin_menu', [$this, 'filterAdminMenu'], 9999);
        add_action('admin_print_styles-index.php', [$this, 'adminCss']);
        add_action('admin_print_styles-profile.php', [$this, 'adminCss']);
        add_action('wp_dashboard_setup', [$this, 'filterDashboard']);
        add_filter('dashboard_glance_items', [$this, 'filterAtAGlanceWidget']);
        add_filter('pre_option_default_pingback_flag', '__return_zero');
    }

    /*
    * Removes the X-Pingback HTTP header
    */
    public function filterHeaders($headers)
    {
        unset($headers['X-Pingback']);
        return $headers;
    }

    /**
     * Filters fired on WordPress load
     */
    public function filterWordPressLoaded()
    {
        add_filter('comments_array', [$this, 'filterExistingComments'], 20, 2);
        add_filter('comments_open', [$this, 'filterCommentStatus'], 20, 2);
        add_filter('pings_open', [$this, 'filterCommentStatus'], 20, 2);
        add_filter('get_comments_number', [$this, 'filterCommentsCount'], 20, 2);
    }

    /*
        * Removes comments from the admin bar
        */
    public function filterAdminBar()
    {
        if (is_admin_bar_showing()) {
            remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);

            if (is_multisite()) {
                add_action('admin_bar_menu', [$this, 'removeNetworkMenu'], 500);
            }
        }
    }

    /**
     * Removes comments from the admin menu
     */
    public function filterAdminMenu()
    {
        global $pagenow;

        if ($pagenow == 'comment.php' || $pagenow == 'edit-comments.php') {
            wp_die(__('Comments are closed.'), '', ['response' => 403]);
        }

        if ($pagenow == 'options-discussion.php') {
            wp_die(__('Comments are closed.'), '', ['response' => 403]);
        }

        remove_menu_page('edit-comments.php');
        remove_submenu_page('options-general.php', 'options-discussion.php');
    }

    /**
     * Removes network comment menu item from multisites
     */
    public function removeNetworkMenu($wp_admin_bar)
    {
        if ($this->networkactive && is_user_logged_in()) {
            foreach ((array) $wp_admin_bar->user->blogs as $blog) {
                $wp_admin_bar->remove_menu("blog-{$blog->userblog_id}-c");
            }

            return;
        }

        $wp_admin_bar->remove_menu('blog-' . get_current_blog_id() . '-c');
    }

    /**
     * Filter Recent Comments dashboard widget
     */
    public function filterDashboard()
    {
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    }

    /**
     * Filters "At A Glance" comments functionality
     */
    public function filterAtAGlanceWidget($var)
    {
        return [];
    }

    /**
     * Returns CSS which explicitly disables display of comment related admin items
     */
    public function adminCss()
    {
        $css = __DIR__ . '/templates/admincss.php';

        if (file_exists($css)) {
            print file_get_contents($css);
        }
    }

    /**
     * Filters any preexisting comments
     */
    public function filterExistingComments($comments, $post_id)
    {
        return [];
    }

    /**
     * Removes comments status support
     */
    public function filterCommentStatus($open, $post_id)
    {
        return false;
    }

    /**
     * Removes comments count support
     */
    public function filterCommentsCount($count, $post_id)
    {
        return 0;
    }

    /**
     * Filters sidebar widgets
     */
    public function disableWidget()
    {
        unregister_widget('WP_Widget_Recent_Comments');
        add_filter('show_recent_comments_widget_style', '__return_false');
    }

    /*
     * Issue a 403 for all comment feed requests.
     */
    public function filterQuery()
    {
        if (is_comment_feed()) {
            wp_die(__('Comments are closed.'), '', ['response' => 403]);
        }
    }

    /**
     * Removes the comments template, overriding other themes and plugins
     */
    public function checkCommentTemplate()
    {
        if (is_singular()) {
            add_filter('comments_template', [$this, 'dummyCommentsTemplate'], 20);
            wp_deregister_script('comment-reply');
            remove_action('wp_head', 'feed_links_extra', 3);
        }
    }

    /**
     * Returns an empty template
     */
    public function dummyCommentsTemplate()
    {
        return dirname(__FILE__) . '/templates/comments-template.php';
    }
}
