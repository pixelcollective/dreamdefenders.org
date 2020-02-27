/** @wordpress */
import { __ } from '@wordpress/i18n'
import { registerBlockType } from '@wordpress/blocks'
import { InnerBlocks } from '@wordpress/block-editor'

/** components */
import edit from './components/edit'

registerBlockType(`tinypixel/freedom-paper`, {
  title: __(`Freedom Paper`, `tiny-pixel`),
  category: `layout`,
  attributes: {
    media: { type: `object` },
    mediaDownload: { type: `object` },
  },
  supports: { align: true },
  edit,
  save: () => <InnerBlocks.Content />
})
