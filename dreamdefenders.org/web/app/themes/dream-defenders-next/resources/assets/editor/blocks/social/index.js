import { __ } from '@wordpress/i18n'
import edit from './edit'

export const name = 'social'

export const attributes = {
  align: {
    type: 'string',
    default: 'full',
  },
  enabled: {
    type: 'array',
  },
}
export const supports = {
  align: ['full'],
}

export const options = {
  title: __('Social media links', 'tinypixel'),
  description: __('Social media promotional space', 'tinypixel'),
  category: 'common',
  icon: 'wordpress',
  attributes,
  supports,
  edit,
  save: () => {},
}
