/** @wordpress */
import {__} from '@wordpress/i18n'
import {registerBlockType} from '@wordpress/blocks'

import {Edit as edit} from './containers/edit'
import {save} from './containers/save'
import {attributes} from './attributes.json'

registerBlockType('tiny-pixel/modal', {
  title: __('Modal', 'tiny-pixel'),
  description: __(
    'Display content in a modal window',
    'tiny-pixel',
  ),
  category: 'common',
  supports: {
    align: false,
    customClassName: false,
    html: false,
    inserter: true,
    multiple: false,
    reusable: true,
  },
  attributes,
  edit,
  save,
})
