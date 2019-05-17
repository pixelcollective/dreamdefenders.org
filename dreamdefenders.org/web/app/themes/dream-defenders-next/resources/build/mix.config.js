const mix = require('laravel-mix')

module.exports = {
  step: path => require(`./${path}`),
  out: path => `${mix.config.publicPath}/${path}`,
  src: path => `resources/assets/${path}`,
  proxy: 'http://dreamdefenders.valet',
}
