<?php

namespace TinyPixel\Providers;

use \TinyPixel\Plugin;
use \Roots\Clover\ServiceProvider;

class PluginServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('pixel-service', Plugin::class);

        /** Register any bindings your plugin has here as well */
    }

    public function boot()
    {
        $configs = ['app', 'view'];
        foreach ($configs as $config) {
            $this->mergeConfigFrom($this->app['pixel-service']->configPath("{$config}.php"), $config);
        }
    }
}
