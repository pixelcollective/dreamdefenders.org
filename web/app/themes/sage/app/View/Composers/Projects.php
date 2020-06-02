<?php

namespace App\View\Composers;

use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Projects.
 */
class Projects extends BaseComposer
{
    /**
     * Per page.
     */
    public static $perPage = -1;

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = ['page-projects', 'partials.content-single-projects'];

    /**
     * Class construct.
     */
    public function __construct()
    {
        $this->projects = $this->queryPosts();
        $this->page = $this->getCurrentPage();
    }

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with(): array
    {
        $offset = $this->page * self::$perPage;

        $pageResults = $this->projects->slice(
            $this->page ? $offset : 0,
            $this->page ? $offset + self::$perPage : self::$perPage
        );

        $resultsPagination = (new LengthAwarePaginator(
            $pageResults,
            $this->projects->count(),
            self::$perPage,
            $this->page + 1
        ))->withPath('/projects');

        return [
            'projects' => $pageResults,
            'pagination' => $resultsPagination,
        ];
    }

    /**
     * Get current page.
     */
    protected function getCurrentPage(): int
    {
        $raw = Arr::get($GLOBALS, 'wp_query')->query_vars;

        return $raw['page'] > 0 ? $raw['page'] - 1 : 0;
    }

    /**
     * Posts.
     *
     * @return \Illuminate\Support\Collection
     */
    protected function queryPosts(): Collection
    {
        return Collection::make((new \WP_Query([
            'post_type' => 'projects',
            'orderby' => 'menu_order',
            'nopaging' => false,
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
