<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$freedombuilder = new FieldsBuilder('freedombuilder');

$freedombuilder
            ->addLayout(get_field_partial('components.header'))
            ->addLayout(get_field_partial('components.freedompaper'))
            ->addLayout(get_field_partial('components.form'))
            ->addLayout(get_field_partial('components.instagram'));

return $freedombuilder;