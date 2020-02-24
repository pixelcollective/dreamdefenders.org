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
$bedrock = dirname(__DIR__);
$web  = $bedrock . '/web';

/**
 * Expose global env() function from oscarotero/env
 */
Env::init();

/**
 * Use Dotenv to set required environment variables and load .env file in root
 */
$dotenv = Dotenv\Dotenv::createImmutable($bedrock);
if (file_exists($bedrock . '/.env')) {
    $dotenv->load();
    $dotenv->required(['WP_HOME', 'WP_SITEURL']);

    if (!env('DATABASE_URL')) {
        $dotenv->required(['DB_NAME', 'DB_USER', 'DB_PASSWORD']);
    }
}

/**
 * WordPress
 */
Config::defineSet([
    'WP_ENV' => env('WP_ENV'),
    'WP_HOME' => env('WP_HOME'),
    'WP_SITEURL' => env('WP_SITEURL'),
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
 * Debug settings.
 */
Config::defineSet([
    'DISPLAY_ERRORS' => Config::get('WP_ENV') == 'development' ? true : false,
    'SCRIPT_DEBUG' => Config::get('WP_ENV') == 'development' ? true : false,
    'WP_DEBUG' => Config::get('WP_ENV') == 'development' ? true : false,
    'WP_DEBUG_DISPLAY' => Config::get('WP_ENV') == 'development' ? true : false,
]);

ini_set('display_errors', Config::get('DISPLAY_ERRORS'));

/**
 * Configure application paths.
 */
Config::defineSet([
    'CONTENT_DIR' => '/app',
    'WP_CONTENT_DIR' => $web . '/app',
    'WP_CONTENT_URL' => Config::get('WP_HOME') . '/app',
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
    'DB_NAME' => env('DB_NAME'),
    'DB_USER' => env('DB_USER'),
    'DB_PASSWORD' => env('DB_PASSWORD'),
    'DB_HOST' => env('DB_HOST'),
    'DB_CHARSET' => env('DB_CHARSET') ?: 'utf8',
    'DB_COLLATION' => env('DB_COLLATION') ?: 'utf8_unicode_ci',
    'DB_PREFIX' => env('DB_PREFIX') ?: 'wp_',
]);

/** I think this in violation of WPCS */
$table_prefix = Config::get('DB_PREFIX');

/**
 * Configure S3.
 */
Config::defineSet([
    'S3_UPLOADS_BUCKET'   => env('S3_UPLOADS_BUCKET'),
    'S3_UPLOADS_KEY'      => env('S3_UPLOADS_KEY'),
    'S3_UPLOADS_SECRET'   => env('S3_UPLOADS_SECRET'),
    'S3_UPLOADS_ENDPOINT' => env('S3_UPLOADS_ENDPOINT') ?: 'https://nyc3.digitaloceanspaces.com',
    'S3_UPLOADS_REGION'   => env('S3_UPLOADS_REGION') ?: 'nyc3',
]);

/**
 * Configure Redis.
 */
global $redis_server;

Config::defineSet([
    'REDIS_AUTH' => env('REDIS_AUTH'),
    'REDIS_HOST' => env('REDIS_HOST') ?: env('DB_NAME'),
    'REDIS_PORT' => env('REDIS_PORT') ?: 25061,
    'REDIS_OBJECT_CACHE' => env('REDIS_OBJECT_CACHE') ?: true,
    'WP_CACHE_KEY_SALT' => env('REDIS_CACHE_KEY_SALT') ?: false,
    'WP_REDIS_USE_CACHE_GROUPS' => env('REDIS_USE_CACHE_GROUPS') ?: false,
    'PREDIS_VERIFY_PEERS' => true,
    'PREDIS_CERT' => $bedrock . '/config/cert/redis-ca-cert.crt',
]);

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
    'AUTH_KEY' => env('AUTH_KEY') ?: null,
    'AUTH_SALT' => env('AUTH_SALT') ?: null,
    'LOGGED_IN_KEY' => env('LOGGED_IN_KEY') ?: null,
    'LOGGED_IN_SALT' => env('LOGGED_IN_SALT') ?: null,
    'NONCE_KEY' => env('NONCE_KEY') ?: null,
    'NONCE_SALT' => env('NONCE_SALT') ?: null,
    'SECURE_AUTH_KEY' => env('SECURE_AUTH_KEY') ?: null,
    'SECURE_AUTH_SALT' => env('SECURE_AUTH_SALT') ?: null,
]);

/**
 * Allow SSL behind a reverse proxy.
 */
Config::exposeSSL();

/**
 * Configure Sentry.
 */
if (env('SENTRY_DSN') && Config::get('WP_ENV') !== 'development') {
    Config::defineSet([
        'SENTRY_DSN' => env('SENTRY_DSN') ?: null,
        'RELEASE' => env('GIT_SHA') ?: null,
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

Config::apply();

/**
 * Bootstrap WordPress
 */
if (!defined('ABSPATH')) {
    define('ABSPATH', $web . '/wp/');
}
