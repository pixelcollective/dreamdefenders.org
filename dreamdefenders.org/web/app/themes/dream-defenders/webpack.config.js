const ExtractTextPlugin = require('extract-text-webpack-plugin');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const UnminifiedWebpackPlugin = require('unminified-webpack-plugin');
const webpack = require('webpack');
const extractCSS = new ExtractTextPlugin({ filename: '../css/style.css'});

module.exports = {
  entry: [
           './assets/js/app/app.ts',
           './assets/sass/style.scss'
  ],
  output: {
    filename: 'bundle.min.js',
    path: __dirname + '/assets/js/'
  },
  resolve: {
    extensions: ['.ts', '.js']
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        use: 'awesome-typescript-loader'
      },
      {
        test: /\.ts$/,
        use: 'awesome-typescript-loader'
      },
      {
        test: /\.scss$/,
        use: ExtractTextPlugin.extract(['css-loader', 'sass-loader'])
      }
    ]
  },
  plugins: [
    // Output a unminified compiled js file
    new UnminifiedWebpackPlugin({
      exclude: /style.css/
    }),
    // Output compiled CSS file from all SCSS files
    extractCSS,
    // Minifiy the compiled js file
    new webpack.optimize.UglifyJsPlugin(),
  ]
};
