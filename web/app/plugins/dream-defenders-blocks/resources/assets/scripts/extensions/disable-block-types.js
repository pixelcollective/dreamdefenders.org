import domReady from '@wordpress/dom-ready'
import { unregisterBlockType, getBlockTypes } from '@wordpress/blocks'

domReady(() => {
  getBlockTypes().forEach(blockType => {
    if (
      blockType.name.includes('core-embed') &&
      blockType.name !== 'core-embed/youtube' &&
      blockType.name !== 'core-embed/twitter' &&
      blockType.name !== 'core-embed/facebook' &&
      blockType.name !== 'core-embed/instagram'
    ) {
      unregisterBlockType(blockType.name)
    }
  })
})
