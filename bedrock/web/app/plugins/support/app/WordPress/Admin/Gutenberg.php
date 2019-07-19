<?php

namespace TinyPixel\Support\WordPress\Admin;

use function \add_action;
use function \add_filter;
use function \add_theme_support;
use function \get_post_type_object;

use \WP_Post_Type;
use \Illuminate\Support\Collection;
use \Roots\Acorn\Application;

class Gutenberg
{
    /**
     * Construct
     *
     * @param \Roots\Acorn\Application
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Service boot
     *
     * @param \Illuminate\Support\Collection $config
     */
    public function configureEditor(Collection $config)
    {
        $this->settings = $this->deriveSettingsFromConfig($config);
        $this->setOptions($this->settings);

        add_action('init', [$this, 'setReusableBlockOptions']);
    }

    /**
     * Collect valid inputs to gutenberg configuration file
     *
     * @param \Illuminate\Support\Collection $config
     * @return \Illuminate\Support\Collection settings
     */
    public function deriveSettingsFromConfig(Collection $config)
    {
        $settings = collect();

        $config->each(function ($setting, $item) use ($settings) {
            if ($this->isValidSetting($setting)) {
                $settings->push([$item => $setting]);
            }
        });

        return $settings;
    }

    /**
     * Ensure config value is present and not blank
     *
     * @param var optionValue
     * @return binary validity
     */
    public function isValidSetting($optionValue)
    {
        if (isset($optionValue) && !is_null($optionValue)) {
            return true;
        }
    }

    /**
     * Set options from processed settings
     *
     * @param \Illuminate\Support\Collection $settings
     */
    public function setOptions(Collection $settings)
    {
        if (isset($this->settings['disabled'])) {
            $this->disable();
        }

        if (isset($this->settings['colorPalette'])) {
            $this->setColorPalette();
        }

        if (isset($this->settings['fontSizes'])) {
            $this->setFontSizes();
        }

        if (isset($this->settings['useDefaultStyles'])) {
            $this->useDefaultStyles();
        }

        if (isset($this->settings['useDefaultStyles'])) {
            $this->useDefaultStyles();
        }

        if (isset($this->settings['supportEditorStyles'])
        && $this->settings['supportEditorStyles'] == true) {
            $this->supportEditorStyles();
        }

        if (isset($this->settings['supportDarkEditorStyles'])
        && $this->settings['supportDarkEditorStyles'] == true) {
            $this->supportDarkEditorStyles();
        }

        if (isset($this->settings['supportResponsiveEmbeds'])
        && $this->settings['supportResponsiveEmbeds'] == true) {
            $this->supportResponsiveEmbeds();
        }

        if (isset($this->settings['supportWideAlign'])) {
            $this->supportWideAlign();
        }

        if (isset($this->settings['disableCustomUserFontSizes'])) {
            $this->disableCustomFontSizes();
        }

        if (isset($this->settings['disableCustomUserColors'])) {
            $this->disableCustomColors();
        }
    }

    /**
     * Set reusable block options
     */
    public function setReusableBlockOptions()
    {
        // early exit if they aren't unlocked
        if (!isset($this->settings['unlockReusableBlocks'])
        || $this->settings['unlockReusableBlocks'] == null) {
            return;
        }

        $this->unlockPostType(\get_post_type_object('wp_block'), 'reusableBlocksType');

        if (isset($this->settings['reusableBlocksIcon'])) {
            $this->setReusableBlocksIcon($this->reusableBlocksType);
        }

        if (isset($this->settings['reusableBlocksLabels'])) {
            $this->setReusableBlocksLabels($this->reusableBlocksType);
        }

        if (isset($this->settings['reusableBlocksCapabilityType'])) {
            $this->modifyReusableBlocksCapabilityType(
                $this->reusableBlocksType,
                $settings['reusableBlocksCapabilityType']
            );
        }

        if (isset($this->settings['reusableBlocksCapabilities'])) {
            $this->modifyReusableBlocksCapabilities(
                $this->reusableBlocksType,
                $settings['reusableBlocksCapabilities']
            );
        }

        if (isset($this->settings['reusableBlocksUseGraphQL'])) {
            $this->setReusableBlocksToUseGraphQL($this->reusableBlocksType);
        }
    }

