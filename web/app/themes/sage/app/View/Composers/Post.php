<?php

namespace App\View\Composers;

use Illuminate\Support\Collection;
use Roots\Acorn\View\Composer;

/**
 * Post.
 */
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
            'title' => $this->title(),
            'permalink' => $this->permalink(),
            'pageNav' => $this->pageNav(),
            'postType' => $this->postType(),
            'additionalPosts' => $this->additionalPosts(),
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
            'echo' => false,
            'before' => '<nav class="page-nav"><p>'.__('Pages:', 'sage'),
            'after' => '</p></nav>',
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

    /*
     * Additional posts
     *
     * @return Collection
     */
    public function additionalPosts()
    {
        return Collection::make((new \WP_Query([
            'post_type' => 'post',
            'post__not_in' => [get_the_ID()],
            'posts_per_page' => 8,
            'orderby' => 'menu_order',
        ]))->get_posts())->map(function ($post) {
            return (object) [
                'id' => $post->ID,
                'title' => $post->post_title,
                'excerpt' => get_the_excerpt($post->ID),
                'url' => "/{$post->post_name}",
                'image' => get_the_post_thumbnail_url($post->ID),
            ];
        })->reverse();
    }
}
