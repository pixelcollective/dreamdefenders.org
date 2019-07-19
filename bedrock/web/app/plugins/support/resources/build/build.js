const mix = require('laravel-mix')
require(`laravel-mix-wp-blocks`)

module.exports = project => {
  const script = file => `${project.paths.scripts}/${file}`
  const stylesheet = file => `${project.paths.styles}/${file}`

  project.assets.element.forEach(asset => mix.block(
    script(`${asset}.js`),
    `${asset}.js`,
  ))

  project.assets.js.forEach(asset => mix.js(
    script(`${asset}.js`),
    `${asset}.js`,
  ))

  project.assets.postCss.forEach(css => {
    mix.postCss(stylesheet(`${css}.css`), `${css}.css`, [
      require('postcss-import'),
      require('postcss-nested'),
      require('postcss-preset-env'),
      require('tailwindcss')(project.tailwind),
    ])
  })

  mix.setResourceRoot(project.paths.resources)
      .setPublicPath(project.paths.dist)
      .webpackConfig({
        resolve: {
          extensions: ['.js', '.json'],
          alias: {
            '@admin':      `${project.paths.scripts}/admin`,
            '@blocks':     `${project.paths.scripts}/blocks`,
            '@components': `${project.paths.scripts}/components`,
            '@gutenberg':  `${project.paths.scripts}/imports/gutenberg`,
            '@extensions': `${project.paths.scripts}/extensions`,
            '@public':     `${project.paths.scripts}/public`,
            '@util':       `${project.paths.scripts}/util`,
          },
        },
      })
      .browserSync({ proxy: project.devUrl, ...project.browserSync })
}
