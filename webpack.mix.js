/** laravel-mix */
const mx = require('@dream-defenders/mix')
require('laravel-mix-copy-watched')

/**
 * Concatenate scripts & styles
 */
mx.setPublicPath('./web/app/themes/sage/dist')
  .css(
    'web/app/plugins/pdf-viewer-block/public/css/pdf-viewer-block.css',
    'web/app/themes/sage/dist/work/styles/pdf-viewer.css'
  )
  .combine([
    'web/app/themes/sage/dist/work/styles/client-theme.css',
    'web/app/themes/sage/dist/work/styles/pdf-viewer.css'
  ],'./web/app/themes/sage/dist/styles/app.css')
  .combine([
    'web/app/themes/sage/dist/work/scripts/app.js',
  ],'web/app/themes/sage/dist/scripts/app.js')

/**
 * Move final assets to distribution dir
 */
mx.copyWatched('web/app/themes/sage/dist/work/scripts/manifest.js', 'web/app/themes/sage/dist/scripts/manifest.js')
  .copyWatched('web/app/themes/sage/dist/work/scripts/vendor.js', 'web/app/themes/sage/dist/scripts/vendor.js')
  .copyWatched('web/app/themes/sage/dist/work/styles/editor-theme.css', 'web/app/themes/sage/dist/styles/editor-theme.css')