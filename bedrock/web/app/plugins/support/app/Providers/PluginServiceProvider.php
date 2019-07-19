<?php

namespace TinyPixel\Support\Providers;

use \TinyPixel\Support\Plugin\Lifecycle;
use \TinyPixel\Support\Admin\Options;
use \Roots\Acorn\ServiceProvider;

class PluginServiceProvider extends ServiceProvider
{
    /**
     * Register the plugin with the application container.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();
        $this->registerProviders();
    }

    /**
     * Run the plugin
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('support.lifecycle');
        $this->app->make('support.admin');
    }

    /**
     * Configures application
     *
     * @return void
     */
    private function configure()
    {
        /**
         * Define path to configuration files
         */
        $this->configPath = __DIR__ . '/../../config';

        /**
         * Specify configuration files to load
         */
        $configFiles = collect([
            'admin',
            'plugin',
            'assets',
            'cache',
            'database',
            'svg',
            'view',
        ]);

        /**
         * Merge with Acorn configuration
         */
        $configFiles->each(function ($config) {
            $configLocation = "{$this->configPath}/{$config}.php";

            if (file_exists($configLocation)) {
                $this->mergeConfigFrom($configLocation, "support.{$config}");
            }
        });
    }

    /**
     * Registers providers
     *
     * @return void
     */
    private function registerProviders()
    {
        $providers = $this->app['config']->get('support.plugin.providers');

        array_map([$this->app, 'register'], $providers);

        $this->app->singleton('support.lifecycle', function () {
            return new Lifecycle($this->app);
        });

        $this->app->singleton('support.admin', function () {
            return new Options($this->app);
        });
    }
}
