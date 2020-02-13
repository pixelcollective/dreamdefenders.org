/** @wordpress */
import { __ } from '@wordpress/i18n'
import { registerBlockType } from '@wordpress/blocks'
import { InnerBlocks } from '@wordpress/block-editor'
import domReady from '@wordpress/dom-ready'
import { injectGlobal } from 'emotion'

/** components */
import edit from './components/edit'

registerBlockType(`tinypixel/project-container`, {
  title: __(`Project container`, `tiny-pixel`),
  category: `layout`,
  attributes: {
    title: { type: `string` },
    media: { type: `object` },
  },
  supports: { align: true },
  edit,
  save: () => <InnerBlocks.Content />
})

domReady(() => injectGlobal`
  .editor-post-title {
    display: none;
  }
`)
