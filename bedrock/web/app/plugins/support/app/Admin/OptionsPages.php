<?php

namespace TinyPixel\Support\Admin;

use function \add_action;
use function \add_options_page;

use \Roots\Acorn\Application;
use \Illuminate\Support\Collection;

/**
 * Options Pages
 *
 * @author  Kelly Mears <kelly@tinypixel.dev>
 * @license MIT
 * @since   0.0.1
 */
class OptionsPages
{
    /**
     * Construct
     *
     * @param \Roots\Acorn\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;

        $this->adminPages = Collection::make();
    }

    /**
     * Initializes class
     *
     * @return object self
     */
    public function init()
    {
        add_action('admin_menu', [
            $this, 'addAdminMenuPages',
        ]);

        return $this;
    }

    /**
     * Adds a page to the collection of items to add to
     * the WordPress administration menu
     *
     * @param  string $title
     * @param  string $label
     * @param  string $capability
     * @param  string $slug
     * @param  string $view
     * @return object $this
     */
    public function addPage($title, $label, $capability, $slug, $view)
    {
        $this->adminPages->push([
            $title,
            $label,
            $capability,
            $slug,
            function () use ($view) {
                $this->view($view);
            }
        ]);

        return $this;
    }

    /**
     * WordPress action callback to add pages to menu
     *
     * @return void
     */
    public function addAdminMenuPages()
    {
        $this->adminPages->each(function ($page) {
            add_options_page(...$page);
        });
    }

    /**
     * Callback to render admin page
     *
     * @param  string $view blade view for rendering
     * @return void
     */
    public function view($view)
    {
        print $this->app['view']->make($view);
    }
}
