const {join} = require('path')

module.exports = {
  jit: true,
  purge: [join(__dirname, 'resources/assets/scripts/**/*')],
}
