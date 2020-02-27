/** node */
const { resolve } = require('path')

/** laravel-mix */
const mx = require('@dream-defenders/mix')

/** helper utils */
const style  = asset => resolve(__dirname, `resources/assets/styles/${asset}`);
const script = asset => resolve(__dirname, `resources/assets/scripts/${asset}`);

/** @dream-defenders/theme conf */
mx.setPublicPath('./dist')
  .webpackConfig(require('@dream-defenders/mix/webpack.config')({
    production: mx.inProduction(),
  }))
  .extract([
    'lozad',
    'intersection-observer',
    'animejs',
    'headroom.js',
    '@tinypixelco/hoverfx',
  ])
  .purgeCss({
    enabled: mx.inProduction(),
    globs: [
      'resources/views/*.blade.php',
      'resources/views/**/*.blade.php',
      'resources/assets/scripts/*.js',
      'resources/assets/scripts/**/*.js',
      'resources/assets/styles/*.css',
      'resources/assets/styles/*.scss',
      'resources/assets/styles/**/*.css',
      'resources/assets/styles/**/*.scss',
      '../../plugins/dream-defenders-blocks/resources/assets/scripts/*.js',
      '../../plugins/dream-defenders-blocks/resources/assets/scripts/**/*.js',
      '../../plugins/dream-defenders-blocks/resources/assets/scripts/blocks/*.js',
      '../../plugins/dream-defenders-blocks/resources/assets/scripts/blocks/**/*.js',
      '../../plugins/dream-defenders-blocks/resources/assets/styles/*.js',
      '../../plugins/dream-defenders-blocks/resources/assets/styles/**/*.js',
      '../../plugins/dream-defenders-blocks/resources/views/*.blade.php',
      '../../plugins/dream-defenders-blocks/resources/views/**/*.blade.php',
    ],
    whitelistPatterns: require('@dream-defenders/mix/purge.config')(),
    whitelistPatternsChildren: require('@dream-defenders/mix/purge.config')(),
  })

/** @dream-defenders/theme scripts */
mx.js(script`app`, 'work/scripts');

/** @dream-defenders/theme styles */
mx.sass(style`app.scss`, 'work/styles/client-theme.css')
  .sass(style`editor.scss`, 'styles/editor.css')

/** @dream-defenders/theme static assets */
mx.copyWatched('resources/assets/images/**', 'dist/images')
  .copyWatched('resources/assets/fonts/**', 'dist/fonts')
  .copyWatched('resources/assets/svg/**', 'dist/svg')
