<?php

/*
|----------------------------------------------------------------------
| Glide
|----------------------------------------------------------------------
|
| Glide is a wonderfully easy on-demand image manipulation library
| written in PHP. Its straightforward API is exposed via HTTP, similar
| to cloud image processing services like Imgix and Cloudinary.
|
*/

return [

    /*
    |----------------------------------------------------------------------
    | Source
    |----------------------------------------------------------------------
    |
    | Set the source directory Glide can find source images in.
    |
    */

    'source' => wp_upload_dir()['basedir'],
    'source_url' => wp_upload_dir()['baseurl'],

    /*
    |----------------------------------------------------------------------
    | Cache
    |----------------------------------------------------------------------
    |
    | Path Glide can write optimized/manipulated images to
    |
    */

    'cache'  => wp_upload_dir()['basedir'] . '/glide',
    'cache_url' => wp_upload_dir()['baseurl'] . '/glide/',

    /*
    |----------------------------------------------------------------------
    | Group cache in folders
    |----------------------------------------------------------------------
    |
    */


    'group_cache_in_folders' => true,

    /*
    |----------------------------------------------------------------------
    | Driver
    |----------------------------------------------------------------------
    |
    | By default Glide uses the GD library. However you can also use Glide
    | with ImageMagick if the Imagick PHP extension is installed.
    |
    */

    'driver' => 'gd',

    /*
    |----------------------------------------------------------------------
    | Max Image Size
    |----------------------------------------------------------------------
    |
    | Image size limit
    |
    | e.g.
    |
    | 'max_image_size' => '1200x800',
    |
    */

    'max_image_size' => 2000 * 2000,

    /*
    |----------------------------------------------------------------------
    | Presets
    |----------------------------------------------------------------------
    |
    | Glide also makes it possible to define groups of defaults, known as
    | presets. This is helpful if you have standard image manipulations
    | that you use throughout your app.
    |
    */

    'presets' => [
        'small' => [
            'w'   => 200,
            'h'   => 200,
            'fit' => 'crop',
        ],
        'medium' => [
            'w'   => 600,
            'h'   => 400,
            'fit' => 'crop',
        ]
    ],

    /*
    |----------------------------------------------------------------------
    | Default image manipulations
    |----------------------------------------------------------------------
    |
    | Glide also makes it possible to define groups of defaults, known as
    | presets. This is helpful if you have standard image manipulations
    | that you use throughout your app.
    |
    */

    'default_image_manipulations' => [],

    /*
    |----------------------------------------------------------------------
    | Base URL
    |----------------------------------------------------------------------
    |
    | Base URL of the images
    |
    */

    'base_url' => '',

];
