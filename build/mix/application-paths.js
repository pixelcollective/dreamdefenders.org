const theme     = file => `./web/app/themes/sage/${file}`,
      blocks    = file => `./web/app/plugins/blocks/${file}`

module.exports = {
  gutenberg: {
    dist: file => `./web/app/plugins/gutenberg/build/${file}`,
  },
  theme: {
    src:    file => theme(`resources/assets/${file}`),
    script: file => theme(`resources/assets/scripts/${file}`),
    style:  file => theme(`resources/assets/styles/${file}`),
    dist:   file => theme(`dist/${file}`),
  },
  blocks: {
    src:    file => blocks(`resources/${file}`),
    script: file => blocks(`resources/assets/scripts/${file}`),
    style:  file => blocks(`resources/assets/styles/${file}`),
    dist:   file => blocks(`dist/${file}`),
  },
  purgeWatch: [
    theme(`resources/views/*.blade.php`),
    theme(`resources/views/**/*.blade.php`),
    theme(`resources/assets/scripts/*.js`),
    theme(`resources/assets/scripts/**/*.js`),
    theme(`resources/assets/styles/*.scss`),
    theme(`resources/assets/styles/**/*.scss`),
    blocks(`resources/assets/scripts/*.js`),
    blocks(`resources/assets/scripts/**/*.js`),
    blocks(`resources/assets/styles/*.scss`),
    blocks(`resources/assets/styles/**/*.scss`),
    blocks(`resources/views/*.blade.php`),
    blocks(`resources/views/**/*.blade.php`),
  ],
}
