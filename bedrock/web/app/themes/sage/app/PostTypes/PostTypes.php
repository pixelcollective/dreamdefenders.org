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
        'chapterGroup' => [
            'label' => 'Chapter',
            'ui'    => 1,
            'style' => 'seamless',
        ],
        'campaignGroup' => [
            'label' => 'Chapter',
            'ui'    => 1,
            'style' => 'seamless',
        ]
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

            ->addRelationship('issue-to-media', [
                'label' => 'Associated issue area',
                'instructions' => 'Select issues to associate with this media item.',
                'post_type' => 'issue',
            ])
            ->addRelationship('chapter-to-featured-media', [
                'label' => 'Associated chapters',
                'instructions' => 'Select chapters to associate with this media item.',
                'post_type' => 'chapter'
            ])
            ->setLocation('post_type', '==', 'featured-media');

        return $featuredMedia;
    }

    /**
     * Register field groups
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function chapterFields(\StoutLogic\AcfBuilder\FieldsBuilder $builder) : FieldsBuilder
    {
        $chapter = new $builder('Chapter');

        $chapter

            ->addImage('image', [
                'label' => 'Image to identify chapter.',
                'preview_size' => 'full',
                'wrapper' => self::$options['half']
            ])
            ->addEmail('email', [
                'label' => 'Chapter contact email',
            ])
            ->addWysiwyg('description', [
                'label' => 'Describe this chapter',
                'wrapper' => self::$options['half']
            ])
            ->addRelationship('posts', [
                'label' => 'Posts',
                'post_type' => 'post',
            ])
            ->addRelationship('chapter-to-campaign', [
                'label' => 'Associated campaigns',
                'instructions' => 'Select campaigns to associate with this chapter.',
                'post_type' => 'campaign',
            ])
            ->addRelationship('chapter-to-featured-media', [
                'label' => 'Associated featured media',
                'instructions' => 'Select images to associate with this chapter.',
                'post_type' => 'featured-media'
            ])

            ->setLocation('post_type', '==', 'chapter');

        return $chapter;
    }

    /**
     * Register field groups
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function campaignFields(\StoutLogic\AcfBuilder\FieldsBuilder $builder) : FieldsBuilder
    {
        $campaign = new $builder('campaign');

        $campaign

            ->addImage('image', [
                'label' => 'Image to identify campaign.',
                'preview_size' => 'full',
                'wrapper' => self::$options['half']
            ])
            ->addImage('brand-mark', [
                'label' => 'Canonical image',
                'instructions' => 'An iconic image to represent the campaign.',
                'preview_size' => 'full',
                'wrapper' => self::$options['half']
            ])
            ->addWysiwyg('description', [
                'label' => 'Describe this campaign.',
                'wrapper' => self::$options['half']
            ])
            ->addRelationship('chapter-to-campaign', [
                'label' => 'Associated chapters',
                'instructions' => 'Select chapters to associate with this campaign.',
                'post_type' => 'chapter',
            ])
            ->addRelationship('issue-to-campaign', [
                'label' => 'Associated issues',
                'instructions' => 'Select issues to associate with this issue.',
                'post_type' => 'issue',
            ])

            ->setLocation('post_type', '==', 'campaign');

        return $campaign;
    }

    /**
     * Register field groups
     *
     * @return \StoutLogic\AcfBuilder\FieldsBuilder
     */
    public function issueFields(\StoutLogic\AcfBuilder\FieldsBuilder $builder) : FieldsBuilder
    {
        $issue = new $builder('issue');

        $issue

            ->addImage('image', [
                'label' => 'Image to identify issue.',
                'preview_size' => 'full',
                'wrapper' => self::$options['half']
            ])
            ->addWysiwyg('description', [
                'label' => 'Describe this issue.',
                'wrapper' => self::$options['half']
            ])
            ->addRelationship('issue-to-campaign', [
                'label' => 'Associated campaigns',
                'instructions' => 'Select campaigns to associate with this issue.',
                'post_type' => 'campaign',
            ])
            ->addRelationship('issue-to-media', [
                'label' => 'Associated media',
                'instructions' => 'Select featured media items to associate with this issue.',
                'post_type' => 'featured-media',
            ])
            ->addRelationship('issue-to-post', [
                'label' => 'Associated posts',
                'instructions' => 'Select posts to associate with this issue.',
                'post_type' => 'post',
            ])

            ->setLocation('post_type', '==', 'issue');

        return $issue;
    }
}
