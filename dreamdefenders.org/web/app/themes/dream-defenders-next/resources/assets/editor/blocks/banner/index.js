import { __ } from '@wordpress/i18n'
import edit from './edit'

export const name = 'banner'

const attributes = {
  align: {
    type: 'string',
    default: 'full',
  },
  heading: {
    type: 'string',
  },
  subheading: {
    type: 'string',
  },
  mediaID: {
    type: 'number',
  },
  mediaURL: {
    type: 'string',
  },
}

const supports = {
  align: ['full'],
}

export const options = {
  title: __('Banner', 'sage'),
  description: __('Banner', 'sage'),
  category: 'common',
  icon: 'wordpress',
  attributes,
  supports,
  edit,
  save: () => { return null },
}
