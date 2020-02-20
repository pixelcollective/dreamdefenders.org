const [mx, whitelist, wpDeps, DependencyExtractionWebpackPlugin] = [
  require('laravel-mix'),
  require('mix/whitelist'),
  require('./wp-pkg-index'),
  require('@wordpress/dependency-extraction-webpack-plugin'),
]

require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')
require('laravel-mix-tweemotional')

const { sage, plugins, blocks, purgeWatch, devUrl } = require(`mix/config.js`)

/**
 * joe-cool => joeCool
 */
const camelCash = string => (
  string.replace(/-([a-z])/g, (match, letter) => letter.toUpperCase())
);

module.exports = () => {
  mx.setPublicPath(`./web/app/themes/sage/dist`)
    .setResourceRoot(`./web/app`)
    .browserSync(devUrl)
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
    }).options({
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

  mx.sourceMaps(false, 'source-map')
    .inProduction() && mx.version()

  /** Sage client scripts */
  mx.js(sage.src(`scripts/app.js`), sage.dist(`build/scripts`))

  /** Block editor scripts */
  mx.js(sage.src(`scripts/editor.js`), sage.dist(`build/scripts`))
    .js(blocks.src(`scripts/blocks/Banner/block.js`), sage.dist(`build/scripts/blocks/banner`))
    .js(blocks.src(`scripts/blocks/Container/block.js`), sage.dist(`build/scripts/blocks/container`))
    .js(blocks.src(`scripts/blocks/FreedomPaper/block.js`), sage.dist(`build/scripts/blocks/freedom-paper`))
    .js(blocks.src(`scripts/blocks/HorizontalCard/block.js`), sage.dist(`build/scripts/blocks/horizontal-card`))
    .js(blocks.src(`scripts/blocks/TwoColumn/block.js`), sage.dist(`build/scripts/blocks/two-column`))
    .js(blocks.src(`scripts/blocks/PostContainer/block.js`), sage.dist(`build/scripts/blocks/post-container`))
    .js(blocks.src(`scripts/blocks/ProjectContainer/block.js`), sage.dist(`build/scripts/blocks/project-container/block.js`))
    .js(blocks.src(`scripts/blocks/Squadd/block.js`), sage.dist(`build/scripts/blocks/squadd/block.js`))
    .tweemotional()

  /** Application styles */
  mx.sass(sage.src(`styles/app.scss`), sage.dist(`build/styles`))
    .sass(sage.src(`styles/editor.scss`), sage.dist(`build/styles/editor-theme.css`))
    .sass(blocks.src(`styles/editor.scss`), sage.dist(`build/styles/editor.css`))

  /** Copy assets */
  mx.copyWatched(sage.src(`images`), sage.dist(`images`))
    .copyWatched(sage.src(`fonts`), sage.dist(`fonts`))
    .copyWatched(sage.src(`svg`), sage.dist(`svg`))

  /** Avoid WordPress-itis */
  mx.js(plugins(`wp-performant-media/src/wp-performant-media.js`), sage.dist(`build/scripts`))
    .sass(plugins(`wp-performant-media/src/wp-performant-media.scss`), sage.dist(`build/scripts`))
    .css(plugins(`pdf-viewer-block/public/css/pdf-viewer-block.css`), sage.dist(`build/scripts`))
    .combine([
      `./web/app/themes/sage/dist/build/styles/app.css`,
      `./web/app/themes/sage/dist/build/styles/public.css`,
      `./web/app/themes/sage/dist/build/styles/wp-performant-media.css`,
    ],`./web/app/themes/sage/dist/styles/compiled.css`)
    .combine([
      `./web/app/themes/sage/dist/build/scripts/wp-performant-media.js`,
      `./web/app/themes/sage/dist/build/scripts/app.js`,
    ],`./web/app/themes/sage/dist/scripts/compiled.js`)

  mx.extract([
    'lozad',
    'intersection-observer',
    'animejs',
    'headroom.js',
    '@tinypixelco/hoverfx',
  ]).copy([
    `./web/app/themes/sage/dist/build/scripts/vendor.js`,
    `./web/app/themes/sage/dist/build/scripts/manifest.js`,
  ],`./web/app/themes/sage/dist/scripts/`)

  /** ✨*/
  return mx
}
