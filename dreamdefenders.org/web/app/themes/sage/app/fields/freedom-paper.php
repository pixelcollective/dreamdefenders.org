<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$paper = new FieldsBuilder('freedom-paper', ['label' => "Freedom Paper"]);

$paper->setLocation('post_type', '==', 'freedom-paper');
$paper->addFields(get_field_partial('components.freedompaper'), ['label' => "Freedom Paper"]);

return $paper;
