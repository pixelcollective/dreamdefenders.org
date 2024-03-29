let mix = require('laravel-mix')
require('@tinypixelco/laravel-mix-wp-blocks')

mix.setPublicPath('./public').browserSync('sage.test')

mix
  .sass('resources/styles/app.scss', 'styles')
  .sass('resources/styles/editor.scss', 'styles')
  .options({
    processCssUrls: false,
    postCss: [require('tailwindcss')],
  })

mix
  .js('resources/scripts/app.js', 'scripts')
  .js('resources/scripts/customizer.js', 'scripts')
  .blocks('resources/scripts/editor.js', 'scripts')
  .extract()

mix
  .copyDirectory('resources/images', 'public/images')
  .copyDirectory('resources/svg', 'public/svg')
  .copyDirectory('resources/svg/fa/brands', 'public/svg')
  .copyDirectory('resources/svg/fa/solid', 'public/svg')
  .copyDirectory('resources/fonts', 'public/fonts')

mix.sourceMaps().version()
