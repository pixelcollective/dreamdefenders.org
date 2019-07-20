<?php

return [

    /*
    |----------------------------------------------------------------------
    | Admin Menu
    |----------------------------------------------------------------------
    |
    | Modify the WordPress Admin Menu
    |
    */

    'admin_menu' => [

        'enabled' => true,

        /*
        |----------------------------------------------------------------------
        | Menu Items
        |----------------------------------------------------------------------
        |
        | Disable admin menu items and/or their sub menu items.
        |
        | Parameter one options: 'display', 'hidden', 'removed'
        |   - display: default behavior
        |   - hidden:  visually non-apparent but still accessible
        |   - removed: inaccessible
        |
        | Parameter two: an array of environments that this item should be enabled on
        | Parameter three: an array of capabilities that should have access
        |
        | Each parameter is overridden by the ones preceeding it.
        |
        */

        'menu_items' => [

            /*
            |-------------------------------------------------------------------
            | Dashboard
            |-------------------------------------------------------------------
            |
            */

            'dashboard' => [
                'enabled' => ['display', [], []],
                'sub_menu_items' => [
                    'home'    => ['display', [], []],
                    'updates' => ['display', [], []],
                ],
            ],

            /*
            |-------------------------------------------------------------------
            | Posts
            |-------------------------------------------------------------------
            |
            */

            'posts' => [
                'enabled' => ['display', [], []],
                'sub_menu_items' => [
                    'all'        => ['display', [], []],
                    'new'        => ['display', [], []],
                    'categories' => ['display', [], []],
                    'tags'       => ['display', [], []],
                ],
            ],

            /*
            |-------------------------------------------------------------------
            | Media
            |-------------------------------------------------------------------
            |
            */

            'media' => [
                'enabled' => ['display', [], []],
                'sub_menu_items' => [
                    'library' => ['display', [], []],
                    'new'     => ['display', [], []],
                ],
            ],

            /*
            |-------------------------------------------------------------------
            | Pages
            |-------------------------------------------------------------------
            |
            */

            'pages' => [
                'enabled' => ['display', [], []],
                'sub_menu_items' => [
                    'all' => ['display', [], []],
                    'new' => ['display', [], []],
                ],
            ],

            /*
            |-------------------------------------------------------------------
            | Appearance
            |-------------------------------------------------------------------
            |
            */

            'appearance' => [
                'enabled' => ['display', [], []],
                'sub_menu_items' => [
                    'themes'    => ['display', [], []],
                    'customize' => ['display', [], []],
                    'widgets'   => ['display', [], []],
                    'menus'     => ['display', [], []],
                ],
            ],

            /*
            |-------------------------------------------------------------------
            | Plugins
            |-------------------------------------------------------------------
            |
            */

            'plugins' => [
                'enabled' => ['display', [], []],
                'sub_menu_items' => [
                    'installed' => ['display', [], []],
                    'add'       => ['display', [], []],
                ],
            ],

            /*
            |-------------------------------------------------------------------
            | Users
            |-------------------------------------------------------------------
            |
            */

            'users' => [
                'enabled' => ['display', [], []],
                'sub_menu_items' => [
                    'all'     => ['display', [], []],
                    'new'     => ['display', [], []],
                    'profile' => ['display', [], []],
                ],
            ],

            /*
            |-------------------------------------------------------------------
            | Tools
            |-------------------------------------------------------------------
            |
            */

            'tools' => [
                'enabled' => ['display', [], []],
                'sub_menu_items' => [
                    'available'   => ['display', [], []],
                    'import'      => ['display', [], []],
                    'export'      => ['display', [], []],
                    'site_health' => ['display', [], []],
                    'export_data' => ['display', [], []],
                    'erase_data'  => ['display', [], []],
                ],
            ],

            /*
            |-------------------------------------------------------------------
            | Settings
            |-------------------------------------------------------------------
            |
            */

            'settings' => [
                'enabled' => ['display', [], []],
                'sub_menu_items' => [
                    'general'    => ['display', [], []],
                    'writing'    => ['display', [], []],
                    'reading'    => ['display', [], []],
                    'media'      => ['display', [], []],
                    'permalinks' => ['display', [], []],
                    'privacy'    => ['display', [], []],
                ],
            ],

            /*
            |-------------------------------------------------------------------
            | Gutenberg
            |-------------------------------------------------------------------
            |
            */

            'gutenberg' => [
                'enabled' => ['display', [], []],
                'sub_menu_items' => [
                    'gutenberg'     => ['display', [], []],
                    'widgets'       => ['display', [], []],
                    'support'       => ['display', [], []],
                    'documentation' => ['display', [], []],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | WordPress Admin Bar
    |--------------------------------------------------------------------------
    |
    | Modify the WordPress administration bar
    |
    */

    'admin_bar' => [

        'enabled' => true,

        /*
        |----------------------------------------------------------------------
        | Admin Bar Items
        |----------------------------------------------------------------------
        |
        | Enable admin bar menu items
        |
        */

        'menu_items' => [
            'wp-logo'     => true,
            'site-name'   => true,
            'new-content' => true,
            'my-account'  => true,
            'updates'     => true,
            'search'      => true,
            'customize'   => true,
            'comments'    => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Options Pages
    |--------------------------------------------------------------------------
    |
    | Define additional options pages for the WordPress admin menu.
    |
    | The final parameter (view callback) should be a reference to a Blade view in your application.
    |
    | @link https://codex.wordpress.org/Function_Reference/add_options_page
    |
    */

    'options_pages' => [
        [
            'Settings',               // page title
            'Settings',               // menu title
            'manage_options',         // capability
            'plugin-settings.php',    // menu slug
            'Support::admin.options', // view callback
        ],
    ],
];
