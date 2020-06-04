const pino = require('pino')
const prettifier = require('pino-pretty')

/**
 * Logger util
 */
const logger = pino({
  sync: false,
  prettyPrint: {
    levelFirst: true,
  },
  prettifier,
})

module.exports = logger