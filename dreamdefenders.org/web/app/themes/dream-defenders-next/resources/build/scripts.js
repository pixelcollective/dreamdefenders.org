require('laravel-mix-wp-blocks')
require('laravel-mix-react-css-modules')

module.exports = (build) => {
  build.mix.js(build.src`scripts/editor.js`, build.out`scripts`)
  build.mix.block(build.src`editor/index.js`, build.out`blocks`)
           .reactCSSModules()
}
