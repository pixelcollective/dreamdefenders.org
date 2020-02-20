const { resolve } = require('path')
require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')

const [mx, tw, whitelist, wpDeps] = [
  require('laravel-mix'),
  require('tailwind'),
  require('mix/whitelist'),
  require('@wordpress/dependency-extraction-webpack-plugin')
]

const devUrl = `http://dreamdefenders.vagrant`
const { theme, blocks, purgeWatch } = require(`mix/application-paths`)

module.exports = () => {
  mx.setPublicPath(`./web/app/themes/sage/dist`)
    .setResourceRoot(`./web/app`)
    .browserSync(devUrl)
    .webpackConfig({
      plugins: [
        new wpDeps({ injectPolyfill: true }),
      ],
    })
    .babelConfig({
      presets: [
        '@wordpress/babel-preset-default',
        ['@emotion/babel-preset-css-prop', {
          autoLabel: true,
          labelFormat: `[local]`,
        }]
      ],
      plugins: [['emotion', {
        autoLabel: true,
        labelFormat: `[local]`,
      }]],
    })
    .options({
      postCss: [tw],
      processCssUrls: false
    })

  /** Application styles */
  mx.sass(theme.src(`styles/app.scss`), theme.dist(`styles`))
    .sass(theme.src(`styles/editor.scss`), theme.dist(`styles/editor-theme.css`))
    .sass(blocks.src(`styles/public.scss`), theme.dist(`styles`))
    .sass(blocks.src(`styles/editor.scss`), theme.dist(`styles/editor.css`))
    .purgeCss({
      enabled: true,
      extensions: ['js', 'php', 'scss', 'css'],
      globs: purgeWatch,
      whitelistPatterns: whitelist,
      whitelistPatternsChildren: whitelist,
    }).combine([
      theme.dist(`styles/app.css`),
      theme.dist(`styles/public.css`),
    ],theme.dist(`styles/compiled.css`))

  /** Application scripts */
  mx.js(theme.src(`scripts/app.js`), theme.dist(`scripts`))
    .js(theme.src(`scripts/editor.js`), theme.dist(`scripts`))

  mx.js(blocks.src(`scripts/blocks/Banner/block.js`), `scripts/blocks/banner`)
    .js(blocks.src(`scripts/blocks/Container/block.js`), `scripts/blocks/container`)
    .js(blocks.src(`scripts/blocks/FreedomPaper/block.js`), `scripts/blocks/freedom-paper`)
    .js(blocks.src(`scripts/blocks/HorizontalCard/block.js`), `scripts/blocks/horizontal-card`)
    .js(blocks.src(`scripts/blocks/TwoColumn/block.js`), `scripts/blocks/two-column`)
    .js(blocks.src(`scripts/blocks/PostContainer/block.js`), `scripts/blocks/post-container`)
    .js(blocks.src(`scripts/blocks/ProjectContainer/block.js`), `scripts/blocks/project-container`)
    .js(blocks.src(`scripts/blocks/Squadd/block.js`), `scripts/blocks/squadd`)
    .js(blocks.src(`scripts/extensions/hide-title-block.js`), `scripts/extensions/extensions`)

  /** Copy assets */
  mx.copyWatched(theme.src(`images`), theme.dist(`images`))
    .copyWatched(theme.src(`fonts`), theme.dist(`fonts`))
    .copyWatched(theme.src(`svg`), theme.dist(`svg`))

  /** Version files */
  mx.sourceMaps(false, 'source-map')
    .inProduction() && mx.version()

  /** ✨ */
  return mx
}
