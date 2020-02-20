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

use TinyPixel\Config\Bootloader;

/**
 * Initialize bootloader.
 */
Env::init();

$bootloader = new Bootloader();
$bootloader->init(dirname(__DIR__));

/**
 * Specify required environmental variables.
 */
$bootloader->loadEnv([
    'DB_HOST',
    'DB_NAME',
    'DB_PASSWORD',
    'DB_USER',
    'REDIS_HOST',
    'REDIS_PASSWORD',
    'S3_UPLOADS_BUCKET',
    'S3_UPLOADS_KEY',
    'S3_UPLOADS_SECRET',
    'WP_ENV',
    'WP_HOME',
    'WP_SITEURL',
]);

/**
 * Configure Sentry.
 */
if (env('SENTRY_DSN') && env('WP_ENV') !== 'development') {
    $release = (object) [
        'dsn' => env('SENTRY_DSN') ?: null,
        'sha' => env('GIT_SHA')    ?: null,
        'env' => env('WP_ENV')     ?: null,
        'url' => env('WP_HOME')    ?: null,
    ];

    \Sentry\init([
        'dsn'         => $release->dsn,
        'environment' => $release->env,
        'release'     => $release->sha,
        'error_types' => E_ALL & ~E_NOTICE & ~E_DEPRECATED,
    ]);

    \Sentry\configureScope(function (\Sentry\State\Scope $scope) use ($release): void {
        $scope->setTag('property', $release->url);
        env('REDIS_HOST') && $scope->setTag('redis', env('REDIS_HOST'));
        env('DB_HOST')    && $scope->setTag('db', env('DB_HOST'));
        env('S3_BUCKET')  && $scope->setTag('s3', env('S3_UPLOADS_BUCKET'));
    });

    $bootloader->defineSet([
        'SENTRY_DSN'     => $release->dsn,
        'SENTRY_RELEASE' => $release->sha,
    ]);
}

/**
 * Define environments
 */
$bootloader->defineEnvironments([
    'development' => 'http://dreamdefenders.vagrant',
    'staging'     => 'https://build.dreamdefenders.tinypixel.dev',
]);

/**
 * Configure WordPress application.
 */
$bootloader->configureWordPressApp([
    'DISABLE_WP_CRON'            => true,
    'AUTOMATIC_UPDATER_DISABLED' => true,
    'DISALLOW_FILE_EDIT'         => true,
    'DISALLOW_FILE_MODS'         => true,
    'WP_DEBUG_DISPLAY'           => env('WP_ENV') == 'development',
    'SCRIPT_DEBUG'               => env('WP_ENV') == 'development',
    'DISPLAY_ERRORS'             => env('WP_ENV') == 'development',
]);

/**
 * Configure application paths.
 */
$bootloader->defineFS([
    'CONTENT_DIR' => 'app',
    'WP_ENV'      => env('WP_ENV'),
    'WP_HOME'     => env('WP_HOME'),
    'WP_SITEURL'  => env('WP_SITEURL'),
]);

/**
 * Configure DB.
 */
$bootloader->defineDB([
    'DB_NAME'      => env('DB_NAME'),
    'DB_USER'      => env('DB_USER'),
    'DB_PASSWORD'  => env('DB_PASSWORD'),
    'DB_HOST'      => env('DB_HOST'),
    'DB_CHARSET'   => env('DB_CHARSET')   ?: 'utf8',
    'DB_COLLATION' => env('DB_COLLATION') ?: 'utf8_unicode_ci',
    'DB_PREFIX'    => env('DB_PREFIX')    ?: 'wp_',
]);

$table_prefix = $bootloader::get('DB_PREFIX');

/**
 * Configure S3.
 */
$bootloader->defineS3([
    'S3_UPLOADS_BUCKET'   => env('S3_UPLOADS_BUCKET'),
    'S3_UPLOADS_KEY'      => env('S3_UPLOADS_KEY'),
    'S3_UPLOADS_SECRET'   => env('S3_UPLOADS_SECRET'),
    'S3_UPLOADS_ENDPOINT' => env('S3_UPLOADS_ENDPOINT') ?: 'https://nyc3.digitaloceanspaces.com',
    'S3_UPLOADS_REGION'   => env('S3_UPLOADS_REGION')   ?: 'nyc3',
]);

/**
 * Configure Redis.
 */
$bootloader->defineRedis([
    'REDIS_HOST'          => env('REDIS_HOST') ?: env('DB_NAME'),
    'REDIS_AUTH'          => env('REDIS_AUTH'),
    'REDIS_PORT'          => env('REDIS_PORT') ?: 25061,
    'PREDIS_CERT'         => "{$bootloader->bedrockDir}/config/cert/redis-ca-cert.crt",
    'PREDIS_VERIFY_PEERS' => true,
]);

$bootloader->configureRedis([
    'REDIS_OBJECT_CACHE'        => env('REDIS_OBJECT_CACHE')     ?: true,
    'WP_REDIS_USE_CACHE_GROUPS' => env('REDIS_USE_CACHE_GROUPS') ?: false,
    'WP_CACHE_KEY_SALT'         => env('REDIS_CACHE_KEY_SALT')   ?: false,
]);

/**
 * Configure auth keys and salts.
 */
$bootloader->defineSalts([
    'AUTH_KEY'         => env('AUTH_KEY')         ?: null,
    'AUTH_SALT'        => env('AUTH_SALT')        ?: null,
    'LOGGED_IN_KEY'    => env('LOGGED_IN_KEY')    ?: null,
    'LOGGED_IN_SALT'   => env('LOGGED_IN_SALT')   ?: null,
    'NONCE_KEY'        => env('NONCE_KEY')        ?: null,
    'NONCE_SALT'       => env('NONCE_SALT')       ?: null,
    'SECURE_AUTH_KEY'  => env('SECURE_AUTH_KEY')  ?: null,
    'SECURE_AUTH_SALT' => env('SECURE_AUTH_SALT') ?: null,
]);

/**
 * Allow SSL behind a reverse proxy.
 */
$bootloader->exposeSSL();

/**
 * Boot application.
 */
$bootloader->boot();
