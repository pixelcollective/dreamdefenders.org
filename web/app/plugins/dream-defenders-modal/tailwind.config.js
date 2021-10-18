const {join} = require('path')

module.exports = {
  jit: true,
  purge: [join(__dirname, 'resources/assets/scripts/**/*')],
  theme: {
    extend: {
      height: {
        128: '30rem',
      },
      maxHeight: {
        0: '0',
        '1/4': '25%',
        '1/2': '50%',
        '3/4': '75%',
        80: '80vh',
        full: '100%',
      },
    },
  },
}
