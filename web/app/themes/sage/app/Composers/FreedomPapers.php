<?php

namespace App\Composers;

use Illuminate\Support\Collection;
use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\Arrayable;

/**
 * Freedom Papers
 */
class FreedomPapers extends Composer
{
    use Arrayable;

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-freedom-papers',
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
            'post__not_in' => [get_the_id()],
            'posts_per_page' => 32,
        ]))->get_posts())->map(function ($freedomPaper) {
            return (object) [
                'title' => $freedomPaper->post_title,
                'url'   => "/freedom-papers/{$freedomPaper->post_name}",
            ];
        });
    }
}
