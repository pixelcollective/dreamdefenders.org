module.exports = {
  devUrl: 'https://project.valet',
  assets: {
    js: [
      'app',
      'customizer',
    ],
    element: [
      'react',
    ],
    postCss: [
      'app',
    ],
  },
  tailwind: `./../../../../tailwind.config.js`,
  paths: {
    dist: `./dist`,
    styles: `${__dirname}/resources/assets/styles`,
    scripts: `${__dirname}/resources/assets/scripts`,
  },
  browserSync: {},
  build: `${__dirname}/resources/build/build.config.js`,
}
