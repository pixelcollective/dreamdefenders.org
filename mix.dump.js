
  const mixConfig = {
  config: {
    production: true,
    hmr: false,
    hmrOptions: {
      host: 'localhost',
      port: '8080'
    },
    postCss: [
      {
        version: '7.0.25',
        plugins: [
          function (css) {
    const config = getConfig();
    const processedPlugins = (0, _processPlugins.default)([...(0, _corePlugins.default)(config), ...config.plugins], config);
    return (0, _postcss.default)([(0, _substituteTailwindAtRules.default)(config, processedPlugins), (0, _evaluateTailwindFunctions.default)(config), (0, _substituteVariantsAtRules.default)(config, processedPlugins), (0, _substituteResponsiveAtRules.default)(config), (0, _substituteScreenAtRules.default)(config), (0, _substituteClassApplyAtRules.default)(config, processedPlugins.utilities)]).process(css, {
      from: _lodash.default.get(css, 'source.input.file')
    });
  },
          function formatNodes(root) {
  indentRecursive(root);

  if (root.first) {
    root.first.raws.before = '';
  }
}
        ],
        postcssPlugin: 'tailwind',
        postcssVersion: '7.0.25'
      },
      function plugin(css, result) {
    var prefixes = loadPrefixes({
      from: css.source && css.source.input.file,
      env: options.env
    });
    timeCapsule(result, prefixes);

    if (options.remove !== false) {
      prefixes.processor.remove(css, result);
    }

    if (options.add !== false) {
      prefixes.processor.add(css, result);
    }
  },
      function plugin(css, result) {
    var prefixes = loadPrefixes({
      from: css.source && css.source.input.file,
      env: options.env
    });
    timeCapsule(result, prefixes);

    if (options.remove !== false) {
      prefixes.processor.remove(css, result);
    }

    if (options.add !== false) {
      prefixes.processor.add(css, result);
    }
  },
      function plugin(css, result) {
    var prefixes = loadPrefixes({
      from: css.source && css.source.input.file,
      env: options.env
    });
    timeCapsule(result, prefixes);

    if (options.remove !== false) {
      prefixes.processor.remove(css, result);
    }

    if (options.add !== false) {
      prefixes.processor.add(css, result);
    }
  },
      function plugin(css, result) {
    var prefixes = loadPrefixes({
      from: css.source && css.source.input.file,
      env: options.env
    });
    timeCapsule(result, prefixes);

    if (options.remove !== false) {
      prefixes.processor.remove(css, result);
    }

    if (options.add !== false) {
      prefixes.processor.add(css, result);
    }
  }
    ],
    autoprefixer: {
      enabled: true,
      options: {}
    },
    purifyCss: false,
    publicPath: 'web/app',
    notifications: {
      onSuccess: true,
      onFailure: true
    },
    sourcemaps: false,
    resourceRoot: './web/app',
    imgLoaderOptions: {
      enabled: true,
      gifsicle: {},
      mozjpeg: {},
      optipng: {},
      svgo: {}
    },
    fileLoaderDirs: {
      images: 'images',
      fonts: 'fonts'
    },
    babel: function(babelRcPath) {
            babelRcPath = babelRcPath || Mix.paths.root('.babelrc');

            return require('./BabelConfig').generate(
                this.babelConfig,
                babelRcPath
            );
        },
    processCssUrls: false,
    extractVueStyles: false,
    globalVueStyles: '',
    terser: {
      cache: true,
      parallel: true,
      sourceMap: true,
      terserOptions: {
        compress: {
          warnings: false
        },
        output: {
          comments: false
        }
      }
    },
    cssNano: {},
    cleanCss: {},
    webpackConfig: {},
    babelConfig: {
      presets: [
        '@wordpress/babel-preset-default',
        [
          '@emotion/babel-preset-css-prop',
          {
            autoLabel: true,
            labelFormat: '[local]'
          }
        ]
      ],
      plugins: [
        [
          'macros',
          {
            config: 'tailwind.config.js',
            format: 'auto'
          }
        ],
        [
          'emotion',
          {
            autoLabel: true,
            labelFormat: '[local]'
          }
        ]
      ]
    },
    clearConsole: true,
    merge: merge(options) {
            Object.keys(options).forEach(key => {
                this[key] = options[key];
            });
        }
  },
  js: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  vue: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  preact: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  react: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  coffee: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  typeScript: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  ts: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  less: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  sass: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  stylus: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  postCss: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  css: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  browserSync: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  combine: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  scripts: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  babel: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  styles: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  minify: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  copy: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  copyDirectory: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  autoload: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  version: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  extend: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  extract: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  extractVendors: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  notifications: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  disableNotifications: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  disableSuccessNotifications: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  purifycss: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  dumpWebpackConfig: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  dump: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  purgeCss: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  block: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  blocks: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  tweemotional: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  copyWatched: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                },
  copyDirectoryWatched: (...args) => {
                    Mix.components.record(name, component);

                    component.caller = name;

                    component.register && component.register(...args);

                    component.activated = true;

                    return mix;
                }
}
