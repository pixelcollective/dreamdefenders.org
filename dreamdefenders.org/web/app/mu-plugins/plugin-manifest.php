<?php
use \PrimeTime\WordPress\PluginManifest\Activation;

\PrimeTime\WordPress\PluginManifest\Activation::set(
    '/srv/www/dreamdefenders.org/current/plugin-manifest.yml',
    getenv('WP_ENV')
);
