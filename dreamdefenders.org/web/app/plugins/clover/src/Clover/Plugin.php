<?php

namespace Roots\Clover;

use Roots\Acorn\Application;

class Plugin
{
    protected $app;

    /**
     * Construct the plugin
     */
    public function __construct(Application $app)
    {
        $this->setContainer($app);
    }

    public function create($file, $name, $version)
    {
        $this->setPluginHelpers($file);
        $this->name = $name;
        $this->version = $version;
    }

    /**
     * A set of helpers to replace WordPress' useless plugin functions.
     */
    protected function setPluginHelpers($file)
    {
        $this->path = $file;
        $this->basename = plugin_basename($file);
        $this->directory = rtrim(plugin_dir_path($file), '/');
        $this->url = rtrim(plugin_dir_url($file), '/');
    }

    /**
     * Returns a tag prefixed with the plugin filename for usage in actions and filters.
     * @param string $tag
     * @return string
     */
    public function getTag($tag)
    {
        return basename($this->path, '.php') . "_$tag";
    }

    /**
     * Get a path relative to the base of the plugin
     * @param string $path
     * @return string
     */
    public function basePath($path)
    {
        return "{$this->directory}/" . ltrim($path, '/');
    }

    /**
     * Get a path relative to the config directory of the plugin
     * @param string $path
     * @return string
     */
    public function configPath($path = '')
    {
        return $this->basePath('config/' . ltrim($path, '/'));
    }

    /**
     * Get a path relative to the resources directory of the plugin
     * @param string $path
     * @return string
     */
    public function resourcePath($path)
    {
        return $this->basePath('resources/' . ltrim($path, '/'));
    }

    /**
     * Set the plugin’s container
     * @param \Roots\Acorn\Application $app
     * @return string
     */
    public function setContainer($app)
    {
        $this->app = $app;
    }

    /**
     * Get the plugin’s container
     * @return \Roots\Acorn\Application
     */
    public function getContainer()
    {
        return $this->app;
    }
}
