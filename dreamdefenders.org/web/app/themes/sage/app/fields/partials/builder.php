<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('builder');

$builder
    ->addTab('builder', ['placement' => 'left'])
        ->addFlexibleContent('components', ['button_label' => 'Add Component'])
            ->addLayout(get_field_partial('components.header'))
            ->addLayout(get_field_partial('components.content'))
            ->setRequired()
            ->addLayout(get_field_partial('components.form'))
            ->addLayout(get_field_partial('components.instagram'));

return $builder;
