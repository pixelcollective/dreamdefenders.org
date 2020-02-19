<?php

namespace App\Composers;

use Illuminate\Support\Collection;
use App\Composers\BaseComposer;
use Roots\Acorn\View\Composers\Concerns\Arrayable;

/**
 * Freedom Papers
 */
class FreedomPapers extends BaseComposer
{
    use Arrayable;

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-freedom-papers',
        'partials.archive-freedom-papers',
    ];

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
     * Freedom Papers
     *
     * @return \Illuminate\Support\Collection
     */
    public function papers()
    {
        return Collection::make((new \WP_Query([
            'post_type' => 'freedom-papers',
            'post__not_in' => $this->excluding(),
            'posts_per_page' => 8,
            'orderby' => 'menu_order',
        ]))->get_posts())->map(function ($freedomPaper) {
            return (object) [
                'id'    => $freedomPaper->ID,
                'title' => $freedomPaper->post_title,
                'excerpt' => $this->excerpt($freedomPaper),
                'url'   => "/freedom-papers/{$freedomPaper->post_name}",
                'image' => get_the_post_thumbnail_url($freedomPaper->ID),
            ];
        })->reverse();
    }

    /**
     * Get Freedom Papers content
     */
    public function content()
    {
        return Collection::make((new \WP_Query([
            'post_type' => 'page',
            'name' => 'freedom-papers-content',
        ]))->get_posts())->first()->post_content;
    }
}
