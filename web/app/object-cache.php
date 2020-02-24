<?php

/**
 * WordPress Predis Caching
 *
 * @see @humanmade/wp-predis
 * @see @pantheon/wp-redis
 */
if (WP_ENV !== 'development') {
    global $redis_server;

    $redis_server = [
        'host' => defined('REDIS_HOST') ? REDIS_HOST : null,
        'port ' => defined('REDIS_PORT') ? REDIS_PORT : null,
        'auth' => defined('REDIS_AUTH') ? REDIS_AUTH : null,
        'ssl' => [
            'local_cert' => defined('PREDIS_CERT') ? PREDIS_CERT : null,
            'verify_peers' => defined('PREDIS_VERIFY_PEERS') ? PREDIS_VERIFY_PEERS : null,
        ],
    ];

    WP_Predis\add_filters();

    require_once dirname(__FILE__) . '/mu-plugins/wp-redis/object-cache.php';
}
