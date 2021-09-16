<?php

/**
 * Plugin name: Dream Defenders Block Editor Scripts
 * Plugin description: Blocks for Dream Defenders.
 *
 * phpcs:disable PSR2.Namespaces.UseDeclaration.MultipleDeclarations
 */

namespace TinyPixel\Blocks;

require __DIR__.'/vendor/autoload.php';

use TinyBlocks\App;
use Illuminate\Support\Collection;

/** Specify config. */
$configPath = __DIR__.'/config';

/** Initialize application. */
$tinyblocks = App::getInstance($configPath);

/* Add blocks. */
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
$tinyblocks->addBlock(OrganizeCTA::class);
$tinyblocks->addBlock(EveryAction::class);

/*
 * Register project-specific assets.
 */
add_action('admin_init', function () {
    wp_enqueue_script(
        'dream-defenders/editor',
        plugins_url('/dream-defenders-blocks/dist/scripts/extensions/editor.js'),
        ['react', 'wp-blocks', 'wp-dom-ready', 'wp-edit-post', 'wp-element', 'wp-hooks', 'wp-i18n'],
        time()
    );
}, 100);

/*
 * Standard Post Posttype
 */
add_action('init', function () {
    /*
     * Freedom Papers PostType
     */
    register_post_type('freedom-papers', [
        'capability_type' => 'post',
        'has_archive' => true,
        'show_in_rest' => true,
        'labels' => [
            'name' => __('Freedom Papers', 'sage'),
            'menu_name' => __('Freedom Papers', 'sage'),
            'singular_name' => __('Freedom Paper', 'sage'),
        ],
        'menu_icon' => 'dashicons-pressthis',
        'public' => true,
        'rewrite' => ['slug' => 'freedom-papers'],
        'template' => [['tinypixel/freedom-paper']],
        'template_lock' => 'insert',
        'supports' => ['thumbnail', 'title', 'author', 'revisions', 'editor']
    ]);

    /*
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
        'supports' => ['thumbnail', 'title', 'author', 'revisions', 'editor']
    ]);
});

/*
 * Filter inserter categories
 */
add_filter('block_categories', function (
    array $categories
) {
    $categories = Collection::make($categories);

    return $categories->mergeRecursive([[
        'slug' => 'dream-defenders',
        'title' => __('Dream Defenders', 'tiny-pixel'),
    ]])->toArray();
}, 10, 2);

/* add_filter( 'block_editor_settings_all', function ( $settings, $ctx ) {
    dd($settings);

    if (!empty($ctx->post ) ) {
        $editor_settings['maxUploadFileSize'] = 12345;
    }
    return $editor_settings;
}, 10, 2 ); */


remove_action(
    'enqueue_block_editor_assets',
    'wp_enqueue_editor_block_directory_assets'
);

remove_filter('render_block', 'wp_render_duotone_support');

add_filter( 'should_load_remote_block_patterns', '__return_false' );
