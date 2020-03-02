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
use TinyPixel\Blocks\Banner;
use TinyPixel\Blocks\Container;
use TinyPixel\Blocks\Form;
use TinyPixel\Blocks\FreedomPaper;
use TinyPixel\Blocks\GalleryCTA;
use TinyPixel\Blocks\HorizontalCard;
use TinyPixel\Blocks\PostContainer;
use TinyPixel\Blocks\ProjectContainer;
use TinyPixel\Blocks\Squadd;
use TinyPixel\Blocks\TwoColumn;
use Illuminate\Support\Collection;

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
$tinyblocks->addBlock(GalleryCTA::class);
$tinyblocks->addBlock(Form::class);

/**
 * Register project-specific assets.
 */
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_script(
        'dream-defenders-blocks/editor',
        plugins_url('/dream-defenders-blocks/dist/scripts/extensions/editor.js'),
        ['wp-blocks', 'wp-dom-ready', 'wp-edit-post', 'wp-hooks', 'wp-i18n'],
        time()
    );

    wp_enqueue_style(
        'dream-defenders-blocks/editor',
        plugins_url('/dream-defenders-blocks/dist/styles/editor.css'),
        false,
        null
    );
}, 100);

/**
 * Register post types
 */
/**
 * Standard Post Posttype
 */
add_action('init', function () {
    /**
     * Post PostType
     */
    $post = get_post_type_object('post');

    $post->template = [
        ['tinypixel/post-container'],
        ['tinypixel/container'],
    ];

    $post->template_lock = 'INSERT';
    register_post_type('post', $post);

    /**
     * Freedom Papers PostType
     */
    register_post_type('freedom-papers', [
        'capability_type' => 'post',
        'has_archive' => true,
        'show_in_rest' => true,
        'labels' => [
            'name'          => __('Freedom Papers', 'sage'),
            'menu_name'     => __('Freedom Papers', 'sage'),
            'singular_name' => __('Freedom Paper', 'sage'),
        ],
        'menu_icon' => 'dashicons-pressthis',
        'public' => true,
        'rewrite' => ['slug' => 'freedom-papers'],
        'supports' => ['title', 'thumbnail', 'editor', 'meta', 'page-attributes'],
        'template' => [['tinypixel/freedom-paper']],
        'template_lock' => 'insert',
    ]);

    /**
     * Projects PostType
     */
    register_post_type('projects', [
        'capability_type' => 'post',
        'has_archive' => true,
        'show_in_rest' => true,
        'labels' => [
            'name' => __('Projects', 'sage'),
            'menu_name' => __('Projects', 'sage'),
            'singular_name' => __('Project', 'sage'),
        ],
        'menu_icon' => 'dashicons-lightbulb',
        'public' => true,
        'rewrite' => ['slug' => 'projects'],
        'supports' => ['title', 'thumbnail', 'editor', 'meta', 'page-attributes'],
        'template' => [
            ['tinypixel/project-container'],
            ['tinypixel/container'],
        ],
        'template_lock' => 'insert',
    ]);
});

/**
 * Filter inserter categories
 */
add_filter( 'block_categories', function (
    array $categories,
    \WP_Post $post
) {
    $categories = Collection::make($categories);
    $postTypes  = Collection::make(['freedom-papers', 'projects', 'post']);

    if ( ! $postTypes->contains($post->post_type)) {
        return $categories;
    }

    return $categories->mergeRecursive([[
        'slug'  => 'dream-defenders',
        'title' => __('Dream Defenders', 'tiny-pixel'),
    ]])->toArray();
}, 10, 2);
