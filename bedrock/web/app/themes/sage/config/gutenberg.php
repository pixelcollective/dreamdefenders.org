<?php

/*
|--------------------------------------------------------------------------
| Gutenberg
|--------------------------------------------------------------------------
|
| Modify the behavior and appearance of the WordPress Editor
|
*/

return [

    /*
    |--------------------------------------------------------------------------
    | Disable Gutenberg
    |--------------------------------------------------------------------------
    |
    | Disables all Gutenberg functionality
    |
    */

    'disabled' => false,

    /*
    |--------------------------------------------------------------------------
    | Utilize WordPress default block styles
    |--------------------------------------------------------------------------
    |
    | Core blocks include default styles. The styles are enqueued for editing
    | but are not enqueued for viewing unless the theme opts-in to the core
    | styles. Enable to utilize these default styles in your theme.
    |
    | @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#default-block-styles
    |
    */

    'defaultBlockStyles' => false,

    /*
    |--------------------------------------------------------------------------
    | Editor Color Palette
    |--------------------------------------------------------------------------
    |
    | Different blocks have the possibility of customizing colors. The block
    | editor provides a default palette, but a theme can overwrite it and provide
    | its own.
    |
    | @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
    |
    */

    'colorPalette' => [
        ['name'  => __('Rouge'), 'slug'  => 'rouge', 'color' => '#C31425'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Disable Custom Color Palettes
    |--------------------------------------------------------------------------
    |
    | This flag will make sure users are only able to choose colors from the
    | editor-color-palette the theme provided or from the editor default
    | colors if the theme did not provide one.
    |
    | @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes
    |
    */

    'disableCustomUserColors' => true,

    /*
    |--------------------------------------------------------------------------
    | Editor Font Sizes
    |--------------------------------------------------------------------------
    |
    | Block view composers provide a more convenient method for registering
    | blocks and also allow blocks to be rendered using certain Blade views.
    |
    | @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-font-sizes
    |
    */

    'fontSizes' => [
        ['name' => __('Small'), 'size' => 12, 'slug' => 'small'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Disable Custom Color Palettes
    |--------------------------------------------------------------------------
    |
    | This flag will make sure users are only able to choose font sizes from the
    | font_sizes the theme provided or from the editor default
    | font_sizes if the theme did not provide one.
    |
    | @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-font-sizes
    |
    */

    'disableCustomUserFontSizes' => true,

    /*
    |--------------------------------------------------------------------------
    | Editor Styles
    |--------------------------------------------------------------------------
    |
    | Block view composers provide a more convenient method for registering
    | blocks and also allow blocks to be rendered using certain Blade views.
    |
    | @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#editor-styles
    |
    */

    'supportEditorStyles' => true,
    'supportDarkEditorStyles' => false,

    /*
    |--------------------------------------------------------------------------
    | Block Alignments
    |--------------------------------------------------------------------------
    |
    | Some blocks such as the image block have the possibility to define a
    | “wide” or “full” alignment by adding the corresponding classname to
    | the block’s wrapper (alignwide or alignfull).
    |
    | @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment
    |
    */

    'supportWideAlign' => true,

    /*
    |--------------------------------------------------------------------------
    | Responsive Embeds
    |--------------------------------------------------------------------------
    |
    | The embed blocks automatically apply styles to embedded content to
    | reflect the aspect ratio of content that is embedded in an iFrame. To
    | make the content resize and keep its aspect ratio, the <body> element
    | needs the wp-embed-responsive class.
    |
    | @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#responsive-embedded-content
    |
    */

    'supportResponsiveEmbeds' => true,

    /*
    |--------------------------------------------------------------------------
    | Display Reusable Blocks in the Admin Menu
    |--------------------------------------------------------------------------
    |
    | By default, Reusable Blocks are a built-in posttype which is not
    | displayed in the admin menu. Setting to true will display them the same
    | as any normal WordPress posttype.
    |
    */

    'unlockReusableBlocks' => true,

    /*
    |--------------------------------------------------------------------------
    | Reusable Blocks Icon
    |--------------------------------------------------------------------------
    |
    | Specify an icon to use with the Reusable blocks. Obviously has no effect
    | if the 'reusable_blocks_unlock' config flag is not set to `true`.
    |
    */

    'reusableBlocksIcon' => 'dashicons-layout',

    /*
    |--------------------------------------------------------------------------
    | Display Reusable Blocks in the Admin Menu
    |--------------------------------------------------------------------------
    |
    | Modify the labels used for Reusable blocks.
    |
    */

    'reusableBlocksLabels' => [
        'name'                     => _x('Blocks', 'post type general name'),
        'singular_name'            => _x('Block', 'post type singular name'),
        'menu_name'                => _x('Blocks', 'admin menu'),
        'name_admin_bar'           => _x('Block', 'add new on admin bar'),
        'add_new'                  => _x('Add New', 'Block'),
        'add_new_item'             => __('Add New Block'),
        'new_item'                 => __('New Block'),
        'edit_item'                => __('Edit Block'),
        'view_item'                => __('View Block'),
        'all_items'                => __('All Blocks'),
        'search_items'             => __('Search Blocks'),
        'not_found'                => __('No blocks found.'),
        'not_found_in_trash'       => __('No blocks found in Trash.'),
        'filter_items_list'        => __('Filter blocks list'),
        'items_list_navigation'    => __('Blocks list navigation'),
        'items_list'               => __('Blocks list'),
        'item_published'           => __('Block published.'),
        'item_published_privately' => __('Block published privately.'),
        'item_reverted_to_draft'   => __('Block reverted to draft.'),
        'item_scheduled'           => __('Block scheduled.'),
        'item_updated'             => __('Block updated.'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Reusable blocks capability controls
    |--------------------------------------------------------------------------
    |
    | Modify the permissions for reusable blocks
    |
    */

    'reusableBlocksCapabilityType' => 'block',
    'reusableBlocksCapabilities' => [
        'read'         => 'read_blocks',
        'create_posts' => 'create_posts',
    ],
];
