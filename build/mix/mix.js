const [mx, whitelist, wpDeps, DependencyExtractionWebpackPlugin] = [
  require('laravel-mix'),
  require('mix/whitelist'),
  require('./wp-pkg-index'),
  require('@wordpress/dependency-extraction-webpack-plugin'),
]

require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')
require('laravel-mix-tweemotional')

const { vendored, sage, plugins, block, purgeWatch, devUrl } = require(`mix/config.js`)

/**
 * joe-cool => joeCool
 */
const camelCash = string => (
  string.replace(/-([a-z])/g, (match, letter) => letter.toUpperCase())
);

module.exports = () => {
  /** Configure */
  mx.setPublicPath(sage.publicDir)
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
    }).purgeCss({
       enabled: true,
       extensions: ['js', 'php', 'scss', 'css'],
       globs: purgeWatch,
       whitelistPatterns: whitelist,
       whitelistPatternsChildren: whitelist,
    }).webpackConfig({
       plugins: [
         new DependencyExtractionWebpackPlugin({
           injectPolyfill: false,
           outputFormat: `php`,
         }),
       ],
       externals: {
         'react': 'React',
         'react-dom': 'ReactDOM',
         ...wpDeps.map(pkg => ({
           [`@wordpress/${pkg}`]: `wp.${camelCash(pkg)}`
         })),
       },
    }).tweemotional()

  mx.sourceMaps(false, 'source-map')
    .inProduction() && mx.version()

  /** Sage client scripts */
  mx.js(sage.src(`scripts/app.js`), sage.work(`scripts`))

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

  /** Application styles */
  mx.sass(sage.src(`styles/app.scss`), sage.work(`styles`))
    .sass(sage.src(`styles/editor.scss`), sage.work(`styles/editor-theme.css`))

  /** Avoid WordPress-itis */
  mx.js(plugins(`wp-performant-media/src/wp-performant-media.js`), sage.work(`scripts`))
    .sass(plugins(`wp-performant-media/src/wp-performant-media.scss`), sage.work(`scripts`))
    .css(plugins(`pdf-viewer-block/public/css/pdf-viewer-block.css`), sage.work(`scripts`))
    .combine([
      sage.work(`styles/app.css`),
      sage.work(`styles/public.css`),
      sage.work(`styles/wp-performant-media.css`),
    ],sage.public(`styles/compiled.css`))
    .combine([
      sage.work(`scripts/wp-performant-media.js`),
      sage.work(`scripts/app.js`),
    ],sage.public(`scripts/compiled.js`))

  /** Copy assets */
  mx.copyWatched(sage.src(`images`), sage.public(`images`))
    .copyWatched(sage.src(`fonts`), sage.public(`fonts`))
    .copyWatched(sage.src(`svg`), sage.public(`svg`))

  /** Extract vendor scripts */
  mx.extract(vendored).copy([
    sage.work(`scripts/vendor.js`),
    sage.work(`scripts/manifest.js`),
  ],sage.public(`scripts`))

  /** ✨*/
  return mx
}
