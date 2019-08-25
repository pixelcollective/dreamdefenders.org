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
        'ui'   => ['ui' => 1, 'style' => 'seamless'],
        'half' => ['ui' => 1, 'width' => 50],
        'freedomPaperGroup' => [
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
    public function freedomPaperFields(\StoutLogic\AcfBuilder\FieldsBuilder $builder) : FieldsBuilder
    {
        $freedomPaper = new $builder('Freedom Papers');

        $freedomPaper

            ->addGroup('freedom-paper', self::$options['freedomPaperGroup'])
                ->addImage('image', [
                    'label' => 'Art',
                    'preview_size' => 'full',
                    'wrapper' => self::$options['half']
                ])
                ->addWysiwyg('content', [
                    'label' => 'Literature',
                    'wrapper' => self::$options['half']
                ])
            ->endGroup()

            ->setLocation('post_type', '==', 'freedom-paper');

        return $freedomPaper;
    }

    /**
     * Register field groups.
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function featuredMediaItemFields(\StoutLogic\AcfBuilder\FieldsBuilder $builder) : FieldsBuilder
    {
        $featuredMedia = new $builder('Featured Media');

        $featuredMedia

            ->addImage('image', [
                'label' => 'Image',
                'preview_size' => 'full',
                'wrapper' => self::$options['ui']])
                ->setInstructions('Select or upload an image for usage throughout the site in varying contexts.')

            ->setLocation('post_type', '==', 'featured-media');

        return $featuredMedia;
    }
}
