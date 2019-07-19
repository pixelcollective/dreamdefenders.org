<?php

namespace App\Providers;

use \App\Assets\Assets;
use \Roots\Acorn\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('theme.assets', function () {
            return (new Assets($this->app))->init();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app
            ->make('theme.assets')
            ->addPublicStyle('app')
            ->addPublicScript('app')
            ->addPublicScript('react');
    }
}
