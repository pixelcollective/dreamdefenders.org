<?php

namespace TinyPixel\Support\Providers;

use \BladeSvg\SvgFactory;
use \Roots\Acorn\ServiceProvider;

class SVGServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('svg', function () {
            $svg = $this->app['config']->get('support.svg', []);
            $svgPath = $this->app['config']->get('support.svg.svg_path');
            $svgSpritesheetPath = $this->app['config']->get('support.svg.svg_path');

            return new SvgFactory(
                collect($svg)->merge([
                    'svg_path'         => $this->app->basePath($svgPath),
                    'spritesheet_path' => $this->app->basePath($svgSpritesheetPath),
                ])->all()
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['blade.compiler']->directive('svg', function ($expression) {
            return sprintf('<?= %s(%s); ?>', '\TinyPixel\Support\Providers\SVGServiceProvider::svgImage', $expression);
        });
    }

    /**
     * Helper to fulfill @svg directives
     */
    public static function svgImage($icon, $class = '', $attrs = [])
    {
        print \Roots\app('svg')->svg($icon, $class, $attrs)->toHtml();
    }
}
