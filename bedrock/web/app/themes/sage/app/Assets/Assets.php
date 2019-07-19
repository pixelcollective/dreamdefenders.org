<?php

namespace App\Assets;

use \Roots\Acorn\Application;

class Assets
{
    public function __construct(Application $app)
    {
        $this->app = $app;

        $this->name = $this->app['config']->get('app.name');
        $this->manifest = $this->app['config']->get('assets.default');

        $this->assets = [
            'path' => $this->app['config']->get("assets.manifests.{$this->manifest}.path"),
            'url'  => $this->app['config']->get("assets.manifests.{$this->manifest}.uri"),
        ];

        return $this;
    }

    public function init()
    {
        $this->adminScripts = collect();
        $this->publicScripts = collect();
        $this->editorScripts = collect();

        $this->adminStyles = collect();
        $this->publicStyles = collect();
        $this->editorStyles = collect();

        $this->actions();

        return $this;
    }

    public function actions()
    {
        add_action('admin_enqueue_scripts', [
            $this, 'enqueueAllAdminAssets',
        ]);

        add_action('wp_enqueue_scripts', [
            $this, 'enqueueAllPublicAssets',
        ]);

        add_action('enqueue_block_editor_assets', [
            $this, 'enqueueAllEditorAssets',
        ]);

        return $this;
    }

    /**
     * Add admin script
     *
     * @param str $script
     */
    public function addAdminScript($script)
    {
        $this->adminScripts->push($script);
        return $this;
    }

    /**
     * Add admin style
     *
     * @param str $style
     */
    public function addAdminStyle($style)
    {
        $this->adminStyles->push($script);
        return $this;
    }

    /**
     * Add public style
     *
     * @param str $script
     */
    public function addPublicStyle($style)
    {
        $this->publicStyles->push($style);
        return $this;
    }

    /**
     * Add public script
     *
     * @param str $script
     */
    public function addPublicScript($script)
    {
        $this->publicScripts->push($script);
        return $this;
    }

    /**
     * Add editor script
     *
     * @param str $script
     */
    public function addEditorScript($script)
    {
        $this->editorScripts->push($script);
        return $this;
    }

    /**
     * Add admin style
     *
     * @param str $style
     */
    public function addEditorStyle($style)
    {
        $this->editorStyles->push($style);
        return $this;
    }

    /**
     * Enqueues all Admin assets registered with class
     */
    public function enqueueAllAdminAssets()
    {
        $this->adminScripts->each(function ($script) {
            $this->enqueueAdminScript($script);
        });

        $this->adminStyles->each(function ($style) {
            $this->enqueueAdminStyle($style);
        });

        return $this;
    }

    /**
     * Enqueues all public assets registered with class
     */
    public function enqueueAllPublicAssets()
    {
        $this->publicScripts->each(function ($script) {
            $this->enqueuePublicScript($script);
        });

        $this->publicStyles->each(function ($style) {
            $this->enqueuePublicStyle($style);
        });

        return $this;
    }

    /**
     * Enqueues all WordPress editor assets registered with class
     */
    public function enqueueAllEditorAssets()
    {
        $this->editorScripts->each(function ($script) {
            $this->enqueueEditorScript($script);
        });

        $this->editorStyles->each(function ($style) {
            $this->enqueueEditorStyle($style);
        });

        return $this;
    }

    /**
     * Enqueue public script
     *
     * @param str $script
     */
    public function enqueueAdminScript($script)
    {
        if (file_exists("{$this->assets['path']}/{$script}.js")) {
            admin_enqueue_script(
                "{$this->name}/{$script}/js",
                "{$this->assets['url']}/{$script}.js",
                $this->getDependencies($script),
                null,
                true
            );
        }
    }

    /**
     * Enqueue editor script
     *
     * @param str $script
     */
    public function enqueueEditorScript($script)
    {
        if (file_exists("{$this->assets['path']}/{$script}.js")) {
            wp_enqueue_script(
                "{$this->name}/{$script}/js",
                "{$this->assets['url']}/{$script}.js",
                $this->getDependencies($script),
                null,
                true
            );
        }
    }

    /**
     * Enqueues public script
     *
     * @param str $script
     */
    public function enqueuePublicScript($script)
    {
        if (file_exists("{$this->assets['path']}/{$script}.js")) {
            wp_enqueue_script(
                "{$this->name}/{$script}/js",
                "{$this->assets['url']}/{$script}.js",
                $this->getDependencies($script),
                null,
                true
            );
        }
    }

    /**
     * Enqueue editor style
     *
     * @param str $style
     */
    public function enqueueEditorStyle($style)
    {
        if (file_exists("{$this->assets['path']}/{$style}.css")) {
            wp_enqueue_style(
                "{$this->name}/{$style}/css",
                "{$this->assets['url']}/{$style}.css",
                [],
                'all'
            );
        }
    }

    /**
     * Enqueues public style
     *
     * @param str $style
     */
    public function enqueuePublicStyle($style)
    {
        if (file_exists("{$this->assets['path']}/{$style}.css")) {
            wp_enqueue_style(
                "{$this->name}/{$style}/css",
                "{$this->assets['url']}/{$style}.css",
                [],
                'all'
            );
        }
    }

    /**
     * Enqueues admin style
     *
     * @param str $style
     */
    public function enqueueAdminStyle($style)
    {
        if (file_exists("{$this->assets['path']}/{$style}.css")) {
            wp_enqueue_style(
                "{$this->name}/{$style}/css",
                "{$this->assets['url']}/{$style}.css",
                [],
                'all'
            );
        }
    }

    /**
     * Returns script @wordpress package dependencies
     */
    public function getDependencies($script)
    {
        $dependenciesManifest = "{$this->assets['path']}/{$script}.deps.json";

        if (file_exists($dependenciesManifest)) {
            $manifest = file_get_contents($dependenciesManifest);
            return json_decode($manifest);
        }

        return [];
    }
}
