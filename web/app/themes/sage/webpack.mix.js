const { resolve, join } = require('path')

const mix   = require('laravel-mix'),
      tw    = require('tailwind'),
      pa11y = require('pa11y')

require('laravel-mix-wp-blocks')
require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')

const dev = `dreamdefenders.vagrant`;
const whitelist = [/^wp-block-$/, /container/, /blockquote/];

mix.setPublicPath(`./dist`)
   .browserSync(dev)
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
      enabled: mix.inProduction(),
      globs: [
         join(__dirname, `resources/**/*.php`),
         join(__dirname, `resources/assets/**/*.js`),
      ],
      extensions: [`js`, `php`],
      whitelistPatterns: whitelist,
      whitelistPatternsChildren: whitelist,
   }).options({
      postCss: [tw],
   })

mix.js(`./resources/assets/scripts/app.js`, `scripts`)
   .js(`./resources/assets/scripts/customizer.js`, `scripts`)
   .sourceMaps(false, `source-map`)
   .extract()
   .version()

mix.blocks(`./resources/assets/scripts/editor.js`, `scripts`)
   .version()

! mix.inProduction() && pa11y(`http://${dev}`, {
   ignore: [`WCAG2AA.Principle3.Guideline3_1.3_1_1.H57.2`],
}).then(results => {
   console.log(`\n`)
   console.log(`Accessibility issues found for ${results.pageUrl}:`)
   console.dir(results.issues, { colors: true })
   console.log(`\n`)
})

mix.copyWatched(`resources/assets/images`, `./dist/images`)
   .copyWatched(`resources/assets/fonts`, `./dist/fonts`)
   .copyWatched(`resources/assets/svg/**/*.svg`, `./dist/svg`, {
      base: `resources/assets/svg`,
   })
