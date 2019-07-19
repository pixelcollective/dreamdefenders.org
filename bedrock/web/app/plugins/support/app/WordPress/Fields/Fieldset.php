<?php

namespace TinyPixel\Support\WordPress\Fields;

use \StoutLogic\AcfBuilder\FieldsBuilder;
use \TinyPixel\Support\WordPress\Fields\Fields;

class PluginFields extends Fields
{
    public function builder()
    {
        return [
            'name'  => 'Plugin',
            'style' => 'seamless',
            'ui'    => 1,
        ];
    }

    /**
     * Defines fields
     *
     * @param \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields(FieldsBuilder $builder)
    {
        $builder

            ->addTab('Plugin', ['placement' => 'left'])

                ->addGroup('plugin', ['label' => 'Plugin'])
                    ->addText('name', ['label' => 'Plugin name'])
                    ->addUrl('sourceCode', ['label' => 'Source'])
                    ->addText('downloadVersion', ['label' => 'Version (for download)', 'wrapper' => ['width' => 50]])
                    ->addUrl('downloadUrl', ['label' => 'Download URL', 'wrapper' => ['width' => 50]])
                    ->addTextarea('description', ['label' => 'Plugin description'])
                    ->addText('license', ['label' => 'License', 'placeholder' => 'MIT'])
                    ->addRepeater('requirements', ['label' => 'Requirements'])
                        ->addText('technology', ['label' => 'Technology'])
                        ->addText('version', ['label' => 'Requirement'])
                    ->endRepeater()
                ->endGroup();

        return $builder;
    }

    /**
     * Location
     *
     * @return array
     */
    public function location()
    {
        return ['post_type', '==', 'plugin'];
    }
}
