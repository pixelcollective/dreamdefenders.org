import {
  registerBlockStyle,
  registerStore,
} from '@gutenberg'

import store from '@components/store'

import {
  extendedStyles,
  registerPlugins,
} from '@extensions'

registerStore('project-plugin', store)

extendedStyles.forEach(style =>
  style.variants.forEach(variant =>
    registerBlockStyle(style.block, variant)
  )
)

registerPlugins()
