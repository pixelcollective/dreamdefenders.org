module.exports = (mix) => {
  const plugins = [
    require('postcss-import'),
    require('postcss-preset-env'),
    require('postcss-hexrgba'),
    require('postcss-nested'),
    require('postcss-url'),
    require('tailwindcss')('./resources/build/tailwind.config.js'),
  ]

  !mix.inProduction() && plugins.push(
    require('postcss-browser-reporter')
  )

  return plugins
}
