<?php

/**
 * Plugin name: Dream Defenders Block Editor Scripts
 * Plugin description: Blocks for Dream Defenders
 */

namespace TinyPixel\Blocks;

require __DIR__ . '/vendor/autoload.php';

use TinyBlocks\App;

$tinyblocks = App::getInstance(__DIR__ . '/config');

$tinyblocks->addBlock(\TinyPixel\Blocks\Banner::class);
$tinyblocks->addBlock(\TinyPixel\Blocks\Container::class);
$tinyblocks->addBlock(\TinyPixel\Blocks\FreedomPaper::class);
$tinyblocks->addBlock(\TinyPixel\Blocks\TwoColumn::class);
$tinyblocks->addBlock(\TinyPixel\Blocks\PostContainer::class);
$tinyblocks->addBlock(\TinyPixel\Blocks\ProjectContainer::class);
$tinyblocks->addBlock(\TinyPixel\Blocks\Squadd::class);

/**
 * Hide the default post title block
 * on posttypes that have their own:
 *  - projects
 *  - posts
 *  - pages
 */
add_action('enqueue_block_editor_assets', function () {
    global $current_screen;

    if ($current_screen->post_type == 'projects'
        || $current_screen->post_type == 'post'
        || $current_screen->post_type == 'page'
    ) {
        wp_enqueue_script(
            'tinypixel/hide-title-block/js',
            plugins_url('dist/scripts/hide-title-block.js', __FILE__),
            ['wp-dom-ready']
        );
    }
});
