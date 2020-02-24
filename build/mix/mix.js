const mx = require('laravel-mix')
const wp = require('mix/wordpress-utils')

const { block, plugins, purgeWatch, purgeWhitelist, sage, vendorScripts } = require('mix/config');

/** laravel-mix plugins */
require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')
require('laravel-mix-tweemotional')

module.exports = () => mx
  .setPublicPath(sage.publicDir)
  .setResourceRoot(`./web/app`)
  .browserSync({
    proxy: 'dreamdefenders.vagrant',
    files: purgeWatch,
  })
  .options({
    postCss: [
      require('tailwind'),
      require('autoprefixer'),
    ],
    processCssUrls: false
  })
  .purgeCss({
    enabled: mx.inProduction,
    extensions: ['js', 'php', 'scss', 'css'],
    globs: purgeWatch,
    whitelistPatterns: purgeWhitelist,
    whitelistPatternsChildren: purgeWhitelist,
  }).webpackConfig({
    plugins: [
      new wp.dependencyInjectionWebpackPlugin({
        injectPolyfill: false,
        outputFormat: `php`,
      }),
    ],
    externals: {
      'react': 'React',
      'react-dom': 'ReactDOM',
      ...wp.aliases(),
    },
  })
  .sourceMaps(false, 'source-map')
  .inProduction() && mx.version()

  /** Block editor scripts */
  mx.js(sage.src(`scripts/editor.js`), sage.work(`scripts`))
    .js(block(`Banner`), sage.work(`scripts/blocks/banner`))
    .js(block(`Container`), sage.work(`scripts/blocks/container`))
    .js(block(`FreedomPaper`), sage.work(`scripts/blocks/freedom-paper`))
    .js(block(`HorizontalCard`), sage.work(`scripts/blocks/horizontal-card`))
    .js(block(`TwoColumn`), sage.work(`scripts/blocks/two-column`))
    .js(block(`PostContainer`), sage.work(`scripts/blocks/post-container`))
    .js(block(`ProjectContainer`), sage.work(`scripts/blocks/project-container/block.js`))
    .js(block(`Squadd`), sage.work(`scripts/blocks/squadd/block.js`))
    .tweemotional()

  /** Sage client scripts */
  mx.js(sage.src(`scripts/app.js`), sage.work(`scripts`))
    .extract(vendorScripts).copy([
      sage.work(`scripts/vendor.js`),
      sage.work(`scripts/manifest.js`),
    ], sage.public(`scripts`))

  /** Application styles */
  mx.sass(sage.src(`styles/app.scss`), sage.work(`styles`))
    .sass(sage.src(`styles/editor.scss`), sage.work(`styles/editor-theme.css`))

  /** Avoid WordPress-itis */
  mx.css(plugins(`pdf-viewer-block/public/css/pdf-viewer-block.css`), sage.work(`scripts`))
    .combine([
      sage.work(`styles/app.css`),
      sage.work(`styles/public.css`),
    ], sage.public(`styles/compiled.css`))
    .combine([
      sage.work(`scripts/app.js`),
    ], sage.public(`scripts/compiled.js`))

  /** Copy assets */
  mx.copyWatched(sage.src(`images`), sage.public(`images`))
    .copyWatched(sage.src(`fonts`), sage.public(`fonts`))
    .copyWatched(sage.src(`svg`), sage.public(`svg`))

  /** ✨*/
  return mx;
