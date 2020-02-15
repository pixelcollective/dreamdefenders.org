const mx = require('laravel-mix'),
      tw = require('tailwind')
           require('laravel-mix-wp-blocks')
           require('laravel-mix-purgecss')
           require('laravel-mix-tweemotional')

/**
 * Pathing utilities.
 */
const util = {
  block: block => `resources/assets/scripts/blocks/${block}/block.js`,
  ext:   ext   => `resources/assets/scripts/extensions/${ext}.js`,
  style: style => `resources/assets/styles/${style}.scss`,
  js:    file  => `scripts/${file}/block.js`,
  css:   file  => `styles/${file}.css`,
  vendor: [
    `chroma-js`,
    `emotion`,
    `lodash`,
  ],
  postCssWhitelist: [
    /wp-block-.?/,
    /container/,
    /blockquote/,
    /is-style-.?/,
  ],
}

/**
 * Configure build.
 */
mx.setPublicPath('dist')
  .browserSync('dreamdefenders.vagrant')
  .sourceMaps(false, 'source-map')
  .tweemotional()

/**
 * Build editor scripts.
 */
mx.block(util.block`Banner`, util.js`banner`)
  .block(util.block`Container`, util.js`container`)
  .block(util.block`FreedomPaper`, util.js`freedom-paper`)
  .block(util.block`HorizontalCard`, util.js`horizontal-card`)
  .block(util.block`TwoColumn`, util.js`two-column`)
  .block(util.block`PostContainer`, util.js`post-container`)
  .block(util.block`ProjectContainer`, util.js`project-container`)
  .block(util.block`Squadd`, util.js`squadd`)
  .block(util.ext`hide-title-block`, util.js`hide-title-block`)

/**
 * Build styles.
 */
mx.sass(util.style`public`, util.css`public`)
  .sass(util.style`editor`, util.css`editor`)
  .purgeCss({
    enabled: true,
    globs: [
      path.join(__dirname, 'resources/**/*.php'),
      path.join(__dirname, 'resources/assets/**/*.scss'),
      path.join(__dirname, 'resources/assets/**/*.js'),
    ],
    extensions: ['js', 'php', 'scss'],
    whitelistPatterns: util.postCssWhitelist,
    whitelistPatternsChildren: util.postCssWhitelist,
  }).options({
    processCssUrls: false,
    postCss: [tw],
  })
