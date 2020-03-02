/** @wordpress */
import { __ } from '@wordpress/i18n';
import domReady from '@wordpress/dom-ready';

/** util */
import applyGlobalStyles from './global-styles'
import { whitelistBlocks } from './whitelist';
import { registerBlockStyles, unregisterBlockStyles } from './register-styles'
import { setupInserterCategories } from './inserter-categories'

/**
 * Editor extensions
 */
applyGlobalStyles()
setupInserterCategories({
  category: 'dream-defenders',
})

domReady(() => {
  /**
   * Unregister existing block styles.
   */
  unregisterBlockStyles([
    {
      block: 'core/button',
      styles: ['outline', 'fill'],
    },
    {
      block: 'core/image',
      styles: ['default', 'circle-mask'],
    },
    {
      block: 'core/pullquote',
      styles: ['default', 'solid-color'],
    },
    {
      block: 'core/table',
      styles: ['regular', 'stripes'],
    },
    {
      block: 'core/quote',
      styles: ['default', 'large'],
    },
  ]);

  /**
   * Register new block styles.
   */
  registerBlockStyles([
    {
      block: 'core/button',
      styles: [
        {
          name: 'solid',
          label: __('Solid', 'sage'),
        },
        {
          name: 'outline',
          label: __('Outline', 'sage'),
        },
      ],
    },
    {
      block: 'core/pullquote',
      styles: [
        {
          name: 'chonk',
          label: __('Chonk', 'sage'),
        },
      ],
    },
    {
      block: 'core/heading',
      styles: [
        {
          name: 'epic',
          label: __('Epic', 'sage'),
        },
      ],
    },
  ]);

  /**
   * Setup block whitelist.
   */
  whitelistBlocks([
    /** site-specific */
    'tinypixel/banner',
    'tinypixel/container',
    'tinypixel/freedom-paper',
    'tinypixel/horizontal-card',
    'tinypixel/post-container',
    'tinypixel/project-container',
    'tinypixel/squadd',
    'tinypixel/two-column',
    'tinypixel/gallery-cta',
    'tinypixel/dream-defenders',
    'tinypixel/form',

    /** third-party */
    'pdf-viewer-block/standard',

    /** core */
    'core/button',
    'core/cover',
    'core/embed',
    'core/file',
    'core/gallery',
    'core/group',
    'core/heading',
    'core/html',
    'core/image',
    'core/list',
    'core/paragraph',
    'core/pullquote',
    'core/reusable',
    'core/shortcode',
    'core/quote',
    'core/table',
    'core/video',
  ]);
});