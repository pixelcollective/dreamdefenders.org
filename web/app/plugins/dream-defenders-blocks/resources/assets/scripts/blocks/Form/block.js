/** @wordpress */
import { __ } from '@wordpress/i18n'
import { registerBlockType } from '@wordpress/blocks'
import { InnerBlocks } from '@wordpress/block-editor'

/** components */
import edit from './components/edit'

registerBlockType(`tinypixel/form`, {
  title: __(`Form`, `tiny-pixel`),
  category: `dream-defenders`,
  icon: `format-image`,
  attributes: {
    heading: {
      type: 'string',
    },
    text: {
      type: 'string',
    },
  },
  supports: { align: true },
  edit,
  save: () => <InnerBlocks.Content />
})
