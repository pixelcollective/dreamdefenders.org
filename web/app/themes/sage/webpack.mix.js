const { resolve, join } = require('path'),
   mx = require('laravel-mix'),
   tw = require('tailwind')

require('laravel-mix-wp-blocks')
require('laravel-mix-purgecss')
require('laravel-mix-copy-watched')

const dev = `dreamdefenders.vagrant`;

const whitelist = [
   /wp-block-.?/,
   /container/,
   /blockquote/,
   /is-style-.?/,
   /align.?/,
];

mx.setPublicPath(`./dist`)
   .browserSync(dev)
   .webpackConfig({
      resolve: {
         alias: {
            '@hooks': resolve(__dirname, 'resources/assets/scripts/hooks'),
            '@util': resolve(__dirname, 'resources/assets/scripts/util'),
            '@components': resolve(__dirname, 'resources/assets/scripts/components'),
         },
      },
   })
   .options({ processCssUrls: false })

mx.sass('resources/assets/styles/app.scss', 'styles')
   .sass('resources/assets/styles/editor.scss', 'styles')
   .purgeCss({
      enabled: true,
      globs: [
         './resources/**/*',
         './resources/assets/**/*',
         './resources/assets/**/*',
         './../../plugins/blocks/resources/**/*',
      ],
      extensions: ['js', 'php', 'scss'],
      whitelistPatterns: whitelist,
      whitelistPatternsChildren: whitelist,
   }).options({ postCss: [tw] })

mx.js('resources/assets/scripts/app.js', 'scripts')
   .js('resources/assets/scripts/customizer.js', 'scripts')
   .sourceMaps(false, 'source-map')
   .extract()
   .version()

mx.blocks('./resources/assets/scripts/editor.js', 'scripts')
   .version()

mx.copyWatched('resources/assets/images', 'dist/images')
   .copyWatched('resources/assets/fonts', 'dist/fonts')
   .copyWatched('resources/assets/svg/**/*.svg', 'dist/svg', {
      base: 'resources/assets/svg',
   });
