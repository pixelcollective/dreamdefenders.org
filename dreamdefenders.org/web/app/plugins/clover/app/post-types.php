<?php

namespace TinyPixel\App;

use \PostTypes\PostType;
use \PostTypes\Taxonomy;

if (!function_exists('create_activist_store')) :
    function create_activist_store()
    {
        $activists = new PostType([
            'name'     => 'activist',
            'singular' => __('Activist', 'tpc'),
            'plural'   => __('Activists', 'tpc'),
            'slug'     => null,
            'public'   => 'public',
            'position' => 20,
            'has_archive'  => false,
            'public'       => false,
            'show_in_rest' => true,
        ]);

        $activists->columns()->hide([
            'date',
            'author',
            'comments',
            'author',
            'date',
        ]);

        // $activists->register();
    }

endif;
