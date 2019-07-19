const mix = require('laravel-mix')
require(`laravel-mix-wp-blocks`)

module.exports = build = project => {
  const script = file => `${project.paths.scripts}/${file}`
  const stylesheet = file => `${project.paths.styles}/${file}`

  project.assets.element && project.assets.element.forEach(asset =>
    mix.block(script(`${asset}.js`), `${asset}.js`)
  )

  project.assets.js && project.assets.js.forEach(asset =>
    mix.js(script(`${asset}.js`), `${asset}.js`)
  )

  project.assets.postCss && project.assets.postCss.forEach(css =>
    mix.postCss(stylesheet(`${css}.css`), `${css}.css`, [
      require('postcss-import'),
      require('postcss-nested'),
      require('autoprefixer'),
      require('tailwindcss')(project.tailwind),
    ]).extract()
  )

  mix.setResourceRoot(project.paths.resources)
    .setPublicPath(project.paths.dist)
    .webpackConfig({
      resolve: {
        extensions: ['.js', '.json'],
        alias: {
          '@scripts': `${project.paths.scripts}`,
        },
      },
    })
    .browserSync({
      proxy: project.devUrl,
      ...project.browserSync,
    })
}
