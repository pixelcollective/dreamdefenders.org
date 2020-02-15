/** Build dependencies */
const mx = require('laravel-mix'),
      tw = require('tailwind')
           require('@tinypixelco/laravel-mix-wp-blocks')
           require('laravel-mix-purgecss')
           require('laravel-mix-tweemotional')

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
      path.join(__dirname, 'resources/**/*.php'),
      path.join(__dirname, 'resources/assets/**/*.scss'),
      path.join(__dirname, 'resources/assets/**/*.js'),
    ],
    whitelist: [
      /wp-block-.?/,
      /container/,
      /blockquote/,
      /is-style-.?/,
      /align-?/,
    ],
  },
}

/**
 * Build filepaths.
 */
const { block, ext, style, js, css } = {
  block: block => `resources/assets/scripts/blocks/${block}/block.js`,
  ext: ext => `resources/assets/scripts/extensions/${ext}.js`,
  style: style => `resources/assets/styles/${style}.scss`,
  js: file => `scripts/${file}/block.js`,
  css: file => `styles/${file}.css`,
}

/** Application scripts */
mx.block(block`Banner`, js`banner`)
  .block(block`Container`, js`container`)
  .block(block`FreedomPaper`, js`freedom-paper`)
  .block(block`HorizontalCard`, js`horizontal-card`)
  .block(block`TwoColumn`, js`two-column`)
  .block(block`PostContainer`, js`post-container`)
  .block(block`ProjectContainer`, js`project-container`)
  .block(block`Squadd`, js`squadd`)
  .block(ext`hide-title-block`, js`hide-title-block`)

/** Application styles */
mx.sass(style`public`, css`public`)
  .sass(style`editor`, css`editor`)

/** Application options */
mx.setPublicPath('dist')
  .browserSync(config.devUrl)
  .sourceMaps(mx.inProduction(), 'source-map')
  .tweemotional()
  .purgeCss({
    enabled: mx.inProduction(),
    globs: config.purgecss.dirs,
    extensions: ['js', 'php', 'scss'],
    whitelistPatterns: config.purgecss.whitelist,
    whitelistPatternsChildren: config.purgecss.whitelist,
  })
  .options({
    processCssUrls: false,
    postCss: [tw],
  })
