<?php
/*
 * Plugin Name:   Tiny Pixel Support
 * Plugin URI:    https://tinypixel.dev
 * Description:   Site Support framework
 * Version:       1.0.0
 * Author:        Kelly Mears
 * Author URI:    https://tinypixel.dev
 * License:       MIT License
 * License URI:   http://opensource.org/licenses/MIT
 * Text Domain:   tiny-pixel
 * Domain Path:   resources/languages
 */

(new class {
    public function init()
    {
        if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
            require __DIR__ . '/boot/BootError.php';

            \TinyPixel\Support\BootError::throw([
                'body' => __(
                    'The Tiny Pixel Site Support plugin needs to be installed in order to be run.<br />' .
                    'Run <code>composer install</code> from the plugin directory.',
                    'tiny-pixel-support'
                ),

                'subtitle' => __('Autoloader not found.', 'tiny-pixel-support'),
            ]);
        }

        require __DIR__ . '/vendor/autoload.php';

        (new \TinyPixel\Support\Bootloader(__DIR__))
            ->preflight()
            ->registerWithAcorn();
    }
})->init();
