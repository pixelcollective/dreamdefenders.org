/** @wordpress */
import { __ } from '@wordpress/i18n'
import { registerBlockType } from '@wordpress/blocks'
import { InnerBlocks } from '@wordpress/block-editor'

/** components */
import edit from './components/edit'

registerBlockType(`tinypixel/organize-cta`, {
  title: __(`Organize Call-to-action`, `tiny-pixel`),
  category: `dream-defenders`,
  icon: `format-image`,
  supports: { align: true },
  edit,
  save: () => <InnerBlocks.Content />
})
