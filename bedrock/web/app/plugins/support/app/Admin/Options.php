<?php

namespace TinyPixel\Support\Admin;

use \Roots\Acorn\Application;

use function \get_post_types;
use function \add_settings_field;

class Options
{
    public function __construct(Application $app)
    {
        $this->app = $app;

        add_action('admin_menu', [$this, 'addAdminMenuEntry']);
    }

    public function addAdminMenuEntry()
    {
        $this->settingsPage = add_options_page(
            'Site Support',
            'Site Support',
            'manage_options',
            'tiny-pixel-support',
            [$this, 'optionsPage'],
        );
    }

    public function optionsPage()
    {
        print $this->app['view']->make(
            "Support::admin.options"
        );
    }
}
