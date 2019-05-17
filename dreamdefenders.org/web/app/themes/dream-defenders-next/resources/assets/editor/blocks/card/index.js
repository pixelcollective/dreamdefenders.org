import { __ } from '@wordpress/i18n'
import edit from './edit'

export const name = 'card'

export const attributes = {
  align: {
    type: 'string',
    default: 'center',
  },
  heading: {
    type: 'string',
  },
  copy: {
    type: 'string',
  },
  mediaID: {
    type: 'number',
  },
  mediaURL: {
    type: 'string',
  },
}

export const supports = {
  align: true,
}

export const options = {
  title: __('Card', 'sage'),
  description: __('Shake it like a polaroid picture. 📸', 'sage'),
  category: 'common',
  icon: 'wordpress',
  attributes,
  supports,
  edit,
  save: () => { return null },
}
