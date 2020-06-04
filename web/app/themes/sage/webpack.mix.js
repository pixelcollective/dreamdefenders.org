/** node */
const { resolve } = require('path')

/** laravel-mix */
const mx = require('@dream-defenders/mix')

/** helper utils */
const style  = asset => resolve(__dirname, `resources/assets/styles/${asset}`);
const script = asset => resolve(__dirname, `resources/assets/scripts/${asset}`);

/** @dream-defenders/theme conf */
mx.setPublicPath('./dist')

/** Disable purge for now */
//.purgeCss({
  const purgeFiles = [
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
  ]
  const purgeOptions = {
  whitelist: [
    'rtl',
    'home',
    'blog',
    'archive',
    'date',
    'error404',
    'logged-in',
    'admin-bar',
    'no-customize-support',
    'custom-background',
    'wp-custom-logo',
    'alignnone',
    'alignright',
    'alignleft',
    'wp-caption',
    'wp-caption-text',
    'screen-reader-text',
    'comment-list',
  ],
  whitelistPatterns: require('@dream-defenders/mix/purge.config'),
  whitelistPatternsChildren: require('@dream-defenders/mix/purge.config'),
}

/** Extract */
mx.inProduction() && mx.extract([
    'lozad',
    'intersection-observer',
    'animejs',
    'headroom.js',
    '@tinypixelco/hoverfx',
  ])

/** @dream-defenders/theme scripts */
mx.js(script`app`, 'work/scripts');

/** @dream-defenders/theme styles */
mx.sass(style`app.scss`, 'work/styles/client-theme.css')

/** @dream-defenders/theme static assets */
mx.inProduction()
  && mx.copyWatched('resources/assets/images/**', 'dist/images')
  .copyWatched('resources/assets/fonts/**', 'dist/fonts')
  .copyWatched('resources/assets/svg/**', 'dist/svg')
