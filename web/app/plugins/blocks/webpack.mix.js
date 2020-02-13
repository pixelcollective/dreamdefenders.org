const mx = require('laravel-mix'),
      tw = require('tailwind')
           require('laravel-mix-wp-blocks')
           require('laravel-mix-purgecss')
           require('laravel-mix-tweemotional')

const whitelist = [
  /^wp-block-$/,
  /container/,
  /blockquote/,
]

mx.setPublicPath('dist')
   .browserSync('dreamdefenders.vagrant')

mx.block('resources/assets/scripts/blocks/Container/block.js', 'scripts/container.js')
  .block('resources/assets/scripts/blocks/FreedomPaper/block.js', 'scripts/freedom-paper.js')
  .block('resources/assets/scripts/blocks/TwoColumn/block.js', 'scripts/two-column.js')
  .block('resources/assets/scripts/blocks/PostContainer/block.js', 'scripts/post-container.js')
  .block('resources/assets/scripts/blocks/ProjectContainer/block.js', 'scripts/project-container.js')
  .block('resources/assets/scripts/blocks/Squadd/block.js', 'scripts/squadd.js')
  .block('resources/assets/scripts/extensions/hide-title-block.js', 'scripts/hide-title-block.js')

mx.sass('resources/assets/styles/public.scss', 'styles')
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
    whitelistPatterns: whitelist,
    whitelistPatternsChildren: whitelist,
  })

mx.sourceMaps(false, 'source-map')
   .version();
