<?php

namespace App\Providers;

use App\PostTypes\PostTypes;
use StoutLogic\AcfBuilder\FieldsBuilder;
use Roots\Acorn\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('builder', function ($app) {
            return FieldsBuilder::class;
        });

        $this->app->bind('posttypes', function ($app) {
            (new PostTypes($app))->init();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('posttypes');
    }
}
