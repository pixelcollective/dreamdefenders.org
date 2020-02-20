const [mx, whitelist] = [
  require('laravel-mix'),
  require('mix/whitelist'),
]

require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')
require('laravel-mix-tweemotional')
require('@tinypixelco/laravel-mix-wp-blocks')
const DependencyExtractionWebpackPlugin = require('@wordpress/dependency-extraction-webpack-plugin')

const {
  sage,
  plugins,
  blocks,
  purgeWatch,
  devUrl,
} = require(`mix/config.js`)

module.exports = () => {
  mx.setPublicPath(`./web/app/themes/sage/dist`)
    .setResourceRoot(`./web/app`)
    .browserSync(devUrl)
    .webpackConfig({
      plugins: [
        new DependencyExtractionWebpackPlugin({ injectPolyfill: true }),
      ],
      externals: {
        '@babel/runtime/regenerator': 'wp-polyfill',
        'jquery': 'jQuery',
        'react': 'React',
        'react-dom': 'ReactDOM',
        '@wordpress/a11y': 'wp.a11y',
        '@wordpress/annotations': 'wp.annotations',
        '@wordpress/api-fetch': 'wp.apiFetch',
        '@wordpress/autop': 'wp.autop',
        '@wordpress/blob': 'wp.blob',
        '@wordpress/block-directory': 'wp.blockDirectory',
        '@wordpress/block-editor': 'wp.blockEditor',
        '@wordpress/block-library': 'wp.blockLibrary',
        '@wordpress/block-serialization-default-parser': 'wp.blockSerializationDefaultParser',
        '@wordpress/block-serialization-spec-parser': 'wp.blockSerializationSpecParser',
        '@wordpress/blocks': 'wp.blocks',
        '@wordpress/components': 'wp.components',
        '@wordpress/compose': 'wp.compose',
        '@wordpress/core-data': 'wp.coreData',
        '@wordpress/data': 'wp.data',
        '@wordpress/data-controls': 'wp.dataControls',
        '@wordpress/date': 'wp.date',
        '@wordpress/deprecated': 'wp.deprecated',
        '@wordpress/dom': 'wp.dom',
        '@wordpress/dom-ready': 'wp.domReady',
        '@wordpress/edit-post': 'wp.editPost',
        '@wordpress/edit-site': 'wp.editSite',
        '@wordpress/edit-widgets': 'wp.editWidgets',
        '@wordpress/editor': 'wp.editor',
        '@wordpress/element': 'wp.element',
        '@wordpress/escape-html': 'wp.escapeHtml',
        '@wordpress/format-library': 'wp.formatLibrary',
        '@wordpress/hooks': 'wp.hooks',
        '@wordpress/html-entities': 'wp.htmlEntities',
        '@wordpress/i18n': 'wp.i18n',
        '@wordpress/icons': 'wp.icons',
        '@wordpress/is-shallow-equal': 'wp.isShallowEqual',
        '@wordpress/keyboard-shortcuts': 'wp.keyboardShortcuts',
        '@wordpress/keycodes': 'wp.keycodes',
        '@wordpress/list-reusable-blocks': 'wp.listReusableBlocks',
        '@wordpress/media-utils': 'wp.mediaUtils',
        '@wordpress/notices': 'wp.notices',
        '@wordpress/nux': 'wp.nux',
        '@wordpress/plugins': 'wp.plugins',
        '@wordpress/primitives': 'wp.primitives',
        '@wordpress/priority-queue': 'wp.priorityQueue',
        '@wordpress/redux-routine': 'wp.reduxRoutine',
        '@wordpress/rich-text': 'wp.richText',
        '@wordpress/server-side-render': 'wp.serverSideRender',
        '@wordpress/shortcode': 'wp.shortcode',
        '@wordpress/token-list': 'wp.tokenList',
        '@wordpress/url': 'wp.url',
        '@wordpress/viewport': 'wp.viewport',
        '@wordpress/warning': 'wp.warning',
        '@wordpress/wordcount': 'wp.wordcount',
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
    }).purgeCss({
      enabled: true,
      extensions: ['js', 'php', 'scss', 'css'],
      globs: purgeWatch,
      whitelistPatterns: whitelist,
      whitelistPatternsChildren: whitelist,
    }).sourceMaps(false, 'source-map')
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

  mx.extract(['lozad','intersection-observer','animejs','chroma-js','emotion'])

  /** ✨*/
  return mx
}
