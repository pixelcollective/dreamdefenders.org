/** @wordpress */
import { __ } from '@wordpress/i18n';
import domReady from '@wordpress/dom-ready';
import { Icon } from '@wordpress/components';
import { render } from '@wordpress/element';

/** emotion */
import { injectGlobal } from 'emotion'
import css from '@emotion/css';

/** sage utilities */
import { whitelistBlocks } from './hooks/whitelist';
import { registerBlockStyles, unregisterBlockStyles } from './hooks/styles'

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

    /** third-party */
    'pdf-viewer-block/standard',

    /** core */
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
    'core/paragraph',
    'core/pullquote',
    'core/shortcode',
    'core/search',
    'core/text-columns',
    'core/quote',
    'core/table',
    'core/video',
  ]);
});

injectGlobal`
  #adminmenumain {
    width: 0 !important;
    display: none !important;
  }

  #wpcontent,
  #wpfooter {
    margin-left: 0 !important;
  }

  .editor-post-title__block {
    font-family: Roboto Condensed,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;
  }

  .auto-fold .block-editor-editor-skeleton {
    display: flex !important;
    flex-direction: column !important;
    height: auto !important;
    max-height: 100% !important;
    position: fixed !important;
    top: 48px !important;
    right: 0 !important;
    bottom: 0 !important;
    left: 0 !important;
  }

  @media (min-width: 782px) {
    .auto-fold .block-editor-editor-skeleton {
      top: 32px !important;
      left: 0 !important;
    }
  }

  @media (min-width: 782px) {
    .auto-fold .block-editor-editor-skeleton {
      left: 0 !important;
    }
  }

  @media (min-width: 961px) {
    .auto-fold .block-editor-editor-skeleton {
      left: 0 !important;
    }
  }

  @media (max-width: 782px) {
    .auto-fold .wp-responsive-open .block-editor-editor-skeleton {
      left: 0 !important;
    }
  }

  @media (max-width: 600) {
    .auto-fold .wp-responsive-open .block-editor-editor-skeleton {
      margin-left: -18px !important;
    }
  }

  .folded .block-editor-editor-skeleton {
    left: 0
  }

  @media (min-width: 782px) {
    .folded .block-editor-editor-skeleton {
      left: 0 !important;
    }
  }
`