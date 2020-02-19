const [ mx, tw, whitelist, wpDeps ] = [
  require('laravel-mix'),
  require('tailwind'),
  require('mix/whitelist'),
  require('@wordpress/dependency-extraction-webpack-plugin')
]

require('laravel-mix-purgecss')
require('laravel-mix-tweemotional')
require('laravel-mix-copy-watched')

const devUrl = `http://dreamdefenders.vagrant`
const { theme, blocks, gutenberg, purgeWatch } = require(`mix/application-paths`)

module.exports = () => {
  mx.webpackConfig({
      plugins: [
        new wpDeps({
          injectPolyfill: false,
        }),
      ],
    }).babelConfig({
      presets: ['@wordpress/babel-preset-default'],
    }).options({
      postCss: [tw],
      processCssUrls: false,
    }).tweemotional()
    .setPublicPath(`./web/app/themes/sage/dist`)
    .setResourceRoot(`./web/app`)
    .browserSync(devUrl)

  mx.sass(theme.style(`app.scss`), theme.dist(`styles`))
    .sass(theme.style(`editor.scss`), theme.dist(`styles`))
    .sass(blocks.style(`public.scss`), theme.dist(`styles`))
    .sass(blocks.style(`editor.scss`), theme.dist(`styles/editor.css`))
    .postCss(gutenberg.dist(`block-library/style.css`), theme.dist(`styles/gutenberg`))
    .purgeCss({
      enabled: true,
      extensions: ['js', 'php', 'scss', 'css'],
      globs: purgeWatch,
      whitelistPatterns: whitelist,
      whitelistPatternsChildren: whitelist,
    });

  mx.js(theme.script(`app.js`), theme.dist(`scripts`))
    .js(theme.script(`editor.js`), theme.dist(`scripts`))
    .js(blocks.script(`blocks/Banner/block.js`), blocks.dist(`scripts/banner`))
    .js(blocks.script(`blocks/Container/block.js`), blocks.dist(`scripts/container`))
    .js(blocks.script(`blocks/FreedomPaper/block.js`), blocks.dist(`scripts/freedom-paper`))
    .js(blocks.script(`blocks/HorizontalCard/block.js`), blocks.dist(`scripts/horizontal-card`))
    .js(blocks.script(`blocks/TwoColumn/block.js`), blocks.dist(`scripts/two-column`))
    .js(blocks.script(`blocks/PostContainer/block.js`), blocks.dist(`scripts/post-container`))
    .js(blocks.script(`blocks/ProjectContainer/block.js`), blocks.dist(`scripts/project-container`))
    .js(blocks.script(`blocks/Squadd/block.js`), blocks.dist(`scripts/squadd`))
    .js(blocks.script(`extensions/hide-title-block.js`), blocks.dist(`scripts/extensions`))

  mx.copyWatched(theme.src(`images`), theme.dist(`images`))
    .copyWatched(theme.src(`fonts`), theme.dist(`fonts`))
    .copyWatched(theme.src(`svg`), theme.dist(`svg`))
    .combine([theme.dist(`styles/gutenberg/style.css`), theme.dist(`styles/app.css`), theme.dist(`styles/public.css`)], theme.dist(`styles/compiled.css`))

  mx.sourceMaps(false, 'source-map')
    .inProduction() && mx.version()

  return mx;
}
