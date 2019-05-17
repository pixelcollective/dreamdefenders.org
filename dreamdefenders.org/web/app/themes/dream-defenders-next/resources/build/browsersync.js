module.exports = (mix, cfg) => {
  mix.browserSync({
    proxy: 'http://dreamdefenders.valet',
    files: [
      cfg.src`(app|config|resources)/**/*.php`,
      cfg.out`(styles|scripts)/**/*.(css|js)`,
    ],
  })
}
