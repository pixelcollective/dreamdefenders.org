<?php

/**
 * Application configuration
 *
 * @category Bedrock
 * @package  TinyPixel
 * @author   Tiny Pixel <hello@tinypixel.dev>
 * @license  MIT <https://github.com/pixelcollective/.github/tree/master/LICENSE.md>
 * @link     Tiny Pixel <https://tinypixel.dev>
 */

require_once __DIR__ . '/Config.php';

use TinyPixel\WPConfig\Config;

/**
 * Directory containing all of the site's files
 *
 * @var string
 */
$root_dir = dirname(__DIR__);

/**
 * Document Root
 *
 * @var string
 */
$webroot_dir = $root_dir . '/web';

/**
 * Expose global env() function from oscarotero/env
 */
Env::init();

/**
 * Use Dotenv to set required environment variables and load .env file in root
 */
$dotenv = Dotenv\Dotenv::createImmutable($root_dir);
if (file_exists($root_dir . '/.env')) {
    $dotenv->load();
    $dotenv->required(['WP_HOME', 'WP_SITEURL']);

    if (!env('DATABASE_URL')) {
        $dotenv->required(['DB_NAME', 'DB_USER', 'DB_PASSWORD']);
    }
}

/**
 * Base values
 */
Config::defineSet([
    'WP_ENV' => Env::get('WP_ENV'),
    'WP_HOME' => Env::get('WP_HOME'),
    'WP_SITEURL' => Env::get('WP_SITEURL'),
]);

/**
 * Configure WordPress application.
 */
Config::defineSet([
    'DISABLE_WP_CRON' => true,
    'DISALLOW_FILE_EDIT' => true,
    'DISALLOW_FILE_MODS' => true,
    'AUTOMATIC_UPDATER_DISABLED' => true,
    'WP_CACHE' => Config::get('WP_ENV') !== 'development' ? true : false,
]);

/**
 * Configure debug
 */
Config::defineSet([
    'WP_DEBUG' => Config::get('WP_ENV') == 'development' ? true : false,
    'WP_DEBUG_DISPLAY' => Config::get('WP_ENV') == 'development' ? true : false,
    'SCRIPT_DEBUG' => Config::get('WP_ENV') == 'development' ? true : false,
    'DISPLAY_ERRORS' => Config::get('WP_ENV') == 'development' ? true : false,
]);
ini_set('display_errors', Config::get('DISPLAY_ERRORS'));


/**
 * Configure application paths.
 */
Config::defineSet([
    'WP_CONTENT' => $root_dir . '/web/app/',
    'WP_CONTENT_DIR' => $root_dir . '/web/app',
    'WP_CONTENT_URL' => Config::get('WP_HOME') . 'app',
]);

/**
 * Define environments
 */
Config::define('ENVIRONMENTS', [
    'development' => 'http://dreamdefenders.vagrant',
    'staging'     => 'https://build.dreamdefenders.tinypixel.dev',
]);

/**
 * Configure DB.
 */
Config::defineSet([
    'DB_NAME'      => Env::get('DB_NAME'),
    'DB_USER'      => Env::get('DB_USER'),
    'DB_PASSWORD'  => Env::get('DB_PASSWORD'),
    'DB_HOST'      => Env::get('DB_HOST'),
    'DB_CHARSET'   => Env::get('DB_CHARSET')   ?: 'utf8',
    'DB_COLLATION' => Env::get('DB_COLLATION') ?: 'utf8_unicode_ci',
    'DB_PREFIX'    => Env::get('DB_PREFIX')    ?: 'wp_',
]);
$table_prefix = Config::get('DB_PREFIX');

/**
 * Configure S3.
 */
Config::defineSet([
    'S3_UPLOADS_BUCKET'   => Env::get('S3_UPLOADS_BUCKET') ?: 'production',
    'S3_UPLOADS_KEY'      => Env::get('S3_UPLOADS_KEY'),
    'S3_UPLOADS_SECRET'   => Env::get('S3_UPLOADS_SECRET'),
    'S3_UPLOADS_ENDPOINT' => Env::get('S3_UPLOADS_ENDPOINT') ?: 'https://nyc3.digitaloceanspaces.com',
    'S3_UPLOADS_REGION'   => Env::get('S3_UPLOADS_REGION') ?: 'nyc3',
]);

/**
 * Configure Redis.
 */
Config::defineSet([
    'REDIS_HOST' => Env::get('REDIS_HOST') ?: Config::get('DB_NAME'),
    'REDIS_AUTH' => Env::get('REDIS_AUTH'),
    'REDIS_PORT' => Env::get('REDIS_PORT') ?: 25061,
    'REDIS_OBJECT_CACHE' => Env::get('REDIS_OBJECT_CACHE') ?: true,
    'PREDIS_CERT' => "{$root_dir}/config/cert/redis-ca-cert.crt",
    'PREDIS_VERIFY_PEERS' => true,
    'WP_CACHE_KEY_SALT' => Env::get('REDIS_CACHE_KEY_SALT') ?: false,
    'WP_REDIS_USE_CACHE_GROUPS' => Env::get('REDIS_USE_CACHE_GROUPS') ?: false,
]);

global $redis_server;
$redis_server = [
    'host' => Config::get('REDIS_HOST'),
    'port' => Config::get('REDIS_PORT'),
    'auth' => Config::get('REDIS_AUTH'),
    'ssl' => [
        'local_cert' => Config::get('PREDIS_CERT'),
        'verify_peers' => Config::get('PREDIS_VERIFY_PEERS'),
    ],
];

/**
 * Configure auth keys and salts.
 */
Config::defineSet([
    'AUTH_KEY' => Env::get('AUTH_KEY') ?: null,
    'AUTH_SALT' => Env::get('AUTH_SALT') ?: null,
    'LOGGED_IN_KEY' => Env::get('LOGGED_IN_KEY') ?: null,
    'LOGGED_IN_SALT' => Env::get('LOGGED_IN_SALT') ?: null,
    'NONCE_KEY' => Env::get('NONCE_KEY') ?: null,
    'NONCE_SALT' => Env::get('NONCE_SALT') ?: null,
    'SECURE_AUTH_KEY' => Env::get('SECURE_AUTH_KEY') ?: null,
    'SECURE_AUTH_SALT' => Env::get('SECURE_AUTH_SALT') ?: null,
]);

/**
 * Allow SSL behind a reverse proxy.
 */
Config::exposeSSL();

/**
 * Configure Sentry.
 */
if (Env::get('SENTRY_DSN') && Config::get('WP_ENV') !== 'development') {
    Config::defineSet([
        'SENTRY_DSN' => Env::get('SENTRY_DSN') ?: null,
        'RELEASE' => Env::get('GIT_SHA') ?: null,
    ]);

    \Sentry\init([
        'dsn' => Config::get('SENTRY_DSN'),
        'release' => Config::get('RELEASE'),
        'environment' => Config::get('WP_ENV'),
        'error_types' => E_ALL & ~E_NOTICE & ~E_DEPRECATED,
    ]);

    \Sentry\configureScope(function (\Sentry\State\Scope $scope): void {
        $scope->setTag('property', Config::get('WP_SITEURL'));
        $scope->setTag('redis', Config::get('REDIS_HOST'));
        $scope->setTag('db', Config::get('DB_HOST'));
        $scope->setTag('s3', Config::get('S3_UPLOADS_BUCKET'));
    });
}

/**
 * Boot application.
 */
Config::apply();
