<?php

namespace TinyPixel\Support\Plugin;

use function \is_multisite;
use function \switch_to_blog;
use function \delete_option;

use \Roots\Acorn\Application;

/**
 * #Todo: Continue refactor
 */
class Lifecycle
{
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->handlePluginEvents();
    }

    public function handlePluginEvents()
    {
        $baseDir = $this->app['config']->get('supportplugin.baseDir');
        $uninstallFile = "{$baseDir}/uninstall.php";

        register_activation_hook(__FILE__, [$this, 'activate']);
        register_deactivation_hook(__FILE__, [$this, 'deactivate']);
        register_uninstall_hook(__FILE__, ['Uninstall', 'uninstall']);
    }

    public function activate()
    {
        return true;
    }

    public function deactivate()
    {
        return true;
    }

    public function uninstall()
    {
        if (! defined('WP_UNINSTALL_PLUGIN')) {
            exit;
        }

        is_multisite()
            ? $this->multisiteUninstall()
            : $this->standardUninstall();
    }

    private function standardUninstall()
    {
        delete_option('tiny-pixel-support');
    }

    private function multisiteUninstall()
    {
        global $wpdb;

        $wpBlogs = $wpdb->get_results("SELECT blog_id FROM {$wpdb->blogs}", ARRAY_A);

        $wpBlogs->each(function ($blog, $id) {
            switch_to_blog($blog['blog_id']);

            delete_option('tiny-pixel-support');
        });
    }
}
