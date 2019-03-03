<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$wrapper = (object) [
    'ui'   => 1,
    'full' => ['width' => 100],
    'half' => ['width' => 50],
];

$form = new FieldsBuilder('form');

$form
    ->addGroup('form', ['label' => 'Form'])
        ->addRadio('form__selection', [
            'label' => 'Form',
            'required' => 1,
            'instructions' => '',
            'wrapper' => [
                'width' => 'full',
                'class' => '',
                'id' => '',
            ],
            'choices' => [],
            'layout' => 'vertical',
            'return_format' => 'value',
        ])
            ->addChoices(['form_5c7a417d81cab' => 'Email Signup'])
            ->setDefaultValue('form_5c7a417d81cab')
            ->setInstructions("Select which form you would like to include")

        ->addText('form__heading', [
            'label' => 'Heading',
            'wrapper' => $wrapper->half])
            ->setInstructions('Enter heading')

        ->addText('form__subheading', [
            'label' => 'Subheading',
            'wrapper' => $wrapper->half])
            ->setInstructions('Enter subheading')

        ->addImage('form__bg_image', [
            'label' => 'Background image for form',
            'return_value' => 'url',
            'ui' => $wrapper->ui,
            'wrapper' => $wrapper->half])
        ->setInstructions('Set form\'s background image.')
    ->endGroup();

return $form;
