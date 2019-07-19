<?php

namespace TinyPixel\Support;

use \Roots\Acorn\Application;
use \TinyPixel\Support\Boot\BootError;

class Bootloader
{
    public function __construct(string $baseDir)
    {
        /**
         * Plugin name
         * @var string
         */
        $this->name = 'Tiny Pixel Site Support';

        /**
         * Base directory
         * @var string
         */
        $this->baseDir = $baseDir;

        /**
         * Plugin requirements
         * @var object
         */
        $this->requires = (object) [
            'php'  => '7.2',
            'wp'   => '5.2',
        ];

        /**
         * Runtime
         * @var string
         */
        $this->runtime = (object) [
            'env' => strtoupper(env('WP_ENV')),
            'php' => phpversion(),
            'wp'  => get_bloginfo('version')
        ];

        /**
         * Location of plugin translation files
         * @var string
         */
        $this->i18nHandle = "{$baseDir}/resources/languages";
    }

    /**
     * Does compatibility checks
     * @return object self
     */
    public function preflight()
    {
        $this
            ->loadTextDomain()
            ->checkPHPVersion()
            ->checkWPVersion();

        return $this;
    }

    /**
     * Register Roots Share with the Acorn IOC
     * @return object self
     */
    public function registerWithAcorn()
    {
        \Roots\bootloader(function (Application $app) {
            $app->register(\TinyPixel\Support\Providers\PluginServiceProvider::class);
        });

        return $this;
    }

    /**
     * Loads plugin i18n texts
     * @return object self
     */
    private function loadTextDomain()
    {
        \load_plugin_textdomain(
            'tiny-pixel-support',
            false,
            dirname(plugin_basename(__FILE__)) . '/../resources/languages/'
        );

        return $this;
    }

    /**
     * Checks for minimum PHP version compatibility
     * @return object self
     */
    private function checkPHPVersion()
    {
        version_compare($this->requires->php, $this->runtime->php, '>') &&
            BootError::throw([
                /* translators: PHP language version requirement */
                'body' => sprintf(__(
                    'You must be using PHP %s or greater.',
                    'tiny-pixel-support'
                ), $this->requires->php),

                /* translators: Currently installed PHP language version */
                'subtitle' => sprintf(__(
                    'Invalid PHP version (%s)',
                    'tiny-pixel-support'
                ), $this->runtime->php),
            ]);

        return $this;
    }
    /**
     * Checks for minimum WordPress version compatibility
     * @return object self
     */
    private function checkWPVersion()
    {
        version_compare($this->requires->wp, $this->runtime->wp, '>') &&
            BootError::throw([
                /* translators: WordPress version requirement */
                'body' => sprintf(__(
                    'You must be using WordPress %s or greater',
                    'tiny-pixel-support'
                ), $this->requires->wp),

                /* translators: Currently installed WordPress version */
                'subtitle' => sprintf(__(
                    'Invalid WordPress version (%s)',
                    'tiny-pixel-support'
                ), $this->runtime->wp),
            ]);

        return $this;
    }
}
