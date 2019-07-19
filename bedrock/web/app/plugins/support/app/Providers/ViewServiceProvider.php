<?php

namespace TinyPixel\Support\Providers;

use \Illuminate\View\Compilers\BladeCompiler;
use \Illuminate\Support\Collection;
use \Roots\Acorn\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register views, namespaces, directives & composers
     * with the Roots application container
     *
     * @return void
     */
    public function register()
    {
        $this->registerViewDirectives(
            $this->app['view']->getEngineResolver()->resolve('blade')->getCompiler(),
            collect($this->app['config']->get('support.view.directives'))
        );

        $this->registerViewNamespaces(collect(
            $this->app['config']->get('support.view.namespaces')
        ));

        $this->registerViewComposers(collect(
            $this->app['config']->get('support.view.composers')
        ));

        $this->loadViewsFrom($this->app['config']->get('support.view.paths'), 'tiny-pixel-support');
    }

    /**
     * Registers view namespaces
     *
     * @param \Illuminate\Support\Collection $viewNamespaces
     */
    public function registerViewNamespaces(\Illuminate\Support\Collection $viewNamespaces)
    {
        $viewNamespaces->each(function ($hints, $namespace) {
            $this->app['view']->addNamespace($namespace, $hints);
        });
    }

    /**
     * Registers blade directives
     *
     * @param \Illuminate\View\Compilers\BladeCompiler $viewCompiler
     * @param \Illuminate\Support\Collection $viewDirectives
     */
    public function registerViewDirectives(
        \Illuminate\View\Compilers\BladeCompiler $viewCompiler,
        \Illuminate\Support\Collection $viewDirectives
    ) {
        $viewDirectives->each(function ($handler, $name) use ($viewCompiler) {
            if (!is_callable($handler)) {
                $handler = $this->app->make($handler);
            }

            $viewCompiler->directive($name, $handler);
        });
    }

    /**
     * Register view composers
     *
     * @param \Illuminate\Support\Collection $viewComposers
     */
    public function registerViewComposers(\Illuminate\Support\Collection $viewComposers)
    {
        $viewComposers->each(function ($composer) {
            $this->app['view']->composer($composer::views(), $composer);
        });
    }
}
