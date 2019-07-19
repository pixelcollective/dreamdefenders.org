<?php

namespace TinyPixel\Support\Providers;

use \TinyPixel\Support\WordPress\Admin\Comments;
use \TinyPixel\Support\WordPress\Admin\Gutenberg;
use \TinyPixel\Support\WordPress\Admin\Menu;
use \TinyPixel\Support\WordPress\Admin\Bar;

use \Roots\Acorn\ServiceProvider;

class WordPressServiceProvider extends ServiceProvider
{
    /**
     * Register the plugin with the application container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('support.wordpress.comments', function () {
            return new Comments($this->app);
        });

        $this->app->singleton('support.wordpress.gutenberg', function () {
            return new Gutenberg($this->app);
        });
    }

    /**
     * Run the plugin
     *
     * @return void
     */
    public function boot()
    {
        $options = [
            'comments'  => $this->app['config']->get('support.admin.comments'),
            'gutenberg' => $this->app['config']->get('support.admin.gutenberg'),
        ];

        if ($options['comments']['disabled']) {
            $this->app->make('support.wordpress.comments')->disable();
        }

        if ($options['gutenberg']) {
            $this->app->make('support.wordpress.gutenberg')->configureEditor(
                collect($options['gutenberg'])
            );
        }
    }
}
