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
const {
  theme,
  blocks,
  gutenberg,
  purgeWatch,
} = require(`mix/application-paths`)

module.exports = () => {
  mx.setPublicPath(`./web/app/themes/sage/dist`)
    .setResourceRoot(`./web/app`)
    .browserSync(devUrl)
    .webpackConfig({
      plugins: [
        new wpDeps({
          injectPolyfill: false,
        }),
      ],
    })
    .babelConfig({ presets: ['@wordpress/babel-preset-default'] })
    .options({ postCss: [tw], processCssUrls: false })
    .tweemotional()

  /** Application styles */
  mx.sass(theme.src(`styles/app.scss`), theme.dist(`styles`))
    .sass(theme.src(`styles/editor.scss`), theme.dist(`styles`))
    .sass(blocks.src(`styles/public.scss`), theme.dist(`styles`))
    .sass(blocks.src(`styles/editor.scss`), theme.dist(`styles/editor.css`))
    .postCss(gutenberg.dist(`block-library/style.css`), theme.dist(`styles/gutenberg`))
    .purgeCss({
      enabled: true,
      extensions: ['js', 'php', 'scss', 'css'],
      globs: purgeWatch,
      whitelistPatterns: whitelist,
      whitelistPatternsChildren: whitelist,
    });

  /** Application scripts */
  mx.js(theme.src(`scripts/app.js`), theme.dist(`scripts`))
    .js(theme.src(`scripts/editor.js`), theme.dist(`scripts`))
    .js(blocks.src(`scripts/blocks/Banner/block.js`), blocks.dist(`scripts/banner`))
    .js(blocks.src(`scripts/blocks/Container/block.js`), blocks.dist(`scripts/container`))
    .js(blocks.src(`scripts/blocks/FreedomPaper/block.js`), blocks.dist(`scripts/freedom-paper`))
    .js(blocks.src(`scripts/blocks/HorizontalCard/block.js`), blocks.dist(`scripts/horizontal-card`))
    .js(blocks.src(`scripts/blocks/TwoColumn/block.js`), blocks.dist(`scripts/two-column`))
    .js(blocks.src(`scripts/blocks/PostContainer/block.js`), blocks.dist(`scripts/post-container`))
    .js(blocks.src(`scripts/blocks/ProjectContainer/block.js`), blocks.dist(`scripts/project-container`))
    .js(blocks.src(`scripts/blocks/Squadd/block.js`), blocks.dist(`scripts/squadd`))
    .js(blocks.src(`scripts/extensions/hide-title-block.js`), blocks.dist(`scripts/extensions`))

  /** Copy assets */
  mx.copyWatched(theme.src(`images`), theme.dist(`images`))
    .copyWatched(theme.src(`fonts`), theme.dist(`fonts`))
    .copyWatched(theme.src(`svg`), theme.dist(`svg`))

  /** Version files */
  mx.sourceMaps(false, 'source-map').inProduction() && mx.version()

  return mx;
}
