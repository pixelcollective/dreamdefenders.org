<?php
/**
 * Plugin Name:     Tiny Pixel Data
 * Plugin URI:      https://github.com/pixelcollective/dreamdefenders.org
 * Description:     Data processing utilities
 * Version:         0.1.0
 * Author:          Tiny Pixel <developers@tinypixel.io>
 * Author URI:      https://tinypixel.io
 * License:         MIT License
 * Text Domain:     tiny-pixel
 * Domain Path:     /resources/lang
 *
 * Note: this file is intentionally written for compatibility with PHP versions
 * which the plugin itself does not support.
 */

/** Plugin namespace — change this! */
namespace TinyPixel;

use function Roots\add_actions;
use function Roots\app;
use function Roots\config;

/**
 * Plugin Meta — change this!
 *
 * Legend
 * - name:          Should be the same as the file header above.
 * - alias:         This is the alias which will be used in the Acorn container.
 *                  Should be short, but not generic to avoid conflict.
 * - version:       Should be the same as the file header above.
 * - requiredPHP:   The minimum required PHP version to run the plugin.
 * - requiredWP:    The minimum required WP version to run the plugin.
 */
$meta = (object) [
    'name' => 'Tiny Pixel Service Provider',
    'alias' => 'pixel-service',
    'version' => '0.1.0',

    /** Plugin requirements */
    'requiredPHP' => '7.1',
    'requiredWP' => '4.7.0',

    /** Plugin features */
    'features' => [
        'blade',
    ],

    /** Autoloader location — leave this unless you’ve explicitly changed it */
    'composer' => __DIR__.'/vendor/autoload.php',
];

/** Initialize error collector */
$errors = [];

/**
 * Helper function for displaying errors.
 * @param $errors []
 * @param $is_admin_notice bool
 */
$display_errors = function ($errors, $is_admin_notice) use ($meta) {
    $content = '';
    $header = $is_admin_notice ? "<h4>{$meta->name} disabled, because an error has occurred:</h4>" : '';
    $styles = $is_admin_notice ? '' : '<style>.error{color:#444;font:13px sans-serif}</style>';
    foreach ($errors as $error) {
        $content .= "<p><strong>{$error->title}:</strong> {$error->message}</p>";
    }
    echo "{$styles}<div class=\"error\">{$header}{$content}</div>";
};

/**
 * Ensure the correct PHP version is being used.
 */
version_compare($meta->requiredPHP, phpversion(), '<')
    ?: $errors[] = (object) [
        'title' => __('Invalid PHP version', 'pixel-service'),
        'message' => __(
            sprintf('You must be using PHP %s or greater.', $meta->requiredPHP),
            'pixel-service'
        ),
    ];

/**
* Ensure the correct WordPress version is being used.
*/
version_compare($meta->requiredWP, get_bloginfo('version'), '<')
    ?: $errors[] = (object) [
        'title' => __('Invalid WordPress version', 'pixel-service'),
        'message' => __(
            sprintf('You must be using WordPress %s or greater.', $meta->requiredWP),
            'pixel-service'
        ),
    ];

/**
 * Ensure dependencies can be loaded.
 */
file_exists($meta->composer)
    ?: $errors[] = (object) [
        'title' => __('Autoloader not found', 'pixel-service'),
        'message' => __(
            sprintf('You must run <code>composer install</code> from the %s plugin directory.', $meta->name),
            'pixel-service'
        ),
    ];

/**
 * If there are no errors, boot the plugin, or else display errors:
 * - and prevent activation if it was being activated.
 * - and disable the plugin (i.e. do nothing) if previously activated.
 */
if (empty($errors)) {
    /** Load the composer dependencies */
    require_once $meta->composer;

    /** Register the plugin as a service of the Acorn application */
    app()->register(\TinyPixel\Providers\PluginServiceProvider::class);
    $plugin = app($meta->alias);

    /** Create the service with the plugin meta — Acorn hasn’t booted */
    $plugin->create(__FILE__, $meta->name, $meta->version);

    /** Lifecycle hooks — shouldn’t be nested in any other actions */
    register_activation_hook(__FILE__, [$plugin, 'activate']);
    register_deactivation_hook(__FILE__, [$plugin, 'deactivate']);
    add_action($plugin->getTag('upgrade'), [$plugin, 'upgrade']);

    /**
     * Check if Acorn has been booted (perhaps by Sage), otherwise boot it.
     * Note: after_setup_theme doesn’t run for requests to the WP REST API.
     */
    add_actions(['after_setup_theme', 'rest_api_init'], function () use ($plugin, $meta) {
        if (in_array('blade', $meta->features)) {
            app()->register(\Roots\Acorn\View\ViewServiceProvider::class);
        }

        app()->booting(function () use ($plugin) {
            $config = config();
            $files = app('files')->allFiles($plugin->configPath());

            foreach ($files as $file) {
                $config->load($file);
            }
        });

        if (!app()->isBooted()) {
            app()->boot();
        }

        $plugin->run();
    }, 5);
} else {
    /** This only runs if the plugin was just activated */
    register_activation_hook(__FILE__, function () use ($errors, $display_errors) {
        $display_errors($errors, false);
        die(1);
    });
    /** If previously activated, we create an admin notice. */
    add_action('admin_notices', function () use ($errors, $display_errors) {
        $display_errors($errors, true);
    });
}
