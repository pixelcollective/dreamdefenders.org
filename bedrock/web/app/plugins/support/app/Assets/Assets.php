<?php

namespace TinyPixel\Support\Assets;

use function \wp_enqueue_script;
use function \admin_enqueue_script;
use function \enqueue_block_editor_asset;
use \Roots\Acorn\Application;

class Assets
{
    public $enqueueHooks = [
        'public' => 'wp_enqueue_scripts',
        'admin'  => 'admin_enqueue_scripts',
        'editor' => 'enqueue_block_editor_assets',
    ];

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->name = strtolower(str_replace(' ', '-', $this->app['config']->get('app.name')));
        $this->collectedHooks = collect($this->enqueueHooks);

        return $this;
    }

    /**
     * Init
     *
     * @param string $manifest
     */
    public function init(string $manifest)
    {
        $this->assets = [
            'path' => $this->app['config']->get("support.assets.manifests.{$manifest}.path"),
            'url'  => $this->app['config']->get("support.assets.manifests.{$manifest}.uri"),
        ];

        $this->collectedHooks->each(function ($hook, $name) {
            $this->{$name} = [
                'styles'  => collect(),
                'scripts' => collect(),
            ];
        });

        $this->registerActions();

        return $this;
    }

    public function registerActions()
    {
        $this->collectedHooks->each(function ($hook, $name) {
            add_action($hook, [$this, 'enqueueAll' . ucfirst($name) . 'Assets']);
        });

        return $this;
    }

    /**
     * Add admin script
     *
     * @param string $script
     */
    public function addAdminScript($script)
    {
        $this->admin['scripts']->push($script);
        return $this;
    }

    /**
     * Add admin style
     *
     * @param string $style
     */
    public function addAdminStyle($style)
    {
        $this->admin['styles']->push($style);
        return $this;
    }

    /**
     * Add public style
     *
     * @param string $script
     */
    public function addPublicStyle($style)
    {
        $this->public['styles']->push($style);
        return $this;
    }

    /**
     * Add public script
     *
     * @param string $script
     */
    public function addPublicScript($script)
    {
        $this->public['scripts']->push($script);
        return $this;
    }

    /**
     * Add editor script
     *
     * @param string $script
     */
    public function addEditorScript($script)
    {
        $this->editor['scripts']->push($script);
        return $this;
    }

    /**
     * Add admin style
     *
     * @param string $style
     */
    public function addEditorStyle($style)
    {
        $this->editor['styles']->push($style);
        return $this;
    }

    /**
     * Enqueues all Admin assets registered with class
     */
    public function enqueueAllAdminAssets()
    {
        $this->admin['scripts']->each(function ($script) {
            $this->enqueueAdminScript($script);
        });

        $this->admin['styles']->each(function ($style) {
            $this->enqueueAdminStyle($style);
        });

        return $this;
    }

    /**
     * Enqueues all public assets registered with class
     */
    public function enqueueAllPublicAssets()
    {
        $this->public['scripts']->each(function ($script) {
            $this->enqueuePublicScript($script);
        });

        $this->public['styles']->each(function ($style) {
            $this->enqueuePublicStyle($style);
        });

        return $this;
    }

    /**
     * Enqueues all WordPress editor assets registered with class
     */
    public function enqueueAllEditorAssets()
    {
        $this->editor['scripts']->each(function ($script) {
            $this->enqueueEditorScript($script);
        });

        $this->editor['styles']->each(function ($style) {
            $this->enqueueEditorStyle($style);
        });

        return $this;
    }

    /**
     * Enqueue public script
     *
     * @param string $script
     */
    public function enqueueAdminScript(string $script)
    {
        if (file_exists("{$this->assets['path']}/{$script}.js")) {
            \wp_enqueue_script(
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
     * @param string $script
     */
    public function enqueueEditorScript(string $script)
    {
        if (file_exists("{$this->assets['path']}/{$script}.js")) {
            \wp_enqueue_script(
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
     * @param string $script
     */
    public function enqueuePublicScript(string $script)
    {
        if (file_exists("{$this->assets['path']}/{$script}.js")) {
            \wp_enqueue_script(
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
     * @param string $style
     */
    public function enqueueEditorStyle(string $style)
    {
        if (file_exists("{$this->assets['path']}/{$style}.css")) {
            \wp_enqueue_style(
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
     * @param string $style
     */
    public function enqueuePublicStyle(string $style)
    {
        if (file_exists("{$this->assets['path']}/{$style}.css")) {
            \wp_enqueue_style(
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
     * @param string $style
     */
    public function enqueueAdminStyle(string $style)
    {
        if (file_exists("{$this->assets['path']}/{$style}.css")) {
            \wp_enqueue_style(
                "{$this->name}/{$style}/css",
                "{$this->assets['url']}/{$style}.css",
                [],
                'all'
            );
        }
    }

    /**
     * Returns @wordpress package dependencies
     *
     * @param string $script
     * @return array $wordPressDependencies
     */
    public function getDependencies(string $script)
    {
        $wordPressDependencies = "{$this->assets['path']}/{$script}.deps.json";

        if (file_exists($wordPressDependencies)) {
            return json_decode(
                file_get_contents($wordPressDependencies)
            );
        }

        return null;
    }
}
