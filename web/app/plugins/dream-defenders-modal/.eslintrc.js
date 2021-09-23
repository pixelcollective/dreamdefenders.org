const OFF = 0
const WARN = 1
const ERROR = 2

module.exports = {
  parser: 'babel-eslint',
  plugins: ['prettier', 'react', 'react-hooks'],
  parserOptions: {
    ecmaVersion: 2020,
    ecmaFeatures: {
      jsx: true,
    },
    sourceType: 'module',
  },
  settings: {
    react: {
      version: 'detect',
    },
  },
  extends: ['prettier', 'plugin:react/recommended'],
  rules: {
    'arrow-body-style': OFF,
    'comma-dangle': [
      'error',
      {
        arrays: 'always-multiline',
        objects: 'always-multiline',
        imports: 'always-multiline',
        exports: 'always-multiline',
        functions: 'ignore',
      },
    ],
    'no-console': WARN,
    'no-extra-semi': WARN,
    'prettier/prettier': ERROR,
    quotes: [
      'error',
      'single',
      {
        allowTemplateLiterals: true,
        avoidEscape: true,
      },
    ],
    'react/prop-types': OFF,
    'react/react-in-jsx-scope': ERROR,
    'react-hooks/rules-of-hooks': ERROR,
    'react-hooks/exhaustive-deps': WARN,
  },
}
