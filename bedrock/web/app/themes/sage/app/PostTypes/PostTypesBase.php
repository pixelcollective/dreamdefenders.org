<?php

namespace App\PostTypes;

use Illuminate\Support\Collection;
use Roots\Acorn\Application;
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * PostTypes
 */
class PostTypesBase
{
    /**
     * Container instance
     * @var Roots\Acorn\Application
     */
    public static $app;

    /**
     * FieldsBuilder
     * @var StoutLogic\AcfBuilder\FieldsBuilder
     */
    public $builder;

    /**
     * Field Groups.
     * @var Collection
     */
    public $groups;

    /**
     * PostTypes
     * @var Collection
     */
    public $postTypes;

    /**
     * Constructor.
     */
    public function __construct(Application $app)
    {
        self::$app = $app;

        $this->builder = $app->make('builder');

        $this->groups  = Collection::make();
    }

    /**
     * Initializes class.
     *
     * @return void
     */
    public function init() : void
    {
        $this->hooks();

        $this->collectTypesAndFields();
    }

    /**
     * WordPress hooks.
     *
     * @return void
     */
    public function hooks() : void
    {
        /**
         * Register PostTypes with WP.
         */
        add_action('init', [$this, 'registerTypes']);

        /**
         * Register Field Groups with ACF.
         */
        add_action('acf/init', [$this, 'registerFieldGroups']);
    }

    /**
     * Collect types.
     *
     * @return void
     */
    public function collectTypesAndFields() : void
    {
        /**
         * Gather type definitions from application config.
         */
        if ($postTypes = self::$app['config']->get('posttypes')) {
            $this->postTypes = Collection::make($postTypes);
        }

        /**
         * Call userland for any field group definitions
         */
        if ($fields = $this->fields()) {
            $this->groups->push($fields);
        }
    }

    /**
     * Registers collected types.
     *
     * @return void
     */
    public function registerTypes() : void
    {
        $this->postTypes->each(function ($type) {
            register_extended_post_type(
                $type['slug'],
                $type['options'],
                $type['overrides'],
            );
        });
    }

    /**
     * Register ACF Field groups
     *
     * @return void
     */
    public function registerFieldGroups() : void
    {
        $this->groups->each(function ($group) {
            \acf_add_local_field_group($group->build());
        });
    }
}
