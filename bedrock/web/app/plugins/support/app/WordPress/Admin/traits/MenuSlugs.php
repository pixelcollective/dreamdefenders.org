<?php

namespace TinyPixel\Support\WordPress\Admin\Traits;

trait MenuSlugs
{
    public $menuSlugs = [
        'dashboard' => [
            'menuItem' => 'index.php',
            'subMenuItems' => [
                'home'    => ['index.php', 'index.php'],
                'updates' => ['index.php', 'update-core.php'],
            ],
        ],
        'posts' => [
            'menuItem' => 'edit.php',
            'subMenuItems' => [
                'all' => ['edit.php', 'edit.php'],
                'new' => ['edit.php', 'post-new.php'],
                'categories' => ['edit.php', 'edit-tags.php?taxonomy=category'],
                'tags' => ['edit.php', 'edit-tags.php?taxonomy=post_tag'],
            ],
        ],
        'media' => [
            'menuItem' => 'upload.php',
            'subMenuItems' => [
                'library' => ['upload.php', 'upload.php'],
                'new'     => ['upload.php', 'media-new.php'],
            ],
        ],
        'appearance' => [
            'menuItem' => 'themes.php',
            'subMenuItems' => [
                'themes' => ['themes.php', 'themes.php'],
                'customize' => ['themes.php', 'customize.php'],
                'widgets' => ['themes.php', 'widgets.php'],
                'menus' => ['themes.php', 'nav-menus.php'],
            ],
        ],
        'comments' => [
            'menuItem' => 'edit-comments.php',
            'subMenuItems' => [

            ],
        ],
        'pages' => [
            'menuItem' => 'edit.php?post_type=page',
            'subMenuItems' => [
                'all' => ['edit.php?post_type=page', 'edit.php?post_type=page'],
                'new' => ['edit.php?post_type=page', 'post-new.php?post_type=page'],
            ],
        ],
        'plugins' => [
            'menuItem' => 'plugins.php',
            'subMenuItems' => [
                'installed' => ['plugins.php', 'plugins.php'],
                'add'       => ['plugins.php', 'plugin-install.php'],
            ],
        ],
        'tools' => [
            'menuItem' => 'tools.php',
            'subMenuItems' => [
                'available' => ['tools.php', 'tools.php'],
                'import' => ['tools.php', 'import.php'],
                'export' => ['tools.php', 'export.php'],
                'site_health' => ['tools.php', 'site-health.php'],
                'export_data' => ['tools.php', 'tools.php?page=export_personal_data'],
                'erase_data' => ['tools.php', 'tools.php?page=remove_personal_data'],
            ],
        ],
        'users' => [
            'menuItem' => 'users.php',
            'subMenuItems' => [
                'all' => ['users.php', 'users.php'],
                'new' => ['users.php', 'user-new.php'],
                'profile' => ['users.php', 'profile.php'],
            ],
        ],
        'settings' => [
            'menuItem' => 'options-general.php',
            'subMenuItems' => [
                'general'      => ['options-general.php', 'options-general.php'],
                'writing'      => ['options-general.php', 'options-writing.php'],
                'reading'      => ['options-general.php', 'options-reading.php'],
                'media'        => ['options-general.php', 'options-media.php'],
                'permalinks'   => ['options-general.php', 'options-permalink.php'],
                'privacy'      => ['options-general.php', 'privacy.php'],
            ],
        ],
        'gutenberg'  => [
            'menuItem' => 'admin.php?page=gutenberg',
            'subMenuItems' => [
                'gutenberg'     => ['admin.php?page=gutenberg', 'admin.php?page=gutenberg'],
                'widgets'       => ['admin.php?page=gutenberg', 'admin.php?page=gutenberg-widgets'],
                'support'       => ['admin.php?page=gutenberg', 'https://wordpress.org/support/plugin/gutenberg/'],
                'documentation' => ['admin.php?page=gutenberg', 'https://developer.wordpress.org/block-editor/'],
            ],
        ],
    ];
}
