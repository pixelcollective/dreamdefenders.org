/** @wordpress */
import { __ } from '@wordpress/i18n'
import { registerBlockType } from '@wordpress/blocks'
import { InnerBlocks } from '@wordpress/block-editor'

/** components */
import edit from './components/edit'

registerBlockType(`tinypixel/container`, {
  title: __(`Container`, `tiny-pixel`),
  category: `layout`,
  attributes: {},
  edit,
  save: () => <InnerBlocks.Content />
})
