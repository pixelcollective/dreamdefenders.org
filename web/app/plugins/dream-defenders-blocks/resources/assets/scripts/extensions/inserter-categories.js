import { addFilter } from '@wordpress/hooks'
import { updateCategory } from '@wordpress/blocks'

import icon from './icon'

/**
 * Flatten all blocks into a single category.
 *
 * @see https://developer.wordpress.org/block-editor/developers/filters/block-filters/#managing-block-categories
 * @param string name of new category to place modified blocks in
 * @param array  categories which should not be overwritten
 */
const setupInserterCategories = ({ category }) => {
  addFilter(
    'blocks.registerBlockType',
    'sage/inserter',
    props => ({ ...props, category})
  )

  /**
   * Dream Defenders category icon
   */
  updateCategory('dream-defenders', { icon });
}

export {
  setupInserterCategories
}
