/** @wordpress */
import { __ } from '@wordpress/i18n'
import {
  registerBlockType,
  registerBlockStyle,
} from '@wordpress/blocks'
import { InnerBlocks } from '@wordpress/block-editor'

/** @tinypixelco components */
import edit from './components/edit'

/**
 * @tinypixel/banner
 */
registerBlockType(`tinypixel/banner`, {
  title: __(`Banner`, `tiny-pixel`),
  category: `layout`,
  attributes: {
    media: {
      type: `object`,
    },
    title: {
      type: `string`,
    },
    focal: {
      type: `object`,
    },
    align: {
      type: 'string',
      value: 'full',
      default: 'full',
    },
    background: {
      type: 'object',
      default: {
        media: null,
        attachment: `default`,
        position: {
          x: 50,
          y: 50,
        },
        size: `cover`,
        scale: 100,
      },
    },
    containerSize: {
      type: 'object',
      default: {
        height: `500px`,
      },
    },
    classes: {
      type: 'string',
      default: 'wp-block-tinypixel-banner',
    },
    overlay: {
      type: 'object',
      default: {
        raw: '#000000',
        opacity: 8,
        rendered: 'rgba(0, 0, 0, 0.8)',
      },
    },
  },
  supports: {
    align: true,
  },
  edit,
  save: () => <InnerBlocks.Content />
})
