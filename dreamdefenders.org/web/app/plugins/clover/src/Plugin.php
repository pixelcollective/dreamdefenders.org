<?php

namespace TinyPixel;

use \Roots\Clover\Plugin as Clover;

use \TinyPixel\App\Data;

class Plugin extends Clover
{
    /**
     * Run the plugin.
     */
    public function run()
    {
        new Data();
    }

    /**
     * Run when the plugin is activated.
     */
    public function activate()
    {
    }

    /**
     * Run when the plugin is deactivated.
     */
    public function deactivate()
    {
    }

    /**
     * Run when the plugin is upgraded.
     */
    public function upgrade()
    {
    }
}
