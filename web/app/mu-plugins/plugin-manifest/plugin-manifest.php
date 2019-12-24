<?php

/**
 * Plugin name: Plugin Manifest
 * Plugin description: Load plugins for particular environments
 */

\PrimeTime\WordPress\PluginManifest\Activation::set(__DIR__ . '/manifest.yml', getenv('WP_ENV'));
