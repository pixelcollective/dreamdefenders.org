<?php

namespace TinyPixel\WPConfig;

use \Roots\WPConfig\Config as RootsConfig;

/**
 * Load application
 *
 * @package TinyPixel
 */
class Config extends RootsConfig
{
    /**
     * Define set of config items
     *
     * @var    array definitions
     * @return void
     */
    public static function defineSet($definitions): void
    {
        foreach ($definitions as $const => $def) {
            self::define($const, $def);
        }
    }

    /**
     * Allow WordPress to detect HTTPS when used behind a reverse proxy
     * or a load balancer.
     *
     * @see https://codex.wordpress.org/Function_Reference/is_ssl#Notes
     *
     * @return void
     */
    public static function exposeSSL(): void
    {
        isset($_SERVER['HTTP_X_FORWARDED_PROTO'])
            && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https'
            && $_SERVER['HTTPS'] = 'on';
    }
}
