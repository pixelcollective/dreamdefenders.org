const mix = require('laravel-mix')

module.exports = {
    mix,
    step: path => require(`./${path}`),
    out: path => `${mix.config.publicPath}/${path}`,
    src: path => `resources/assets/${path}`,
}
