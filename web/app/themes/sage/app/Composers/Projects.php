<?php

namespace App\Composers;

use Illuminate\Support\Collection;
use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\Arrayable;

/**
 * Projects
 */
class Projects extends Composer
{
    use Arrayable;

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-projects',
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
     * Projects
     *
     * @return \Illuminate\Support\Collection
     */
    public function projects()
    {
        return Collection::make((new \WP_Query([
            'post_type' => 'projects',
            'post__not_in' => [get_the_id()],
            'posts_per_page' => 4,
        ]))->get_posts())->map(function ($project) {
            return (object) [
                'title' => $project->post_title,
                'url'   => "/projects/{$project->post_name}",
            ];
        });
    }
}
