const mix = require('laravel-mix')
const whitelist = require('./purge.config')

/** laravel-mix plugins */
require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')

/** app build */
mix
  .browserSync({
    proxy: 'http://dreamdefenders.vagrant',
    files: [
      './../../web/app/themes/sage/resources/views/*',
      './../../web/app/themes/sage/resources/views/**/*',
      './../../web/app/themes/sage/resources/assets/**/*',
      './../../web/app/themes/sage/app/View/**/*',
      './../../web/app/plugins/dream-defenders-blocks/resources/assets/**/*',
      './../../web/app/plugins/dream-defenders-blocks/resources/views/**/*'
    ],
  })
  .options({
    clearConsole: false,
    postCss: [
      require('autoprefixer'),
      require('@dream-defenders/tailwind'),
    ],
    processCssUrls: false,
    syntax: 'postcss-scss',
    terser: {
      extractComments: false,
    },
  })
  .sourceMaps(false, 'source-map')

mix.inProduction() && mix.version()

/** mix export */
module.exports = mix
