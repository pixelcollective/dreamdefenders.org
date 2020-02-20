/** Helpers */
const sage    = file => `./web/app/themes/sage/${file}`,
      plugins = file => `./web/app/plugins/${file}`

/** Export pathing util */
module.exports = {
  plugins,
  sage: {
    src: `./web/app/themes/sage`,
    work: `./web/app/themes/sage/dist/build`,
    public: `./web/app/themes/sage/dist`,
    src: file => `./web/app/themes/sage/resources/assets/${file}`,
    work: file => `./web/app/themes/sage/dist/build/${file}`,
    public: file => `./web/app/themes/sage/dist/${file}`,
  },
  blocks: {
    src:  file => plugins(`blocks/resources/assets/scripts/blocks/${file}`),
    dist: file => blocks(`dist/${file}`),
  },
  addBlock: file => plugins(`blocks/resources/assets/scripts/blocks/${file}/block.js`),
  vendored: [
    'lozad',
    'intersection-observer',
    'animejs',
    'headroom.js',
    '@tinypixelco/hoverfx',
  ],
  purgeWatch: [
    sage(`resources/views/*.php`),
    sage(`resources/views/**/*.php`),
    sage(`resources/views/**/**/*`),
    sage(`resources/assets/scripts/*.js`),
    sage(`resources/assets/scripts/**/*.js`),
    sage(`resources/assets/styles/*.scss`),
    sage(`resources/assets/styles/**/*.scss`),
    plugins(`blocks/resources/assets/scripts/*.js`),
    plugins(`blocks/resources/assets/scripts/**/*.js`),
    plugins(`blocks/resources/assets/scripts/blocks/**/*.js`),
    plugins(`blocks/resources/assets/styles/*.scss`),
    plugins(`blocks/resources/assets/styles/**/*.scss`),
    plugins(`blocks/resources/views/*.php`),
    plugins(`blocks/resources/views/**/*.php`),
  ],
}