    /**
     * Set color palette
     */
    public function setColorPalette()
    {
        add_theme_support('editor-color-palette', $this->settings['colorPalette']);
    }

    /**
     * Set font sizes
     */
    public function setFontSizes()
    {
        add_theme_support('editor-font-sizes', $this->settings['fontSizes']);
    }

    /**
     * Disable custom font sizes
     */
    public function disableCustomFontSizes()
    {
        add_theme_support('disable-custom-font-sizes');
    }

    /**
     * Disable custom colors
     */
    public function disableCustomColors()
    {
        add_theme_support('disable-custom-colors');
    }

    /**
     * Support wide and full alignments
     */
    public function supportWideAlign()
    {
        add_theme_support('align-wide');
    }

    /**
     * Use default block styles
     */
    public function useDefaultStyles()
    {
        add_theme_support('wp-block-styles');
    }

    /**
     * Support editor styles
     */
    public function supportEditorStyles()
    {
        add_theme_support('editor-styles');
    }

    /**
     * Support dark editor styles
     */
    public function supportDarkEditorStyles()
    {
        add_theme_support('dark-editor-style');
    }

    /**
     * Support responsive embeds
     */
    public function supportResponsiveEmbeds()
    {
        add_theme_support('responsive-embeds');
    }

    /**
     * Force blocks to behave as a regular posttype
     */
    public function unlockPostType(WP_Post_Type $postType, string $handle)
    {
        $this->$handle = $postType;
        $this->$handle->_builtin = false;
        $this->$handle->show_in_menu = true;
    }

    /**
     * Set reusable blocks icon
     */
    public function setReusableBlocksIcon(WP_Post_Type $postType)
    {
        $postType->menu_icon = $this->settings['reusableBlocksIcon'];
    }

    /**
     * Set reusable blocks label
     */
    public function setReusableBlocksLabels(WP_Post_Type $postType)
    {
        $postType->labels = (object) array_merge(
            $this->settings['reusableBlocksLabels'],
            (array) $this->reusableBlocksType->labels
        );
    }

    /**
     * Modify capability type required to utilize reusable blocks
     *
     * @param \WP_Post_Type $postType
     * @param string $capabilityType
     */
    public function modifyReusableBlocksCapabilityType(WP_Post_Type $postType, string $capabilityType)
    {
        $postType->capability_type = $capabilityType;
    }

    /**
     * Modify capabilities required to utilize reusable blocks
     *
     * @param \WP_Post_Type $postType
     * @param string $capabilityType
     */
    public function modifyReusableBlocksCapabilities(WP_Post_Type $postType, array $capabilities)
    {
        $postType->capabilities = $capabilities;
    }

    /**
     * Enable GraphQL Support for reusable blocks
     */
    public function setReusableBlocksToUseGraphQL()
    {
        add_filter('register_post_type_args', [
            $this, 'useGraphQL',
        ], 10, 2);
    }

    /**
     * Enable GraphQL Support for reusable blocks
     */
    public function useGraphQL($args, $post_type)
    {
        if ('wp_block' === $post_type) {
            $args['show_in_graphql'] = true;
            $args['graphql_single_name'] = $this->settings->get('reusableBlocksLabels.singular_name');
            $args['graphql_plural_name'] = $this->settings->get('reusableBlocksLabels.name');
        }

        return $args;
    }

    /**
     * Disable Gutenberg entirely
     */
    public function disable()
    {
        add_filter('use_block_editor_for_post', '__return_false', 10);
        add_filter('use_block_editor_for_post_type', '__return_false', 10);
    }
}
