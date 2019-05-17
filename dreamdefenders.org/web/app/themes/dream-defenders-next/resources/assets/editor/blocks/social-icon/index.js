import { __ } from '@wordpress/i18n'
import edit from './edit'
import block from './block.json'

export const name = block.name

export const options = {
  title: __('Social Media Icon', 'tinypixel'),
  description: __('Social media icon and link', 'tinypixel'),
  category: 'common',
  icon: 'wordpress',
  attributes: block.attributes,
  supports: {
    align: false,
    default: 'center',
  },
  edit,
  save: () => { },
}
