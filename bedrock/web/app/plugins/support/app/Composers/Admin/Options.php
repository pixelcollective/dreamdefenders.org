<?php

namespace TinyPixel\Support\Composers\Admin;

use TinyPixel\Models\Post;
use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Traits;

class Options extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = ['Support::admin.options'];

    /**
     * Data to be passed to view before rendering.
     *
     * @param  array $data
     * @param  \Illuminate\View\View $view
     * @return array
     */
    public function with($data, $view)
    {
        return $data = [
            'title' => 'My settings',
            'name'  => 'Cody',
            'thingsThatWeLike' => [
                'red bull',
                'apex',
                'sleeping',
                'wordpress',
            ],
            'posts' => $this->posts($view),

        ];
    }

    /**
     * Returns all published posts
     *
     * @param \Illuminate\View\View
     * @return \Illuminate\Support\Collection
     */
    public function posts($view)
    {
        return Post::published()->limit(1);
    }
}
