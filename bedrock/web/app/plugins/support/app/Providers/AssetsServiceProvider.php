<?php

namespace TinyPixel\Support\Providers;

use \TinyPixel\Support\Plugin\Lifecycle;
use \TinyPixel\Support\Admin\Admin;
use \TinyPixel\Support\Assets\Assets;
use \Roots\Acorn\ServiceProvider;

class AssetsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('support.assets', function () {
            return (new Assets($this->app))->init('plugin');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('support.assets')
                    ->addAdminStyle('app')
                    ->addAdminScript('app');
    }
}
