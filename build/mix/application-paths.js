/** Helpers */
const theme  = file => `./web/app/themes/sage/${file}`,
      blocks = file => `./web/app/plugins/blocks/${file}`

/** Export pathing util */
module.exports = {
  theme: {
    src:    file => theme(`resources/assets/${file}`),
    dist:   file => theme(`dist/${file}`),
  },
  blocks: {
    src:    file => blocks(`resources/assets/${file}`),
    dist:   file => blocks(`dist/${file}`),
  },
  purgeWatch: [
    theme(`resources/views/*.php`),
    theme(`resources/views/**/*.php`),
    theme(`resources/views/**/**/*`),
    theme(`resources/assets/scripts/*.js`),
    theme(`resources/assets/scripts/**/*.js`),
    theme(`resources/assets/styles/*.scss`),
    theme(`resources/assets/styles/**/*.scss`),
    blocks(`resources/assets/scripts/*.js`),
    blocks(`resources/assets/scripts/**/*.js`),
    blocks(`resources/assets/scripts/blocks/**/*.js`),
    blocks(`resources/assets/styles/*.scss`),
    blocks(`resources/assets/styles/**/*.scss`),
    blocks(`resources/views/*.php`),
    blocks(`resources/views/**/*.php`),
  ],
}
