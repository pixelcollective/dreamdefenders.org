const { GenerateSW } = require('workbox-webpack-plugin')

/**
 * webpack configuration
 */
module.exports = ({ production }) => ({
  plugins: [
    new GenerateSW({
      clientsClaim: true,
      inlineWorkboxRuntime: true,
      mode: production ? 'production' : 'development',
      runtimeCaching: [{
        urlPattern: /.(?:png|jpg|jpeg|svg|html)$/,
        handler: 'CacheFirst',
        options: {
          cacheName: 'pages',
          cacheableResponse: {
            statuses: [200],
          },
        },
      }],
    }),
  ],
})