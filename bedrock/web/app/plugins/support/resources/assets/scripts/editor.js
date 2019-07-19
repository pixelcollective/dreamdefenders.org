import { registerBlockType } from '@gutenberg'
import { blocks } from '@blocks'

blocks.forEach(block =>
  registerBlockType(block.name, block.settings)
)
