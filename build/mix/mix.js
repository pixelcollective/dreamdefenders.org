const [ mx, whitelist, wpDeps, DependencyExtractionWebpackPlugin ] = [
  require('laravel-mix'),
  require('mix/whitelist'),
  require('mix/wp-pkg-index'),
  require('@wordpress/dependency-extraction-webpack-plugin'),
];

/** laravel-mix plugins */
require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')
require('laravel-mix-tweemotional')

/** application config and util */
const camelCash = string => (
  string.replace(/-([a-z])/g, (match, letter) => letter.toUpperCase())
)

const {
  block,
  devUrl,
  plugins,
  purgeWatch,
  sage,
  vendorScripts,
} = require(`mix/config.js`)

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
    })
    .purgeCss({
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
    }).sourceMaps(false, 'source-map')
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
  return mx
}
