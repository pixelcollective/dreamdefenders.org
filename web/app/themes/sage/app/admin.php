<?php

/**
 * Theme admin.
 *
 * @copyright https://roots.io/ Roots
 * @license   https://opensource.org/licenses/MIT MIT
 */

namespace App;

use WP_Customize_Manager;

use function Roots\asset;

/**
 * Register the `.brand` selector as the blogname.
 *
 * @param  \WP_Customize_Manager $wp_customize
 * @return void
 */
add_action('customize_register', function (WP_Customize_Manager $customize) {
    accounts($customize);
    actions($customize);

    $customize->get_setting('blogname')->transport = 'postMessage';

    $customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Social media.
 */
function accounts($customize)
{
    $customize->add_section('accounts', [
        'title'      => __('Accounts', 'sage'),
        'priority'   => 30,
    ]);
    $customize->add_panel('accounts', [
        'priority'       => 500,
        'theme_supports' => '',
        'title'          => __('Social Media', 'sage'),
        'description'    => __('Connect your site to social media platforms.', 'sage'),
    ]);

    $customize->add_setting('instagram');
    $customize->add_control(new \WP_Customize_Control($customize, 'instagram', [
        'label'      => __('Instagram handle', 'sage'),
        'section'  => 'accounts',
        'settings' => 'instagram',
        'type'     => 'text'
    ]));

    $customize->add_setting('facebook');
    $customize->add_control(new \WP_Customize_Control($customize, 'facebook', [
        'label'      => __('Facebook handle', 'sage'),
        'section'  => 'accounts',
        'settings' => 'facebook',
        'type'     => 'text'
    ]));

    $customize->add_setting('twitter');
    $customize->add_control(new \WP_Customize_Control($customize, 'twitter', [
        'label'      => __('Twitter handle', 'sage'),
        'section'  => 'accounts',
        'settings' => 'twitter',
        'type'     => 'text'
    ]));

    $customize->add_setting('email');
    $customize->add_control(new \WP_Customize_Control($customize, 'email', [
        'label'      => __('Public/press email', 'sage'),
        'section'  => 'accounts',
        'settings' => 'email',
        'type'     => 'text'
    ]));
}

/**
 * Actions
 */
function actions($customize)
{
    $customize->add_panel('actions', [
        'priority'       => 100,
        'theme_supports' => '',
        'title'          => __('Actions', 'sage'),
        'description'    => __('Set up call-to-actions.', 'sage'),
    ]);
    $customize->add_section('button_a', [
        'title'      => __('Button A', 'sage'),
        'panel' => 'actions',
        'priority'   => 30,
    ]);
    $customize->add_setting('button_a_text');
    $customize->add_control(new \WP_Customize_Control($customize, 'button_a_text', [
        'label'      => __('Text', 'sage'),
        'settings' => 'button_a_text',
        'section' => 'button_a',
        'type'     => 'text',
    ]));
    $customize->add_setting('button_a_url');
    $customize->add_control(new \WP_Customize_Control($customize, 'button_a_url', [
        'label'      => __('URL', 'sage'),
        'settings' => 'button_a_url',
        'section' => 'button_a',
        'type'     => 'url',
    ]));
    $customize->add_section('button_b', [
        'title'      => __('Button B', 'sage'),
        'panel' => 'actions',
        'priority'   => 31,
    ]);
    $customize->add_setting('button_b_text');
    $customize->add_control(new \WP_Customize_Control($customize, 'button_b_text', [
        'label'      => __('Text', 'sage'),
        'settings' => 'button_b_text',
        'section' => 'button_b',
        'type'     => 'text',
    ]));
    $customize->add_setting('button_b_url');
    $customize->add_control(new \WP_Customize_Control($customize, 'button_b_url', [
        'label'      => __('URL', 'sage'),
        'settings' => 'button_b_url',
        'section' => 'button_b',
        'type'     => 'url',
    ]));
}

/**
 * Register the customizer assets.
 *
 * @return void
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset('scripts/customizer.js')->uri(), ['customize-preview'], null, true);
});
