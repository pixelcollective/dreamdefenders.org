/** Helpers */
const sage    = file => `./web/app/themes/sage/${file}`,
      plugins = file => `./web/app/plugins/${file}`

/** Export pathing util */
module.exports = {
  plugins,
  devUrl: `dreamdefenders.vagrant`,
  sage: {
    srcDir: `./web/app/themes/sage`,
    workDir: `./web/app/themes/sage/dist/build`,
    publicDir: `./web/app/themes/sage/dist`,
    src: file => `./web/app/themes/sage/resources/assets/${file}`,
    work: file => `./web/app/themes/sage/dist/build/${file}`,
    public: file => `./web/app/themes/sage/dist/${file}`,
  },
  block: file => plugins(`blocks/resources/assets/scripts/blocks/${file}/block.js`),
  vendorScripts: [
    'lozad',
    'intersection-observer',
    'animejs',
    'headroom.js',
    '@tinypixelco/hoverfx',
  ],
  purgeWhitelist: [
    /wp-block-gallery/,
    /blocks-gallery-.?/,
    /wp-block-.?/,
    /container/,
    /blockquote/,
    /is-style-.?/,
    /align.?/,
    /has-.?/,
    /wp-embed-.?/,
    /wp-.?/,
    /lazyload.?/,
  ],
  purgeWatch: [
    sage('resources/views/*.php'),
    sage('resources/views/**/*.php'),
    sage('resources/views/**/**/*'),
    sage('resources/assets/scripts/*.js'),
    sage('resources/assets/scripts/**/*.js'),
    sage('resources/assets/styles/*.scss'),
    sage('resources/assets/styles/*/*.scss'),
    plugins('blocks/resources/assets/scripts/*.js'),
    plugins('blocks/resources/assets/scripts/**/*.js'),
    plugins('blocks/resources/assets/scripts/blocks/**/*.js'),
    plugins('blocks/resources/assets/styles/*.scss'),
    plugins('blocks/resources/assets/styles/**/*.scss'),
    plugins('blocks/resources/views/*.php'),
    plugins('blocks/resources/views/**/*.php'),
  ],
}
