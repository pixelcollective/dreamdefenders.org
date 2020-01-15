const mix  = require('laravel-mix')
const tw   = require('tailwindcss')
const { resolve, join } = require('path')

require('laravel-mix-wp-blocks')
require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')

mix.setPublicPath(`./dist`)
   .browserSync(`dreamdefenders.vagrant`)
   .webpackConfig({
      resolve: {
         alias: {
            [`@hooks`]:      resolve(__dirname, `resources/assets/scripts/hooks`),
            [`@util`]:       resolve(__dirname, `resources/assets/scripts/util`),
            [`@components`]: resolve(__dirname, `resources/assets/scripts/components`),
         },
      },
   })
   .options({ processCssUrls: false })

mix.sass(`resources/assets/styles/app.scss`, `styles`)
   .sass(`resources/assets/styles/editor.scss`, `styles`)
   .purgeCss({
      enabled: true,
      globs: [
         join(__dirname, `resources/**/*.php`),
         join(__dirname, `resources/assets/**/*.js`),
      ],
      extensions: [`js`, `php`],
      whitelistPatterns: [
         /^wp-block-$/,
         /container/,
         /blockquote/,
      ],
      whitelistPatternsChildren: [
         /^wp-block$/,
         /container/,
         /blockquote/,
      ],
   }).options({ postCss: [ tw(`./../../../../tailwind.config.js`) ] })

mix.js(`./resources/assets/scripts/app.js`, `scripts`)
   .js(`./resources/assets/scripts/customizer.js`, `scripts`)
   .blocks(`./resources/assets/scripts/editor.js`, `scripts`)
   .sourceMaps(false, `source-map`)
   .extract()
   .version()

mix.copyWatched(`resources/assets/images`, `dist/images`)
   .copyWatched(`resources/assets/fonts`, `dist/fonts`)
   .copyWatched(`resources/assets/svg/fa/brands`, `dist/svg/fa/brands`)
   .copyWatched(`resources/assets/svg/fa/solid`, `dist/svg/fa/solid`)
   .copyWatched(`resources/assets/svg`, `dist/svg`)
