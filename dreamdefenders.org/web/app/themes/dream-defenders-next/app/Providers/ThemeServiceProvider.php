<?php

namespace App\Providers;

use function Roots\app;

use BladeSvg\SvgFactory;

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
        $this->registerAppBladeDirectives();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootBladeSvgCompiler();
        $this->app['blade-x']->component(['components.*']);

        $this->app['blocks.script']->define([
            'name' => 'blocks',
            'file' => 'blocks/index.js'
        ])->register();
    }

    public function bootBladeSvgCompiler()
    {
        $this->app['blade.compiler']->directive('svg', function ($expression) {
            return sprintf('<?= %s(%s); ?>', '\App\svg_image', $expression);
        });

        $this->app->singleton(SvgFactory::class, function () {
            return new SvgFactory(collect(config('blade', []))->merge([
                'spritesheet_path' => $this->app->basePath(config('blade.spritesheet_path')),
                'svg_path' => $this->app->basePath(config('blade.svg_path')),
            ])->all());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function registerAppBladeDirectives()
    {
        $this->app->bind('directives', function ($app) {
            return new Directives();
        });
    }
}
