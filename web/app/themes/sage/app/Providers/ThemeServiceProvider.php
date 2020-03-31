<?php

namespace App\Providers;

use Roots\Acorn\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind('admin', function ($app) {
            return new \App\Admin\UI($app);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->app->make('admin');
    }
}
