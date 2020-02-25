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
  })
  .webpackConfig({
    plugins: [
      new wp.dependencyInjectionWebpackPlugin({
        injectPolyfill: false,
        outputFormat: `php`,
      }),
    ],
  })
  .sourceMaps(false, 'source-map')
  .inProduction() && mx.version()

  /** Sage client scripts */
  mx.js(sage.src(`scripts/app.js`), sage.work(`scripts`))
    .js(sage.src(`scripts/sw.js`), sage.public(`scripts`))

  /** Block editor scripts */
  mx.js(sage.src('scripts/editor.js'), sage.public('scripts/editor-theme.js'))
    .js(block('Banner'), sage.public('scripts/blocks/banner'))
    .js(block('Container'), sage.public('scripts/blocks/container'))
    .js(block('FreedomPaper'), sage.public('scripts/blocks/freedom-paper'))
    .js(block('HorizontalCard'), sage.public('scripts/blocks/horizontal-card'))
    .js(block('TwoColumn'), sage.public('scripts/blocks/two-column'))
    .js(block('PostContainer'), sage.public('scripts/blocks/post-container'))
    .js(block('ProjectContainer'), sage.public('scripts/blocks/project-container/block.js'))
    .js(block('Squadd'), sage.public('scripts/blocks/squadd/block.js'))
    .tweemotional()

  /** Application styles */
  mx.sass(sage.src(`styles/app.scss`), sage.work(`styles`))
    .sass(sage.src(`styles/editor.scss`), sage.public(`styles/editor-theme.css`))

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
