<?php

/*
Plugin Name: S3-Uploads-CDN
Description: This plugin will load your assets from a given CDN instead of the local server.
Author: Danny van Kooten
Version: 1.0.0
Author URI: https://tinypixel.dev
*/

require_once __DIR__ . '/UrlRewriter.php';

add_action('template_redirect', function () {
    if (! defined('S3_UPLOADS_BUCKET') || ! defined('S3_UPLOADS_REGION')) {
        return;
    }

    (new UrlRewriter())->runHooks();
});
