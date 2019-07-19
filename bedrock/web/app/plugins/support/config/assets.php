<?php

$baseDir = plugin_dir_path(__DIR__);
$baseUrl = plugin_dir_url(__DIR__);

return [

    /*
    |--------------------------------------------------------------------------
    | Assets Manifests
    |--------------------------------------------------------------------------
    |
    | Manifests contain lists of assets that are referenced by static keys that
    | point to dynamic locations, such as a cache-busted location. A manifest
    | may employ any number of strategies for determining absolute local and
    | remote paths to assets.
    |
    */

    'manifests' => [
        'plugin' => [
            'strategy' => 'relative',
            'path'     => "{$baseDir}dist",
            'uri'      => "{$baseUrl}dist",
            'manifest' => "{$baseDir}dist/mix-manifest.json",
        ],
    ],
];
