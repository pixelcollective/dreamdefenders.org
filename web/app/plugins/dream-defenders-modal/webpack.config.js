const {resolve} = require('path')
const {CleanWebpackPlugin} = require('clean-webpack-plugin')
const DependencyExtractionWebpackPlugin = require('@wordpress/dependency-extraction-webpack-plugin')
const FriendlyErrorsWebpackPlugin = require('friendly-errors-webpack-plugin')
const {
  WebpackManifestPlugin,
} = require('webpack-manifest-plugin')
const WebpackBar = require('webpackbar')

/**
 * Webpack utilities
 */
const isProduction = process.env.NODE_ENV !== 'development'
const jsAsset = asset =>
  resolve(process.cwd(), `resources/assets/scripts/${asset}`)

/**
 * Webpack Configuration
 */
module.exports = {
  mode: isProduction ? 'production' : 'development',
  devtool: 'inline-source-map',
  entry: {
    editor: [
      jsAsset('editor/block.js'),
      resolve(__dirname, 'resources/assets/styles/editor.css'),
    ],
    public: [
      jsAsset('public/index.js'),
      resolve(__dirname, 'resources/assets/styles/public.css'),
    ],
  },
  output: {
    path: resolve(__dirname, 'dist'),
  },
  resolve: {
    extensions: ['.js', '.json', '.css'],
    modules: [resolve(__dirname, 'node_modules')],
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: resolve(__dirname, 'node_modules'),
        use: ['babel-loader', 'eslint-loader'],
      },
      {
        test: /\.css$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].css',
            },
          },
          {loader: 'extract-loader'},
          {loader: 'css-loader', options: {importLoaders: 1}},
          {loader: 'postcss-loader'},
        ],
      },
      {
        test: /\.jpe?g$|\.gif$|\.png$/i,
        use: 'file-loader?name=/img/[name].[ext]',
      },
      {
        test: /\.svg$/,
        use: ['@svgr/webpack', 'url-loader'],
      },
    ],
  },
  plugins: [
    new CleanWebpackPlugin(),
    new DependencyExtractionWebpackPlugin({
      injectPolyfill: true,
      useDefaults: true,
      outputFormat: 'json',
    }),
    new FriendlyErrorsWebpackPlugin(),
    new WebpackManifestPlugin({
      output: {
        publicPath: resolve(__dirname, 'dist'),
      },
    }),
    new WebpackBar(),
  ],
}
