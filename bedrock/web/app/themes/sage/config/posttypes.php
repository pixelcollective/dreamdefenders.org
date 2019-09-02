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
        ],

        'overrides' => [
            'singular' => 'Campaign',
            'plural'   => 'Campaigns',
            'slug'     => 'Campaign',
        ]
    ],

];
