import React from 'react'
import {select} from '@wordpress/data'

const hasSelectedInnerBlock = clientId => {
  const editor = select('core/editor')
  const selected = editor.getBlockSelectionStart()
  const {innerBlocks} = editor.getBlock(clientId)

  for (let i = 0; i < innerBlocks.length; i++) {
    if (
      innerBlocks[i].clientId === selected ||
      (innerBlocks[i].innerBlocks.length &&
        hasSelectedInnerBlock(innerBlocks[i]))
    ) {
      return true
    }
  }

  return false
}

export const useHasSelectedInner = clientId => {
  return hasSelectedInnerBlock(clientId)
}
