const mx = require('laravel-mix')

/** laravel-mix plugins */
require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')

/** app build */
module.exports = mx
  .browserSync({
    proxy: 'dreamdefenders.vagrant',
    files: require('@dream-defenders/mix/purge.config')({
      production: mx.inProduction(),
    })['purgeWatch'],
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
