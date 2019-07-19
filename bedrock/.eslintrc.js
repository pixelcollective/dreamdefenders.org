module.exports = {
  'root': true,
  'extends': 'eslint:recommended',
  'globals': {
    'wp': true,
  },
  'env': {
    'node': true,
    'es6': true,
    'amd': true,
    'browser': true,
  },
  'parserOptions': {
    'ecmaFeatures': {
      'globalReturn': true,
      'generators': false,
      'objectLiteralDuplicateProperties': false,
      'experimentalObjectRestSpread': true,
    },
    'ecmaVersion': 2018,
    'sourceType': 'module',
  },
  'plugins': [
    'import',
  ],
  'settings': {
    'import/core-modules': [],
    'import/ignore': [
      'ndncollective.org',
      'node_modules',
      '\\.(coffee|scss|css|less|hbs|svg|json)$'
    ],
  },
  'rules': {
    'no-console': 1,
    'no-undef': 0,
    'semi': [
      2,
      'never'
    ],
    'comma-dangle': [
      'error',
      {
        'arrays': 'always-multiline',
        'objects': 'always-multiline',
        'imports': 'always-multiline',
        'exports': 'always-multiline'
      },
    ],
  },
}
