const mx = require('laravel-mix')
const { GenerateSW } = require('workbox-webpack-plugin');

/** laravel-mix plugins */
require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')
require('laravel-mix-tweemotional')

/** conf */
const {
  block,
  plugins,
  purgeWatch,
  purgeWhitelist,
  sage,
} = require('mix/config');
const wp = require('mix/wordpress-utils')

/** app build */
module.exports = () => mx
  .setPublicPath(sage.publicDir)
  .setResourceRoot`./web/app`
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
        outputFormat: 'php',
      }),
      new GenerateSW({
        clientsClaim: true,
        inlineWorkboxRuntime: true,
        mode: mx.inProduction() ? 'production' : 'development',
        include: [/app/],
        runtimeCaching: [{
          urlPattern: /app\/themes\/sage\/(.*)|\/app\/uploads\/(.*)|\//,
          handler: 'CacheFirst',
          options: {
            cacheName: 'pages',
            cacheableResponse: { statuses: [200] },
          },
        }],
        navigateFallback: '/offline.html',
      }),
    ],
  })
  .sourceMaps(false, 'source-map')
  .inProduction()
    && mx.version()

  /** Client scripts */
  mx.js(sage.src`scripts/app.js`, sage.work`scripts`)

  /** Editor scripts */
  mx.js(sage.src`scripts/editor.js`, sage.public`scripts/editor-theme.js`)
    .js(block`Banner`, sage.public`scripts/blocks/banner`)
    .js(block`Container`, sage.public`scripts/blocks/container`)
    .js(block`FreedomPaper`, sage.public`scripts/blocks/freedom-paper`)
    .js(block`HorizontalCard`, sage.public`scripts/blocks/horizontal-card`)
    .js(block`TwoColumn`, sage.public`scripts/blocks/two-column`)
    .js(block`PostContainer`, sage.public`scripts/blocks/post-container`)
    .js(block`ProjectContainer`, sage.public`scripts/blocks/project-container/block.js`)
    .js(block`Squadd`, sage.public`scripts/blocks/squadd/block.js`)
    .tweemotional()

  /** Application styles */
  mx.sass(sage.src`styles/app.scss`, sage.work`styles`)
    .sass(sage.src`styles/editor.scss`, sage.public`styles/editor-theme.css`)

  /** Cleanup WP */
  mx.css(plugins`pdf-viewer-block/public/css/pdf-viewer-block.css`, sage.work`scripts`)
    .combine([
       sage.work`styles/app.css`,
       sage.work`styles/public.css`,
    ], sage.public`styles/compiled.css`)
    .combine([
       sage.work`scripts/app.js`,
    ], sage.public`scripts/compiled.js`)

  /** Copy assets */
  mx.copyWatched(sage.src`images`, sage.public`images`)
    .copyWatched(sage.src`fonts`, sage.public`fonts`)
    .copyWatched(sage.src`svg`, sage.public`svg`)

  /** ✨*/
  return mx;
