module.exports = {
  devUrl: 'https://tinypixel.valet',
  assets: {
    js: [
      'admin',
      'public',
    ],
    element: [
      'editor',
      'editor-extensions',
    ],
    postCss: [
      'editor',
      'admin',
      'public',
    ],
  },
  tailwind: `./../../../../tailwind.config.js`,
  paths: {
    dist: `./dist`,
    styles: `${__dirname}/resources/assets/styles`,
    scripts: `${__dirname}/resources/assets/scripts`,
  },
  browserSync: {},
  build: `${__dirname}/resources/build`,
}
