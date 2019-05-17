import { registerBlockType } from '@wordpress/blocks'

const namespace = 'tinypixel';

const blocks = [
  require('./blocks/section'),
  require('./blocks/banner'),
  require('./blocks/social'),
  require('./blocks/card'),
]

for(let block of blocks) {
  registerBlockType(`${namespace}/${block.name}`, block.options)
}
