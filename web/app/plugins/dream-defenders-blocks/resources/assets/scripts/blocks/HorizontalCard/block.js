/** @wordpress */
import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/editor';

/** components */
import { edit } from './components/edit';

/**
 * Icon
 */
const BlockTypeIcon = ({ fill, width, height }) => (
  <svg width={`${width ? width : 24}px`} height={`${height ? height : 24}px`} viewBox={`0 0 64 64`}>
    <g fillColor={fill ? fill : `rgba(0, 0, 0, 0.6)`}>
      <path fill={fill ? fill : `rgba(0, 0, 0, 0.6)`} d="M53,25H11c-1.105,0-2-0.895-2-2V3c0-1.105,0.895-2,2-2h42c1.105,0,2,0.895,2,2v20C55,24.105,54.105,25,53,25 z" />
      <path fill={fill ? fill : `rgba(0, 0, 0, 0.6)`} d="M53,63H11c-1.105,0-2-0.895-2-2V41c0-1.105,0.895-2,2-2h42c1.105,0,2,0.895,2,2v20 C55,62.105,54.105,63,53,63z" />
      <path d="M62,33H2c-0.553,0-1-0.448-1-1s0.447-1,1-1h60c0.553,0,1,0.448,1,1S62.553,33,62,33z" />
    </g>
  </svg>
)

/**
 * Register horizontal card.
 */
registerBlockType('tinypixel/horizontal-card', {
  title: __('Horizontal Card', 'tiny-pixel'),
  category: 'dream-defenders',
  icon: () => <BlockTypeIcon />,
  attributes: {
    media: {
      type: 'object',
    },
  },
  supports: {
    align: true,
  },
  edit,
  save: () => <InnerBlocks.Content />,
});
