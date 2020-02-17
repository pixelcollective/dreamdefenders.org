<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

/**
 * Base Composer
 */
class BaseComposer extends Composer
{
    /**
     * Exclude the current post if on a single template
     */
    protected function excluding()
    {
        return is_single() ? [get_the_id()] : [];
    }

    /**
     * Return the excerpt if it exists. Fallback to first
     * 30 words of the content if not.
     */
    protected function excerpt(\WP_Post $post)
    {
        return $post->post_excerpt ? $post->post_excerpt : wp_trim_words($post->post_content, 30);
    }
}
