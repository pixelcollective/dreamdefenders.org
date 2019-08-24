<?php

namespace App\PostTypes;

use Illuminate\Support\Collection;
use Roots\Acorn\Application;
use App\PostTypes\PostTypesBase;
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Fields
 */
class PostTypes extends PostTypesBase
{
    /**
     * Field wrappers.
     * @var array
     */
    public static $options = [
        'half' => ['ui' => 1, 'width' => 50],
        'group' => [
            'label'  => 'Freedom Paper',
            'ui'     => 1,
            'style'  => 'seamless',
        ],
    ];

    /**
     * Register field groups.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function fields() : FieldsBuilder
    {
        $freedomPaper = new $this->builder('Freedom Papers');

        $freedomPaper

            ->addGroup('freedom-paper', self::$options['group'])
                ->addImage('image', [
                    'label' => 'Art',
                    'preview_size' => 'full',
                    'wrapper' => self::$options['half']])

                ->addWysiwyg('content', [
                    'label' => 'Literature',
                    'wrapper' => self::$options['half']])
            ->endGroup()

            ->setLocation('post_type', '==', 'freedom-paper');

        return $freedomPaper;
    }
}
