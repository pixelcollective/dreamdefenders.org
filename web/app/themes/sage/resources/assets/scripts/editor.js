/** @wordpress */
import { __ } from '@wordpress/i18n';
import domReady from '@wordpress/dom-ready';

/** sage utilities */
import {
  registerBlockStyles,
  unregisterBlockStyles,
} from './hooks/styles'
import { whitelistBlocks } from './hooks/whitelist';

/**
 * @wordpress/dom-ready event
 *
 * @see https://www.npmjs.com/package/@wordpress/dom-ready
 */
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
   * Restrict blocks to the following list.
   */
  whitelistBlocks([
    'core/audio',
    'core/button',
    'core/column',
    'core/columns',
    'core/cover',
    'core/embed',
    'core/file',
    'core/gallery',
    'core/group',
    'core/heading',
    'core/html',
    'core/image',
    'core/list',
    'core/media-text',
    'core/more',
    'core/paragraph',
    'core/preformatted',
    'core/pullquote',
    'core/shortcode',
    'core/search',
    'core/text-columns',
    'core/quote',
    'core/table',
    'core/video',
    'tinypixel/freedom-paper',
    'tinypixel/two-column',
    'tinypixel/post-container',
    'tinypixel/squadd',
  ]);
});
