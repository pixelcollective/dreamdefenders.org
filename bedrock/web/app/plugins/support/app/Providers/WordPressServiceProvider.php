<?php

namespace TinyPixel\Support\Providers;

use \TinyPixel\Support\WordPress\Admin\Comments;
use \TinyPixel\Support\WordPress\Admin\Gutenberg;

use \Roots\Acorn\ServiceProvider;

/**
 * Provides WordPress Services like Menu Management, Editor configuration, PostTypes, etc.
 *
 * @author Kelly Mears <kelly@tinypixel.dev>
 * @license MIT
 * @since 0.0.1
 */
class WordPressServiceProvider extends ServiceProvider
{
    /**
     * Registers application services
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('wordpress.comments', function () {
            return new Comments($this->app);
        });
    }

    /**
     * Boots application services
     *
     * @return void
     */
    public function boot()
    {
        $options = [
            'comments'  => $this->app['config']->get('support.admin.comments'),
        ];

        if ($options['comments']['disabled']) {
            $this->app->make('wordpress.comments')->disable();
        }
    }
}
