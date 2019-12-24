const mix = require('laravel-mix');
            require('laravel-mix-wp-blocks');
            require('laravel-mix-purgecss');
            require('laravel-mix-copy-watched');

const tailwindcss = require('tailwindcss');
const tailwind = tailwindcss('../../../../tailwind.config.js');

mix.setPublicPath('./dist')
   .browserSync('dreamdefenders.vagrant');

mix
  .sass('resources/assets/styles/app.scss', 'styles')
  .sass('resources/assets/styles/editor.scss', 'styles')
  .options({
    processCssUrls: false,
    postCss: [tailwind],
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
  });

mix
  .js('resources/assets/scripts/app.js', 'scripts')
  .js('resources/assets/scripts/customizer.js', 'scripts')
  .blocks('resources/assets/scripts/editor.js', 'scripts')
  .extract();

mix
  .copyWatched('resources/assets/images', 'dist/images')
  .copyWatched('resources/assets/svg', 'dist/svg')
  .copyWatched('resources/assets/fonts', 'dist/fonts');

mix.options({
  processCssUrls: false,
});

mix.sourceMaps(false, 'source-map')
   .version();
