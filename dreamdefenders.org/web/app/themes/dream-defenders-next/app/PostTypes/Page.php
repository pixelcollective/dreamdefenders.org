<?php

namespace App\PostTypes;

class Page
{
    public function __construct()
    {
        $this->template();
    }

    public function template()
    {
        add_action('init', function () {
            $post_type_object = get_post_type_object('page');
            $post_type_object->template = [
                ['tinypixel/banner',  []],
                ['tinypixel/section', []],
                ['tinypixel/social',  []],
            ];
            $post_type_object->template_lock = 'insert';
        });
    }
}
