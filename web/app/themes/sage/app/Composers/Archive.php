<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\Arrayable;

/**
 * Archive Composer
 */
class Archive extends Composer
{
    use Arrayable;

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = ['archive'];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return $this->toArray();
    }

    /**
     * Posts
     */

    /**
     * Post type
     */
    public function posttype()
    {
        return get_queried_object()->name;
    }
}
