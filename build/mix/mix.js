const [mx, whitelist] = [
  require('laravel-mix'),
  require('mix/whitelist'),
]

const DependencyExtractionWebpackPlugin = require('@wordpress/dependency-extraction-webpack-plugin');

require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')
require('laravel-mix-tweemotional')

const {
  sage,
  plugins,
  blocks,
  purgeWatch,
  devUrl,
} = require(`mix/config.js`)

const wordPressPackages = [
  "a11y","annotation","api-fetch","autop","blob","block-directory",
  "block-editor","block-library","blocks",
  "components","compose","core-data","data-controls","deprecated",
  "dom-ready","edit-post","edit-site","edit-widgets","editor","element",
  "escape-html","format-library","hooks","html-entities","i18n","i18n","icons",
  "is-shallow-equal","keyboard-shortcuts","keycodes","list-reusable-blocks","media-utils",
  "notices","nux","plugins","polyfill","primitives","priority-queue","redux-routine","rich-text",
  "server-side-render","shortcode","token-list","url","viewport","warning",
  "wordcount"
];

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
    })
    .webpackConfig({
      plugins: [
        new DependencyExtractionWebpackPlugin({
          injectPolyfill: false,
          outputFormat: `php`,
        }),
      ],
      externals: {
        'react': 'React',
        'react-dom': 'ReactDOM',
        ...wordPressPackages.map(pkg => {
          const wpImport = `@wordpress/${pkg}`
          wpWindow = `wp.${camelCash(pkg)}`

          return { [wpImport]: wpWindow }
        }),
      },
    })
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
    }).sourceMaps(false, 'source-map').inProduction() && mx.version()

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

  /** Misc. assets */
  mx.js(plugins(`wp-performant-media/src/wp-performant-media.js`), sage.dist(`build/scripts`))
    .sass(plugins(`wp-performant-media/src/wp-performant-media.scss`), sage.dist(`build/scripts`))
    .css(plugins(`pdf-viewer-block/public/css/pdf-viewer-block.css`), sage.dist(`build/scripts`))

  /** Copy and combine assets */
  mx.copyWatched(sage.src(`images`), sage.dist(`images`))
    .copyWatched(sage.src(`fonts`), sage.dist(`fonts`))
    .copyWatched(sage.src(`svg`), sage.dist(`svg`))
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
