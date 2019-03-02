<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$config = (object) [
    'ui' => 1,
    'wrapper' => ['width' => 30],
];

$button = new FieldsBuilder('button');

$button
    ->addGroup('button')

        ->addText('label', ['wrapper' => $config->wrapper])
            ->setInstructions('Label shown on the button.')

        ->addUrl('url', ['label' => 'URL', 'wrapper' => $config->wrapper])
            ->setInstructions('URL for the button to link to')

        ->addSelect('size', ['ui' => $config->ui, 'allow_null' => 1, 'placeholder' => 'Default', 'wrapper' => $config->wrapper])
            ->addChoices(['small' => 'Small'], ['medium' => 'Medium'], ['large' => 'Large'])
            ->setInstructions('The size of the button.')

        ->addSelect('color', ['ui' => $config->ui, 'allow_null' => 1, 'placeholder' => 'None', 'wrapper' => $config->wrapper])
            ->addChoices(['blue' => 'Blue'], ['red' => 'Red'], ['green' => 'Green'])
            ->setInstructions('The background color of the button.')

        ->addTrueFalse('rounded', ['ui' => $config->ui])
            ->setInstructions('Make the button round.')

        ->addTrueFalse('centered', ['ui' => $config->ui])
            ->setInstructions('Center the button horizontally.')

    ->endGroup();

return $button;
