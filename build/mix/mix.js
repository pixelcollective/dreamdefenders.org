const [mx, tw, whitelist] = [
  require('laravel-mix'),
  require('tailwind'),
  require('mix/whitelist'),
]

require('@tinypixelco/laravel-mix-wp-blocks')
require('laravel-mix-tweemotional')
require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')

const devUrl = `http://dreamdefenders.vagrant`
const { sage, plugins, blocks, purgeWatch } = require(`mix/application-paths`)

module.exports = () => {
  mx.setPublicPath(`./web/app/themes/sage/dist`)
    .setResourceRoot(`./web/app`)
    .browserSync(devUrl)
    .sourceMaps(true, 'source-map')
    .inProduction() && mx.version()

  /** Sage client scripts */
  mx.js(sage.src(`scripts/app.js`), `scripts`)

  /** Block editor scripts */
  mx.block(sage.src(`scripts/editor.js`), `scripts`)
    .block(blocks.src(`scripts/blocks/Banner/block.js`), sage.dist(`scripts/blocks/banner`))
    .block(blocks.src(`scripts/blocks/Container/block.js`), sage.dist(`scripts/blocks/container`))
    .block(blocks.src(`scripts/blocks/FreedomPaper/block.js`), sage.dist(`scripts/blocks/freedom-paper`))
    .block(blocks.src(`scripts/blocks/HorizontalCard/block.js`), sage.dist(`scripts/blocks/horizontal-card`))
    .block(blocks.src(`scripts/blocks/TwoColumn/block.js`), sage.dist(`scripts/blocks/two-column`))
    .block(blocks.src(`scripts/blocks/PostContainer/block.js`), sage.dist(`scripts/blocks/post-container`))
    .block(blocks.src(`scripts/blocks/ProjectContainer/block.js`), sage.dist(`scripts/blocks/project-container/block.js`))
    .block(blocks.src(`scripts/blocks/Squadd/block.js`), sage.dist(`scripts/blocks/squadd/block.js`))
    .block(blocks.src(`scripts/index.js`), sage.dist(`scripts/blocks`))
    .tweemotional()

  /** Application styles */
  mx.sass(sage.src(`styles/app.scss`), `styles`)
    .sass(sage.src(`styles/editor.scss`), `styles/editor-theme.css`)
    .sass(blocks.src(`styles/public.scss`), `styles`)
    .sass(blocks.src(`styles/editor.scss`), `styles/editor.css`)
    .options({
      postCss: [tw],
      processCssUrls: false
    }).purgeCss({
      enabled: true,
      extensions: ['js', 'php', 'scss', 'css'],
      globs: purgeWatch,
      whitelistPatterns: whitelist,
      whitelistPatternsChildren: whitelist,
    })

  /** Copy assets */
  mx.copyWatched(sage.src(`images`), sage.dist(`images`))
    .copyWatched(sage.src(`fonts`), sage.dist(`fonts`))
    .copyWatched(sage.src(`svg`), sage.dist(`svg`))

  /** Combine assets */
  mx.combine([
    sage.dist(`styles/app.css`),
    sage.dist(`styles/public.css`),
    plugins(`pdf-viewer-block/public/css/pdf-viewer-block.css`),
    plugins(`wp-performant-media/dist/wp-performant-media.css`),
  ],sage.dist(`styles/compiled.css`)).combine([
    sage.dist(`scripts/app.js`),
    plugins(`wp-performant-media/dist/wp-performant-media.js`),
  ],sage.dist(`scripts/compiled.js`))

  /** ✨*/
  return mx
}
