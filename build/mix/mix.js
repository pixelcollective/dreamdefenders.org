const [ mx, tw, whitelist ] = [
  require('laravel-mix'),
  require('tailwind'),
  require('mix/whitelist')
]

require('laravel-mix-purgecss')
require('laravel-mix-wp-blocks')
require('laravel-mix-tweemotional')
require('laravel-mix-copy-watched')

const devUrl = `http://dreamdefenders.vagrant`
const { theme, blocks, gutenberg, purgeWatch } = require(`mix/application-paths`)

module.exports = () => {
  mx.setPublicPath(`./web/app`)
    .setResourceRoot(`./web/app`)
    .browserSync(devUrl)
    .options({
      postCss: [tw],
      processCssUrls: false,
    })

  mx.sass(theme.style(`app.scss`), theme.dist(`styles/app.css`))
    .sass(theme.style(`editor.scss`), theme.dist(`styles.editor.css`))
    .sass(blocks.style(`public.scss`), blocks.dist(`styles/public.css`))
    .sass(blocks.style(`editor.scss`), blocks.dist(`styles/editor.css`))
    .purgeCss({
      enabled: true,
      extensions: ['js', 'php', 'scss', 'css'],
      globs: purgeWatch,
      whitelistPatterns: whitelist,
      whitelistPatternsChildren: whitelist,
    })
    .options({ postCss: [tw] })

  mx.js(theme.script(`app.js`), theme.dist(`scripts`))
    .js(theme.script(`customizer.js`), theme.dist(`scripts`))
    .version()

  mx.blocks(theme.script(`editor.js`), theme.dist(`scripts`))
    .blocks(blocks.script(`blocks/Banner/block.js`), blocks.dist(`scripts/banner`))
    .blocks(blocks.script(`blocks/Container/block.js`), blocks.dist(`scripts/container`))
    .blocks(blocks.script(`blocks/FreedomPaper/block.js`), blocks.dist(`scripts/freedom-paper`))
    .blocks(blocks.script(`blocks/HorizontalCard/block.js`), blocks.dist(`scripts/horizontal-card`))
    .blocks(blocks.script(`blocks/TwoColumn/block.js`), blocks.dist(`scripts/two-column`))
    .blocks(blocks.script(`blocks/PostContainer/block.js`), blocks.dist(`scripts/post-container`))
    .blocks(blocks.script(`blocks/ProjectContainer/block.js`), blocks.dist(`scripts/project-container`))
    .blocks(blocks.script(`blocks/Squadd/block.js`), blocks.dist(`scripts/squadd`))
    .blocks(blocks.script(`extensions/hide-title-block.js`), blocks.dist(`scripts/extensions`))
    .tweemotional().version()

  mx.copyWatched(theme.src(`images`), theme.dist(`images`))
    .copyWatched(theme.src(`fonts`), theme.dist(`fonts`))
    .copyWatched(theme.src(`svg`), theme.dist(`svg`))
    .combine([
      gutenberg.dist(`block-library/style.css`),
      theme.dist(`styles/app.css`),
      blocks.dist(`styles/public.css`),
    ], theme.dist(`styles/compiled.css`)).version()

  return mx;
}

