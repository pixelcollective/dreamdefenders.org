<?php

namespace App\View\Composers;

use \WP_Post;
use Roots\Acorn\View\Composer;

/**
 * Archive: Freedom Papers
 */
class ArchiveFreedomPapers extends Composer
{
    public WP_Post $page;

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'archive-freedom-papers',
    ];

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->page = get_page_by_title('Freedom Papers');
    }

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function with(): array
    {
        return [
            'intro' => $this->intro()
        ];
    }

    /**
     * Returns the post title.
     *
     * @return string
     */
    public function intro(): string
    {
        return apply_filters(
            'the_content',
            $this->page->post_content,
        );
    }
}
