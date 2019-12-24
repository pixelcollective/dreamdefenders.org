<?php
/**
 * WordPress Predis Caching
 *
 * @see @humanmade/wp-predis
 * @see @pantheon/wp-redis
 */
if (env('WP_ENV') !== 'development') {
    WP_Predis\add_filters();

    require_once dirname(__FILE__) . '/mu-plugins/wp-redis/object-cache.php';
}
