<?php
/*
Plugin Name: Tiny Pixel Branding
Plugin URI: https://tinypixel.dev
Description: Branding for Tiny Pixel WordPress sites.
Version: 1.0
License: MIT
*/

namespace TinyPixel\Branding;

(new class {
    /**
     * Class invocation.
     *
     * @param  string plugin root dir
     * @param  string plugin root url
     * @return void
     */
    public function __invoke(string $dir, string $url) : void
    {
        $this->url = $url;
        $this->dir = $dir;
        $this->homeUrl = get_home_url();

        $this->actions();
    }

    /**
     * Run WordPress Actions and Filters
     *
     * @return void
     */
    public function actions() : void
    {
        add_action('login_enqueue_scripts', [$this, 'loginLogo']);
        add_action('admin_bar_menu', [$this, 'removeWordPressLogo'], 999);
        add_action('admin_bar_menu', [$this, 'createMenu'], 1);
        add_action('wp_before_admin_bar_render', [$this, 'menuCustomLogo']);
        add_filter('login_headerurl', [$this, 'loginLogoUrl']);
        add_filter('login_headertext', [$this, 'loginLogoHeaderText']);
        add_filter('admin_footer_text', [$this, 'adminFooter'], 11);
    }

    /**
    * Remove WordPress admin bar menu
    */
    public function removeWordPressLogo($adminBar)
    {
        $adminBar->remove_node('wp-logo');
    }

    /**
    * Replace login screen logo
    */
    public function loginLogo()
    {
        $template = file_get_contents(__DIR__ . '/assets/templates/login-logo.htm');

        echo sprintf($template, "{$this->url}/assets/images/logo-icon.svg");
    }

    /**
     * Replace login screen logo link
     *
     * @param string
     * @return string
     */
    public function loginLogoUrl(string $url) : string
    {
        return $this->homeUrl;
    }



    /**
     * Replace login logo title
     *
     * @return string
     */
    public function loginLogoHeaderText() : string
    {
        return 'Powered by Tiny Pixel';
    }


    /**
     * Create admin menu
     *
     * @uses global $wp_admin_bar
     * @return void
     */
    public function createMenu() : void
    {
        global $wp_admin_bar;

        $logo   = (object) [
            'id'   => 'tiny-pixel-logo',
            'link' => get_option('site_home'),
            'src'  => file_get_contents("{$this->dir}assets/images/logo-icon.svg"),
        ];

        $wp_admin_bar->add_node([
          'id'    => $logo->id,
          'title' => "<span class=\"ab-icon\">{$logo->src}</span>",
          'href'  => '/'
        ]);

        $wp_admin_bar->add_node([
          'parent' => $logo->id,
          'title'  => __('Home'),
          'id'     => "{$logo->src}-home",
          'href'   => $logo->link,
          'meta'   => ['target' => '_blank']
        ]);
    }

    /**
    * Replace login screen logo
    */
    public function menuCustomLogo()
    { ?>
        <style type="text/css">
            #wpadminbar #wp-admin-bar-tiny-pixel-logo > .ab-item .ab-icon {
                height: 20px;
                width: 20px;
                margin-right: 0 !important;
                padding-top: 7px !important;
            }

            #wpadminbar #wp-admin-bar-tiny-pixel-logo > .ab-item .ab-icon svg * {
                fill: currentColor;
            }
        </style>
    <?php }

    /**
    * Replace footer text
    *
    * @param  string $content
    * @return string
    */
    public function adminFooter($content)
    {
        return 'Site powered by <a href="https://tinypixel.dev">Tiny Pixel</a>';
    }
})(
    $dir = plugin_dir_path(__FILE__),
    $url = plugin_dir_url(__FILE__)
);
