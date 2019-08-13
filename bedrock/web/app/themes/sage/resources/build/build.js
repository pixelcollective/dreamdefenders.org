const mix = require('laravel-mix')

module.exports = project => {
  const script = file => `${project.paths.scripts}/${file}`
  const stylesheet = file => `${project.paths.styles}/${file}`

  project.assets.element && project.assets.element.forEach(asset =>
    mix.block(script(`${asset}.js`), `scripts/${asset}.js`)
  )

  project.assets.js && project.assets.js.forEach(asset =>
    mix.js(script(`${asset}.js`), `scripts/${asset}.js`))

  project.assets.postCss && project.assets.postCss.forEach(css =>
    mix.postCss(stylesheet(`${css}.css`), `styles/${css}.css`, [
      require('postcss-import'),
      require('postcss-nested'),
      require('postcss-preset-env'),
      require('tailwindcss')(project.tailwind),
    ])
  )

  project.assets.images && cp(project.assets.images, `dist/images`)
  project.assets.svg    && cp(project.assets.svg, `dist/svg`)
  project.assets.fonts  && cp(project.assets.fonts, `dist/fonts`)

  mix.setResourceRoot(project.paths.resources)
      .setPublicPath(project.paths.dist)
      .webpackConfig({
        resolve: {
          extensions: ['.js', '.json'],
          alias: {
            '@components': `${project.paths.scripts}/components`,
          },
        },
      })
      .browserSync({ proxy: project.devUrl, ...project.browserSync })
}
