<?php

class UrlRewriter
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->cdnBaseUrl = 'https://builddreamdefenders-c91a.kxcdn.com';
        $this->baseUrl = get_home_url();

        return $this;
    }

    /**
     * Add hooks.
     */
    public function runHooks()
    {
        add_filter('plugins_url', [$this, 'rewritePlugins']);
        add_filter('script_loader_src', [$this, 'rewriteCore']);
        add_filter('style_loader_src', [$this, 'rewriteCore']);

        return true;
    }

    /**
     * Serve WP assets from CDN.
     *
     * @param $url
     *
     * @return mixed
     */
    public function rewriteCore($url)
    {
        $url = str_replace('/wp/wp-includes', $this->cdnBaseUrl.'/wp/wp-includes', $url);

        return $url;
    }

    /**
     * Serve /app/plugins assets from CDN.
     *
     * @param $url
     *
     * @return mixed
     */
    public function rewritePlugins($url)
    {
        $url = str_replace($this->baseUrl.'/app/plugins', $this->cdnBaseUrl.'/app/plugins', $url);

        return $url;
    }
}
