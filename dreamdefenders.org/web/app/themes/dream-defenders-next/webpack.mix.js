const mix = require('laravel-mix')
require('laravel-mix-wp-blocks')
require('laravel-mix-react-css-modules')

const cfg = require('./resources/build/mix.config')

mix.setPublicPath('./storage/theme/assets')

mix.browserSync({
  proxy: cfg.proxy,
  files: [
    cfg.src`(app|config|resources)/**/*.php`,
    cfg.out`(styles|scripts)/**/*.(css|js)`,
  ],
})

const plugins = [
  require('postcss-import'),
  require('tailwindcss')('./tailwind.config.js'),
  require('postcss-preset-env'),
  require('postcss-hexrgba'),
  require('postcss-nested'),
  require('postcss-url'),
]

!mix.inProduction() && plugins.push(
  require('postcss-browser-reporter')
)

mix.postCss(cfg.src`styles/app.css`, cfg.out`styles`, plugins)
mix.postCss(cfg.src`styles/editor.css`, cfg.out`styles`, plugins)

mix.block(cfg.src`editor/index.js`, cfg.out`blocks`)
   .reactCSSModules()

mix.js(cfg.src`scripts/app.js`, cfg.out`scripts`)
   .js(cfg.src`scripts/editor.js`, cfg.out`scripts`)

mix.copyDirectory(cfg.src`images`, cfg.out`images`)
   .copyDirectory(cfg.src`svg`, cfg.out`svg`)
   .copyDirectory(cfg.src`fonts`, cfg.out`fonts`)

mix.options({ processCssUrls: false })
!mix.inProduction() && mix.sourceMaps()
