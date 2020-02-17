<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class Post extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'single',
        'partials.content-single',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function with()
    {
        return [
            'title'     => $this->title(),
            'permalink' => $this->permalink(),
            'pageNav'   => $this->pageNav(),
            'postType'  => $this->postType(),
        ];
    }

    /**
     * Returns the post title.
     *
     * @return string
     */
    public function title()
    {
        return get_the_title();
    }

    /**
     * Returns the page nav.
     *
     * @return string
     */
    public function pageNav()
    {
        return wp_link_pages([
            'echo'   => false,
            'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'),
            'after'  => '</p></nav>'
        ]);
    }

    /**
     * Returns the permalink.
     *
     * @return string
     */
    public function permalink()
    {
        return get_the_permalink();
    }

    /**
     * Returns the post type.
     *
     * @return string
     */
    public function postType()
    {
        return get_post_type();
    }
}
