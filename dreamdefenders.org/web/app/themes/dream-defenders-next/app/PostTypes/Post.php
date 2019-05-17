<?php

namespace App\PostTypes;

class Post
{
    public function __construct()
    {
        add_action('init', [$this, 'template']);
    }

    public function template()
    {
        $this->type = get_post_type_object('post');
        $this->type->template = [
            ['tinypixel/banner', []],
            ['tinypixel/section', []],
            ['tinypixel/social', []],
        ];

        $this->type->template_lock = 'insert';
    }
}
