/** @wordpress */
import { __ } from '@wordpress/i18n'
import { registerBlockType } from '@wordpress/blocks'

/** components */
import edit from './components/edit'
import save from './components/save'

registerBlockType('tinypixel/every-action', {
  title: __('Every Action', 'tiny-pixel'),
  category: 'dream-defenders',
  attributes: {
    embed: {
      type: 'string',
      selector: '.every-action-embed',
    },
  },
  supports: { align: true },
  edit,
  save: () => null,
})
