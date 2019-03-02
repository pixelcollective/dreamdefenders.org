<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$page = new FieldsBuilder('page');

$page->setLocation('post_type', '==', 'page');
$page->addFields(get_field_partial('partials.builder'));

return $page;
