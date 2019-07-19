<?php

namespace TinyPixel\Support\WordPress\Admin;

use \Roots\Acorn\Application;
use \Illuminate\Support\Collection;

class Bar
{
    public $nodes = [
        'updates',
        'comments',
        'new-content',
        'wp-logo',
        'site-name',
        'my-account',
        'search',
        'customize',
        'wp-logo',
    ];

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function configureBar(Collection $config)
    {
        $this->settings = $config;
        $this->nodes = Collection::make($this->nodes);
        $this->menuItems = Collection::make($this->settings->get('menu_items'));
        $this->enabled = $this->settings->get('enabled');

        if ($this->enabled == false) {
            add_action('admin_print_styles-index.php', [$this, 'killBar']);
            add_action('admin_print_styles-profile.php', [$this, 'killBar']);
        }

        add_action('admin_bar_menu', [$this, 'removeAdminBarItems'], 999);
    }

    public function removeAdminBarItems($wp_admin_bar)
    {
        if ($this->enabled !== true) {
            $nodes->each(function ($node) use ($wp_admin_bar) {
                $wp_admin_bar->remove_node($node);
            });
        }

        $this->menuItems->each(function ($value, $item) use ($wp_admin_bar) {
            if ($value !== true) {
                $wp_admin_bar->remove_node($item);
            }
        });
    }


    public function killBar()
    {
        $css = __DIR__ . '/templates/killadminbar.php';

        if (file_exists($css)) {
            print file_get_contents($css);
        }
    }
}
