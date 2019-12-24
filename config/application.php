<?php

use TinyPixel\Config\Bootloader;

Env::init();

$bootloader = new Bootloader();
$bootloader->init(dirname(__DIR__));

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

if (env('SENTRY_DSN') && env('WP_ENV') !== 'development') {
    Sentry\init([
        'dsn'         => env('SENTRY_DSN'),
        'release'     => env('SENTRY_RELEASE'),
        'environment' => env('SENTRY_ENVIRONMENT'),
        'error_types' => E_ALL & ~E_NOTICE & ~E_DEPRECATED,
    ]);

    if (env('SENTRY_TRELLIS_VERSION')) {
        Sentry\configureScope(function (Sentry\State\Scope $scope): void {
            $scope->setTag('property', env('WP_SITEURL'));
            $scope->setTag('version', env('SENTRY_TRELLIS_VERSION'));
        });
    }
}

$bootloader->defineEnvironments([
    'development' => 'http://dreamdefenders.vagrant',
    'staging'     => 'https://staging.dreamdefenders.org',
    'production'  => 'https://dreamdefenders.org',
]);

$bootloader->defineFS([
    'CONTENT_DIR' => 'app',
    'WP_ENV'      => env('WP_ENV'),
    'WP_HOME'     => env('WP_HOME'),
    'WP_SITEURL'  => env('WP_SITEURL'),
]);

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

$bootloader->defineS3([
    'S3_UPLOADS_BUCKET'     => env('S3_UPLOADS_BUCKET'),
    'S3_UPLOADS_KEY'        => env('S3_UPLOADS_KEY'),
    'S3_UPLOADS_SECRET'     => env('S3_UPLOADS_SECRET'),
    'S3_UPLOADS_ENDPOINT'   => env('S3_UPLOADS_ENDPOINT') ?: 'https://nyc3.digitaloceanspaces.com',
    'S3_UPLOADS_REGION'     => env('S3_UPLOADS_REGION')   ?: 'nyc3',
]);

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

$bootloader->configureWordPressApp([
    'DISABLE_WP_CRON'            => true,
    'AUTOMATIC_UPDATER_DISABLED' => true,
    'DISALLOW_FILE_EDIT'         => true,
    'DISALLOW_FILE_MODS'         => true,
    'WP_DEBUG_DISPLAY'           => false,
    'SCRIPT_DEBUG'               => false,
    'DISPLAY_ERRORS'             => false,
]);

$bootloader->exposeSSL();
$bootloader->overrideEnv($bootloader::get('WP_ENV'));

$bootloader->boot();