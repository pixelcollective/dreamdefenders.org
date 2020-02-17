<?php

/**
 * Theme filters.
 *
 * @copyright https://roots.io/ Roots
 * @license   https://opensource.org/licenses/MIT MIT
 */

namespace App;

use Illuminate\Support\Collection;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Remove 'Archive:' from post type archive titles
 */
add_filter('get_the_archive_title', function ($title) {
    if (is_post_type_archive()) {
        $title = post_type_archive_title();
    }

    return $title == 'Archives' ? "Publications" : $title;
});

add_action('init', function () {
    Collection::make(
        get_intermediate_image_sizes(),
        wp_get_additional_image_sizes(),
    )->each(function ($size) {
        remove_image_size($size);
    })->filter(function () {
        return false;
    })->mergeRecursive([
        'small'  => Collection::make(['768', '768']),
        'medium' => Collection::make(['1024','1024']),
        'large'  => Collection::make(['1280','1280']),
        'xlarge' => Collection::make(['1600','1600']),
    ])->each(function ($dimensions, $label) {
        add_image_size($label, ...$dimensions->toArray());
    });
});
