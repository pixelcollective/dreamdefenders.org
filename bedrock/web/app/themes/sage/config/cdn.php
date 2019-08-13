<?php

/*
|--------------------------------------------------------------------------
| Content Delivery Network
|--------------------------------------------------------------------------
|
| Make like sonic with your asset URLs.
|
*/

return [

    /*
    |--------------------------------------------------------------------------
    | Local Domain
    |--------------------------------------------------------------------------
    |
    | Specify the local URL to replace from
    |
    */

    'local_url' => get_bloginfo('url'),

    /*
    |--------------------------------------------------------------------------
    | CDN Domain
    |--------------------------------------------------------------------------
    |
    | Specify the domain used by your CDN
    |
    */

    'cdn_url'   => get_bloginfo('url'),

    /*
    |--------------------------------------------------------------------------
    | Cache expiry
    |--------------------------------------------------------------------------
    |
    | Set the time in seconds for the cached rewrite to remain valid. Note that
    | this is separate from the actual cached asset and refers only to the
    | string manipulation which takes place to replace the URLs.
    |
    */

    'cache_expiry' => 3600,

    /*
    |--------------------------------------------------------------------------
    | Include directories
    |--------------------------------------------------------------------------
    |
    | Specify local directories that contain assets you'd like to serve on
    | your edge network.
    |
    */

    'include_directories' => [
        'app',
        'wp/wp-includes'
    ],

    /*
    |--------------------------------------------------------------------------
    | Include directories
    |--------------------------------------------------------------------------
    |
    | Exclude certain filetypes from being pulled.
    |
    */

    'exclude_types' => [
        'php',
    ],
];