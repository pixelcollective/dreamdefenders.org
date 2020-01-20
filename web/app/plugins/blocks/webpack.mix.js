const mix = require('laravel-mix')
      tw  = require('tailwind')
            require('laravel-mix-wp-blocks')
            require('laravel-mix-purgecss')
            require('laravel-mix-tweemotional')

mix.setPublicPath('./dist')
   .browserSync('dreamdefenders.vagrant')

mix.block('./resources/assets/scripts/editor.js', 'scripts')
  .sass('resources/assets/styles/public.scss', 'styles')
  .sass('resources/assets/styles/editor.scss', 'styles')
  .options({
    processCssUrls: false,
    postCss: [tw],
  }).purgeCss({
    enabled: true,
    globs: [
      path.join(__dirname, 'resources/**/*.php'),
      path.join(__dirname, 'resources/assets/**/*.js'),
    ],
    extensions: ['js', 'php'],
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
  })

mix.options({
  processCssUrls: false,
})

mix.sourceMaps(false, 'source-map')
   .version()
