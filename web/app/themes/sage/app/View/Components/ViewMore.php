<?php

namespace App\View\Components;

use \WP_Query;
use Roots\Acorn\View\Component;
use Illuminate\Support\Collection;
use Illuminate\View\View;

/**
 * "View more" component
 */
class ViewMore extends Component
{
    public WP_Query $query;

    /**
     * Class constructor.
     */
    public function __construct(
        string $type = 'post',
        int $limit = 10
    ) {
        $this->query = new WP_Query([
            'post_type' => $type,
            'posts_per_page' => $limit,
            'post__not_in' => [get_the_id()],
        ]);
    }

    /**
     * Render the component.
     */
    public function render(): View
    {
        return $this->view('components.view-more', [
            'posts' => $this->posts(),
        ]);
    }

    /**
     * Get the component's post data
     */
    private function posts(): Collection
    {
        $posts = Collection::make($this->query->get_posts());

        return $posts->map(function ($post) {
            return (object) [
                'id' => $post->ID,
                'title' => get_the_title($post->ID),
                'excerpt' => get_the_excerpt($post->ID),
                'img' => get_the_post_thumbnail_url($post->ID),
                'href' => get_the_permalink($post->ID),
            ];
        });
    }
}
