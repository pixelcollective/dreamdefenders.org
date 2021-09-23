import React from 'react'
import PropTypes from 'prop-types'

import {getBlockDefaultClassName} from '@wordpress/blocks'
import {InnerBlocks} from '@wordpress/block-editor'
import {SneakyBoi} from './SneakyBoi'

/**
 * @prop {boolean} attributes.enabled
 * @prop {boolean} attributes.open
 */
const save = () => {
  return <InnerBlocks.Content />
}

save.propTypes = {
  attributes: PropTypes.shape({
    enabled: PropTypes.bool,
  }),
}

export {save}
