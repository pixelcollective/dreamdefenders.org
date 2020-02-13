<?php

namespace App\Composers;

use Illuminate\Support\Collection;
use App\Composers\BaseComposer;
use Roots\Acorn\View\Composers\Concerns\Arrayable;

/**
 * Projects
 */
class Projects extends BaseComposer
{
    use Arrayable;

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-projects',
        'partials.archive-projects',
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
            'post__not_in' => $this->excluding(),
            'posts_per_page' => 4,
        ]))->get_posts())->map(function ($project) {
            return (object) [
                'id'    => $project->ID,
                'title' => $project->post_title,
                'excerpt' => $this->excerpt($project),
                'url'   => "/projects/{$project->post_name}",
                'image' => get_the_post_thumbnail_url($project->ID),
            ];
        });
    }
}
