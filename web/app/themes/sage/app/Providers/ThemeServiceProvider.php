<?php

namespace App\Providers;

use Roots\Acorn\ServiceProvider;
use App\Admin\UI;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('admin', function ($app) {
            return new \App\Admin\UI($app);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('admin');
    }
}
