<?php

namespace TinyPixel\Support\WordPress\Fields;

use function \acf_add_local_field_group;

use Roots\Acorn\Application;

class Fields
{
    /**
     * Construct
     *
     * @param \Roots\Acorn\Application
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Init
     */
    public function init()
    {
        $this->builder = $this->app->makeWith('builder', $this->builder());

        $this->addFields($this->builder);
        $this->setLocation();

        add_action('acf/init', [$this, 'build']);
    }

    /**
     * Adds fields
     */
    public function addFields()
    {
        $this->fields($this->builder);
    }

    /**
     * Sets fields location
     */
    public function setLocation()
    {
        $this->builder->setLocation(...$this->location());
    }

    /**
     * Builds fields
     */
    public function build()
    {
        \acf_add_local_field_group($this->builder->build());
    }
}
