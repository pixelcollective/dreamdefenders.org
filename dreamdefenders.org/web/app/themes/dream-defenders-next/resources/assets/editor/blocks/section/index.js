import { __ } from '@wordpress/i18n'
import edit from './edit'
import save from './save'

export const name = 'section'

export const attributes = {
  align: {
    type: 'string',
    default: 'full',
  },
  heading: {
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
  align: ['full'],
}

export const options = {
  title: __('Section', 'sage'),
  description: __('Place to put yr contents', 'sage'),
  category: 'common',
  icon: 'wordpress',
  attributes,
  supports,
  edit,
  save,
}
