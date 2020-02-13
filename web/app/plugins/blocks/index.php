<?php

/**
 * Plugin name: Dream Defenders Block Editor Scripts
 * Plugin description: Blocks for Dream Defenders
 */

namespace TinyPixel\Blocks;

require __DIR__ . '/vendor/autoload.php';

$tinyblocks = \TinyBlocks\App::getInstance(__DIR__ . '/config');

$tinyblocks->addBlock(\TinyPixel\Blocks\Container::class);
$tinyblocks->addBlock(\TinyPixel\Blocks\FreedomPaper::class);
$tinyblocks->addBlock(\TinyPixel\Blocks\TwoColumn::class);
$tinyblocks->addBlock(\TinyPixel\Blocks\PostContainer::class);
$tinyblocks->addBlock(\TinyPixel\Blocks\ProjectContainer::class);
$tinyblocks->addBlock(\TinyPixel\Blocks\Squadd::class);

/**
 * Conditional scripts
 */
add_action('enqueue_block_editor_assets', function () {
    global $current_screen;

    if ($current_screen->post_type == 'projects' || $current_screen->post_type == 'post') {
        wp_enqueue_script('tinypixel/hide-title-block/js', plugins_url('dist/scripts/hide-title-block.js', __FILE__), ['wp-dom-ready']);
    }
});
