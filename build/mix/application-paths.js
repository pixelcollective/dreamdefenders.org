/** Helpers */
const sage    = file => `./web/app/themes/sage/${file}`,
      plugins = file => `./web/app/plugins/${file}`

/** Export pathing util */
module.exports = {
  plugins,
  sage: {
    src:  file => sage(`resources/assets/${file}`),
    dist: file => sage(`dist/${file}`),
  },
  blocks: {
    src:  file => plugins(`blocks/resources/assets/${file}`),
    dist: file => blocks(`dist/${file}`),
  },
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
