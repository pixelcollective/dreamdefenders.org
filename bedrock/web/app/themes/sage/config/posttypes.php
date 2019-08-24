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
];
