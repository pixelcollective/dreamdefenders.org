const [mx, whitelist] = [
  require('laravel-mix'),
  require('mix/whitelist'),
]

require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')
require('laravel-mix-tweemotional')
require('@tinypixelco/laravel-mix-wp-blocks')

const { sage, plugins, blocks, purgeWatch, devUrl } = require(`mix/config.js`)

module.exports = () => {
  mx.setPublicPath(`./web/app/themes/sage/dist`)
    .setResourceRoot(`./web/app`)
    .browserSync(devUrl)
    .options({
      hmrOptions: {
        host: devUrl,
        port: 8080,
      },
      postCss: [
        require('tailwind'),
        require('autoprefixer'),
      ],
      processCssUrls: false
    })
    .purgeCss({
      enabled: true,
      extensions: ['js', 'php', 'scss', 'css'],
      globs: purgeWatch,
      whitelistPatterns: whitelist,
      whitelistPatternsChildren: whitelist,
    })
    .sourceMaps(false, 'source-map')
    .inProduction()
       && mx.version()

  /** Sage client scripts */
  mx.js(sage.src(`scripts/app.js`), sage.dist(`build`))

  /** Block editor scripts */
  mx.block(sage.src(`scripts/editor.js`), sage.dist(`build/scripts`))
    .block(blocks.src(`scripts/blocks/Banner/block.js`), sage.dist(`build/scripts/blocks/banner`))
    .block(blocks.src(`scripts/blocks/Container/block.js`), sage.dist(`build/scripts/blocks/container`))
    .block(blocks.src(`scripts/blocks/FreedomPaper/block.js`), sage.dist(`build/scripts/blocks/freedom-paper`))
    .block(blocks.src(`scripts/blocks/HorizontalCard/block.js`), sage.dist(`build/scripts/blocks/horizontal-card`))
    .block(blocks.src(`scripts/blocks/TwoColumn/block.js`), sage.dist(`build/scripts/blocks/two-column`))
    .block(blocks.src(`scripts/blocks/PostContainer/block.js`), sage.dist(`build/scripts/blocks/post-container`))
    .block(blocks.src(`scripts/blocks/ProjectContainer/block.js`), sage.dist(`build/scripts/blocks/project-container/block.js`))
    .block(blocks.src(`scripts/blocks/Squadd/block.js`), sage.dist(`build/scripts/blocks/squadd/block.js`))
    .tweemotional()

  /** Application styles */
  mx.sass(sage.src(`styles/app.scss`), sage.dist(`build`))
    .sass(sage.src(`styles/editor.scss`), sage.dist(`build/editor-theme.css`))
    .sass(blocks.src(`styles/editor.scss`), sage.dist(`build/editor.css`))

  /** Misc. assets */
  mx.js(plugins(`wp-performant-media/src/wp-performant-media.js`), sage.dist(`build`))
    .sass(plugins(`wp-performant-media/src/wp-performant-media.scss`), sage.dist(`build`))
    .css(plugins(`pdf-viewer-block/public/css/pdf-viewer-block.css`), sage.dist(`build`))

  /** Copy assets */
  mx.copyWatched(sage.src(`images`), sage.dist(`images`))
    .copyWatched(sage.src(`fonts`), sage.dist(`fonts`))
    .copyWatched(sage.src(`svg`), sage.dist(`svg`))

  /** Combine assets */
  mx.combine([
    sage.dist(`build/app.css`),
    sage.dist(`build/public.css`),
    sage.dist(`build/wp-performant-media.css`),
  ],sage.dist(`styles/compiled.css`)).combine([
    sage.dist(`build/wp-performant-media.js`),
    sage.dist(`build/app.js`),
    sage.dist(`build/public.js`),
  ],sage.dist(`scripts/compiled.js`))

  /** ✨*/
  return mx
}
