<?php

/**
 * Plugin name: Dream Defenders Block Editor Scripts
 * Plugin description: Blocks for Dream Defenders
 *
 * phpcs:disable PSR2.Namespaces.UseDeclaration.MultipleDeclarations
 */

namespace TinyPixel\Blocks;

require __DIR__ . '/vendor/autoload.php';

use TinyBlocks\App;
use TinyPixel\Blocks\{
    Banner,
    Container,
    FreedomPaper,
    HorizontalCard,
    PostContainer,
    ProjectContainer,
    Squadd,
    TwoColumn,
};

/** Specify config. */
$configPath = __DIR__ . '/config';

/** Initialize application. */
$tinyblocks = App::getInstance($configPath);

/** Add blocks. */
$tinyblocks->addBlock(Banner::class);
$tinyblocks->addBlock(Container::class);
$tinyblocks->addBlock(FreedomPaper::class);
$tinyblocks->addBlock(HorizontalCard::class);
$tinyblocks->addBlock(PostContainer::class);
$tinyblocks->addBlock(ProjectContainer::class);
$tinyblocks->addBlock(Squadd::class);
$tinyblocks->addBlock(TwoColumn::class);
