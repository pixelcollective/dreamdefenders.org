<?php

/**
 * Plugin name: Dream Defenders Block Editor Scripts
 * Plugin description: Blocks for Dream Defenders
 */

namespace TinyPixel\Blocks;

require __DIR__ . '/vendor/tiny-pixel/blocks/vendor/autoload.php';
require __DIR__ . '/vendor/autoload.php';

$tinyblocks = \TinyBlocks\App::getInstance(__DIR__ . '/config');
$tinyblocks->initialize();

$tinyblocks->addBlock(\TinyPixel\Blocks\TwoColumn::class);