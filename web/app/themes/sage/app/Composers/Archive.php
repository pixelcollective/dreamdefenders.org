<?php

namespace App\Composers;

use Roots\Acorn\View\Composers\Concerns\Arrayable;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

/**
 * Archive Composer.
 */
class ArchivePage extends BaseComposer
{
    use Arrayable;

    protected static $perPage = 4;

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'archive',
    ];

    /**
     * Construct.
     */
    protected function __construct()
    {
        $this->query = $this->query();
        $this->posts = $this->getPosts($this->query);
    }

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
     * Post type.
     */
    public function posttype()
    {
        return get_queried_object()->name;
    }

    /**
     * Posts.
     */
    public function archivePosts()
    {
        return $this->queryPosts();
    }

    /*
     * Pagination
     */
    public function pagination()
    {
        return (new Paginator(
            $this->posts->slice(
                ($this->getCurrentPage() * self::$perPage),
                ($this->getCurrentPage() * self::$perPage) + self::$perPage
            ),
            $this->posts->count(),
            self::$perPage,
            $this->getCurrentPage()
        ))->withPath('/projects');
    }

    /**
     * Query vars.
     *
     * @return object
     */
    protected function query(): object
    {
        return (object) Collection::make(
            Arr::get($GLOBALS, 'wp_query')->query_vars
        )->toArray();
    }

    /**
     * Current page.
     */
    protected function getCurrentPage()
    {
        if (!isset($this->query->page)) {
            return 0;
        }

        return $this->query->page;
    }

    /**
     * Offset.
     */
    protected function offset()
    {
        return $this->getCurrentPage() > 0
            ? $this->getCurrentPage() * self::$perPage
            : 0;
    }

    /**
     * Posts.
     *
     * @return \Illuminate\Support\Collection
     */
    protected function queryPosts()
    {
        return Collection::make((new \WP_Query([
            'post_type' => $this->query->post_type,
            'offset' => $this->offset(),
            'orderby' => 'menu_order',
            'posts_per_page' => -1,
        ]))->get_posts())->map(function ($post) {
            return (object) [
                'id' => $post->ID,
                'title' => $post->post_title,
                'excerpt' => $this->excerpt($post),
                'url' => "/{$post->post_name}",
                'image' => get_the_post_thumbnail_url($post->ID),
            ];
        });
    }
}
