<?php

/**
 * Plugin name: Dream Defenders Block Editor Scripts
 * Plugin description: Blocks for Dream Defenders
 */

namespace TinyPixel\Blocks;

require __DIR__ . '/vendor/autoload.php';

$tinyblocks = \TinyBlocks\App::getInstance(__DIR__ . '/config');

$tinyblocks->addBlock(\TinyPixel\Blocks\FreedomPaper::class);
$tinyblocks->addBlock(\TinyPixel\Blocks\TwoColumn::class);
$tinyblocks->addBlock(\TinyPixel\Blocks\PostContainer::class);
$tinyblocks->addBlock(\TinyPixel\Blocks\Squadd::class);
