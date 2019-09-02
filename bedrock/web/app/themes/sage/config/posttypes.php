<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PostTypes
    |--------------------------------------------------------------------------
    |
    | You may register custom posttypes here.
    |
    */
    [
        'slug' => 'freedom-paper',

        'options' => [
            'supports' => ['title'],
            'show_in_rest' => false,
            'show_in_graphql' => true,
            'graphql_single_name' => 'freedomPaper',
            'graphql_plural_name' => 'freedomPapers',
            'menu_icon' => 'dashicons-book-alt',
            'menu_position' => 5
        ],

        'overrides' => [
            'singular' => 'Paper',
            'plural'   => 'Papers',
            'slug'     => 'papers',

        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Featured media
    |--------------------------------------------------------------------------
    |
    | Featured media.
    |
    */

    [
        'slug' => 'featured-media',

        'options' => [
            'supports' => ['title'],
            'show_in_rest' => false,
            'show_in_graphql' => true,
            'graphql_single_name' => 'featuredMediaItem',
            'graphql_plural_name' => 'featuredMediaItems',
            'menu_icon' => 'dashicons-format-image',
            'menu_position' => 9,
        ],

        'overrides' => [
            'singular' => 'Featured Media',
            'plural'   => 'Featured Media',
            'slug'     => 'featured-media',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Chapters
    |--------------------------------------------------------------------------
    |
    | Dream Defenders chapters.
    |
    */

    [
        'slug' => 'chapter',

        'options' => [
            'supports' => ['title'],
            'show_in_rest' => false,
            'show_in_graphql' => true,
            'graphql_single_name' => 'chapter',
            'graphql_plural_name' => 'chapters',
            'menu_icon' => 'dashicons-buddicons-buddypress-logo',
            'menu_position' => 8,
        ],

        'overrides' => [
            'singular' => 'Chapter',
            'plural'   => 'Chapters',
            'slug'     => 'chapter',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Campaigns
    |--------------------------------------------------------------------------
    |
    | Dream Defenders Campaigns.
    |
    */

    [
        'slug' => 'campaign',

        'options' => [
            'supports' => ['title'],
            'show_in_rest' => false,
            'show_in_graphql' => true,
            'graphql_single_name' => 'campaign',
            'graphql_plural_name' => 'campaigns',
            'menu_icon' => 'dashicons-megaphone',
            'menu_position' => 7,
        ],

        'overrides' => [
            'singular' => 'Campaign',
            'plural'   => 'Campaigns',
            'slug'     => 'Campaign',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Issues
    |--------------------------------------------------------------------------
    |
    | Dream Defenders Issues.
    |
    */

    [
        'slug' => 'issue',

        'options' => [
            'supports' => ['title'],
            'show_in_rest' => false,
            'show_in_graphql' => true,
            'graphql_single_name' => 'issue',
            'graphql_plural_name' => 'issues',
            'menu_icon' => 'dashicons-flag',
            'menu_position' => 5,
        ],

        'overrides' => [
            'singular' => 'Issue',
            'plural'   => 'Issues',
            'slug'     => 'issue',
        ]
    ],
];
