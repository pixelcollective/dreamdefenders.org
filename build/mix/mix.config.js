const mx = require('laravel-mix')

/** laravel-mix plugins */
require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')

/** config */
const purgeWatchList = require('@dream-defenders/mix/purge.config')({
  production: mx.inProduction(),
})['purgeWatch'];

/** app build */
mx
  .browserSync({
    proxy: 'dreamdefenders.vagrant',
    files: purgeWatchList,
  })
  .options({
    clearConsole: false,
    postCss: [
      require('@dream-defenders/tailwind')
    ],
    processCssUrls: false,
    syntax: 'postcss-scss',
    terser: {
      extractComments: false,
    },
  })
  .sourceMaps(false, 'source-map')
  .inProduction() && mx.version()

/** mix export */
module.exports = mx
