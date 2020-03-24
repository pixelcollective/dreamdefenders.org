/** laravel-mix */
const mx = require('@dream-defenders/mix')
require('@tinypixelco/laravel-mix-wp-blocks')
require('laravel-mix-tweemotional')

/** @dream-defenders/blocks webpack config */
mx.setPublicPath('./dist')
  .tweemotional()

/** @dream-defenders/blocks scripts */
mx.block('resources/assets/scripts/extensions/editor.js', 'scripts/extensions')
  .block('resources/assets/scripts/blocks/Banner/block.js', 'scripts/blocks/banner')
  .block('resources/assets/scripts/blocks/Container/block.js', 'scripts/blocks/container')
  .block('resources/assets/scripts/blocks/FreedomPaper/block.js', 'scripts/blocks/freedom-paper')
  .block('resources/assets/scripts/blocks/HorizontalCard/block.js', 'scripts/blocks/horizontal-card')
  .block('resources/assets/scripts/blocks/TwoColumn/block.js', 'scripts/blocks/two-column')
  .block('resources/assets/scripts/blocks/PostContainer/block.js', 'scripts/blocks/post-container')
  .block('resources/assets/scripts/blocks/ProjectContainer/block.js', 'scripts/blocks/project-container')
  .block('resources/assets/scripts/blocks/Squadd/block.js', 'scripts/blocks/squadd')
  .block('resources/assets/scripts/blocks/GalleryCTA/block.js', 'scripts/blocks/gallery-cta')
  .block('resources/assets/scripts/blocks/Form/block.js', 'scripts/blocks/form')
  .block('resources/assets/scripts/blocks/OrganizeCTA/block.js', 'scripts/blocks/organize-cta')
mx.sass('resources/assets/styles/editor.scss', 'styles/editor.css')
