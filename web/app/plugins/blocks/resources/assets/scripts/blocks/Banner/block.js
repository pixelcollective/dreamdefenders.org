/** @wordpress */
import { __ } from '@wordpress/i18n'
import { registerBlockType } from '@wordpress/blocks'
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
    backgroundStyle: {
      type: 'string',
      default: 'cover',
    },
    containerSize: {
      type: 'object',
      default: {
        height: `500px`,
      },
    },
  },
  supports: {
    align: true,
  },
  edit,
  save: () => <InnerBlocks.Content />
})
