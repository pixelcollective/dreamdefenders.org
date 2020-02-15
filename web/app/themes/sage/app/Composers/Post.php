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
        'partials.page-header',
        'partials.content',
        'partials.content-*',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'title'     => $this->title(),
            'permalink' => $this->permalink(),
            'content'   => $this->content(),
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
        if ($this->view->name() !== 'partials.page-header') {
            return get_the_title();
        }

        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }

            return __('Latest Posts', 'sage');
        }

        if (is_archive()) {
            return get_the_archive_title();
        }

        if (is_search()) {
            /* translators: %s is replaced with the search query */
            return sprintf(
                __('Search Results for %s', 'sage'),
                get_search_query()
            );
        }

        if (is_404()) {
            return __('Not Found', 'sage');
        }

        return get_the_title();
    }

    /**
     * Returns the post content.
     *
     * @return string
     */
    public function content()
    {
        return apply_filters('the_content', get_the_content());
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
