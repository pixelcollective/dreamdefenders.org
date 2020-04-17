<?php

namespace App\Admin;

class UI
{
    public function __construct($app)
    {
        $this->app = $app;

        add_action('wp_dashboard_setup', [$this, 'removeWidgets']);
        add_action('admin_bar_menu', [$this, 'filterBar'], 999);
        add_filter('admin_menu', [$this, 'filterMenu'], 999);
        add_filter('acf/settings/show_admin', [$this, 'filterAcf']);
    }

    public function content()
    {
        echo $this->app['view']->make('docs.index')->with([
            'title' => 'Documentation',
        ])->render();
    }

    /**
     * Disable admin bar menu items
     */
    public function filterBar($bar)
    {
        $bar = $this->removeHowdy($bar);

        $bar->remove_node('about');
        $bar->remove_node('wporg');
        $bar->remove_node('comments');
        $bar->remove_node('feedback');
        $bar->remove_node('support-forums');
        $bar->remove_node('wp-logo-external');
        $bar->remove_node('documentation');
        $bar->remove_node('new-content');

        return $bar;
    }

    public function removeHowdy($bar)
    {
        $node = $bar->get_node('my-account');
        $node->title = str_replace('Howdy, ', '', $node->title);
        $bar->add_node($node);

        return $bar;
    }

    /**
     * Disable admin bar menu items
     */
    public function removeWidgets()
    {
        remove_action('welcome_panel', 'wp_welcome_panel');

        remove_meta_box('health_check_status', 'dashboard', 'normal');

        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
        remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
        remove_meta_box('dashboard_activity', 'dashboard', 'normal');
        remove_meta_box('dashboard_plugins', 'dashboard', 'normal');

        remove_meta_box('dashboard_primary', 'dashboard', 'side');
        remove_meta_box('dashboard_secondary', 'dashboard', 'side');
        remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    }

    /**
     * Disable admin bar menu items
     *
     * @return void
     */
    public function filterMenu(): void
    {
        remove_menu_page('tools.php');
        remove_menu_page('gutenberg');
        remove_menu_page('plugins.php');
        remove_menu_page('wp_stream');
        remove_menu_page('wp-graphiql/wp-graphiql.php');
        remove_menu_page('themes.php');
        remove_submenu_page('options-general.php', 'options-media.php');
        remove_submenu_page('options-general.php', 'options-privacy.php');
        remove_submenu_page('options-general.php', 'options-writing.php');
        remove_submenu_page('options-general.php', 'options-reading.php');
        remove_submenu_page('options-general.php', 'options-permalink.php');
        remove_submenu_page('options-general.php', 'disable_comments_settings');
        remove_submenu_page('options-general.php', 'duplicatepost');
        remove_submenu_page('options-general.php', 'options-discussion.php');
        add_menu_page('Theme settings', 'Theme settings', 'manage_options', '/customize.php', null, 'dashicons-admin-customizer');
    }

    /**
     * Disable admin menu items.
     */
    public function filterAcf()
    {
        return false;
    }
}
