/** Node */
const { resolve, join } = require('path')

/** Build dependencies */
const mx = require('laravel-mix'),
      tw = require('tailwind')
           require('@tinypixelco/laravel-mix-wp-blocks')
           require('laravel-mix-purgecss')
           require('laravel-mix-tweemotional')

/**
 * Dev url
 */
const dev = `dreamdefenders.vagrant`;

/**
 * Build config.
 */
const config = {
  devUrl: 'dreamdefenders.vagrant',
  extract: [
    `chroma-js`,
    `emotion`,
    `lodash`,
  ],
  purgecss: {
    dirs: [
      './resources/views/**/*.blade.php',
      './resources/assets/**/*.scss',
      './resources/assets/**/*.js',
    ],
    whitelist: [
      /wp-block-.?/,
      /container/,
      /blockquote/,
      /is-style-.?/,
      /align.?/,
      /text-.?/,
    ],
  },
}


mx.setPublicPath(`./dist`)
  .browserSync(dev)
  .webpackConfig({
    resolve: {
      alias: {
        '@blocks': resolve(__dirname, 'resources/assets/scripts/blocks'),
        '@extensions': resolve(__dirname, 'resources/assets/scripts/extensions'),
        '@hooks': resolve(__dirname, 'resources/assets/scripts/hooks'),
      },
    },
  })
  .options({ processCssUrls: false })


mx.sass('resources/assets/styles/public.scss', 'styles')
  .sass('resources/assets/styles/editor.scss', 'styles')
  .purgeCss({
    enabled: mx.inProduction(),
    globs: [
      './resources/**/*',
      './resources/assets/**/*',
      './resources/assets/**/*',
    ],
    extensions: ['js', 'php', 'scss'],
    whitelistPatterns: config.purgecss.whitelist,
    whitelistPatternsChildren: config.purgecss.whitelist,
  }).options({ postCss: [tw] })

/** Application scripts */
mx.blocks('resources/assets/scripts/blocks/Banner/block.js', 'scripts/banner')
  .blocks('resources/assets/scripts/blocks/Container/block.js', 'scripts/container')
  .blocks('resources/assets/scripts/blocks/FreedomPaper/block.js', 'scripts/freedom-paper')
  .blocks('resources/assets/scripts/blocks/HorizontalCard/block.js', 'scripts/horizontal-card')
  .blocks('resources/assets/scripts/blocks/TwoColumn/block.js', 'scripts/two-column')
  .blocks('resources/assets/scripts/blocks/PostContainer/block.js', 'scripts/post-container')
  .blocks('resources/assets/scripts/blocks/ProjectContainer/block.js', 'scripts/project-container')
  .blocks('resources/assets/scripts/blocks/Squadd/block.js', 'scripts/squadd')
  .blocks('resources/assets/scripts/extensions/hide-title-block.js', 'scripts/extensions')
  .tweemotional()
