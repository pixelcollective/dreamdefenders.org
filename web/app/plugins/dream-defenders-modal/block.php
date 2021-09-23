<?php

/**
 * Plugin Name: Modal block
 * Version:     0.0.1
 * Author:      Kelly Mears <kelly@roots.io>
 * License:     MIT
 * Text Domain: tiny-pixel
 */

namespace TinyPixel\Modal;

use \WP_Error;
use function \wp_register_script;
use function \wp_register_style;
use function \register_block_type;

add_action('init', function () {
    (new class
    {
        public static $name = 'tiny-pixel-modal';

        /**
         * Blocks.
         *
         * @static array
         */
        public static $blocks = ['tiny-pixel/modal'];

        /**
         * Plugin root directory.
         *
         * @static string
         */
        public static $dir;

        /**
         * Webpack dependencies.
         *
         * @static array
         */
        public static $manifest;

        /**
         * Class constructor.
         *
         * @throws \WP_Error
         */
        public function __construct()
        {
            /* Set plugin root dir reference */
            self::$dir = dirname(__FILE__);

            /**
             * Throw an error if the dependency manifest has not
             * been generated or is otherwise not found.
             */
            if (
                !realpath(
                    $manifestSrc = self::$dir . '/dist/editor.asset.json'
                )
            ) {
                throw new WP_Error(
                    'manifest_not_found',
                    'There was an issue registering ' . self::$name,
                    "Run 'npm build' in " . self::$dir,
                );
            }

            $manifest = file_get_contents($manifestSrc);

            if ($manifest) {
                self::$manifest = array_values(
                    json_decode($manifest, true)
                );
            }
        }

        /**
         * Class invocation.
         */
        public function __invoke(): void
        {
            foreach (self::$blocks as $block) {
                if (realpath(self::$dir . '/dist/editor.js')) {
                    wp_register_script(
                        "{$block}/editor/js",
                        plugins_url('dist/editor.js', __FILE__),
                        ...self::$manifest
                    );
                }

                if (realpath(self::$dir . '/dist/public.js')) {
                    wp_register_script(
                        "{$block}/public/js",
                        plugins_url('dist/public.js', __FILE__),
                        ...self::$manifest
                    );
                } else {
                    throw new WP_Error(self::$dir . '/dist/public.js');
                }

                foreach (['editor', 'public'] as $styleName) {
                    if (realpath(self::$dir . "/dist/{$styleName}.css")) {
                        wp_register_style(
                            "{$block}/{$styleName}/css",
                            plugins_url("dist/{$styleName}.css", __FILE__),
                            [],
                            null
                        );
                    } else {
                        throw new WP_Error(self::$dir . "/dist/{$styleName}.css");
                    }
                }

                register_block_type($block, [
                    'editor_script' => "{$block}/editor/js",
                    'editor_style' => "{$block}/editor/css",
                    'style' => "{$block}/public/css",
                    'script' => "{$block}/public/js",
                    'render_callback' => function ($attr, $content) {
                        $data = json_encode([
                            'attr' => $attr,
                            'content' => $content,
                        ]);

                        if (!is_admin()) {
                            echo "<script>var tinymodal = $data</script>";
                            echo '<div id="tinymodal"></div>';
                        }
                    },
                ]);
            }
        }
    })();
});
