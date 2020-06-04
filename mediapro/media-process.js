const fs = require('fs-extra')
const sharp = require('sharp')
const globby = require('globby')
const {Observable, from} = require('rxjs')
const {concatMap} = require('rxjs/operators')

const logger = require('./logger')

/**
 * Media sources
 */
const SOURCES = [
  'web/app/uploads/**/*.jpg',
  'web/app/uploads/**/*.jpeg',
  'web/app/uploads/**/*.png',
  'web/app/themes/sage/resources/assets/images/*.jpg',
  'web/app/themes/sage/resources/assets/images/*.jpeg',
  'web/app/themes/sage/resources/assets/images/*.png',
]

/**
 * Options
 */
const options = {
  png: {
    quality: 50,
    compressionLevel: 6,
  },
  jpeg: {
    progressive: true,
    quality: 50,
    optimizeScans: true,
  },
  resize: {
    width: 2560,
    height: 1440,
    withoutEnlargement: true,
  },
}

/**
 * Return the sharp method for
 * a given image file
 */
const sharpHandler = path => {
  const exts = {
    png: 'png',
    jpg: 'jpeg',
    jpeg: 'jpeg',
    webp: 'webp',
  }

  const ext = exts[path.split('.').pop()]
  return ext ? ext : null
}

/**
 * Helper
 * Return tmp path for any given file.
 */
const tmp = path =>
  path.replace('web/', 'tmp/')

/**
 * To webp
 */
const appendName = (path, append) => {
  const base = path.replace(path.split('.').pop() + '.', '')
  return `${base}${append}`
}

/**
 * Asyncronously process a set of images
 * using the Lovell/Sharp library
 *
 * @param {array} sources -- glob strings
 */
const process = async sources => {
  /** Resolve array of image paths */
  const media = await globby(sources)

  /**
   * Process images as a metastream
   * of functional observables.
   */
  const processing = new Observable(obs => {
    from(media).pipe(
      concatMap(async img => {
        /** Copy to tmp */
        try {
          await fs.copy(img, tmp(img))
        } catch (e) {
          logger.error(e)
        }

        /**
         * Process image.
         */
        try {
          await sharp(tmp(img))
            [sharpHandler(img)](options[`${sharpHandler(img)}`])
            .resize(options.resize)
            .toFile(img)

          logger.info(
            `[${sharpHandler(img)}] medium ${img.replace(__dirname, '')}`
          )
        } catch (e) {
          logger.error(e)
        }

        /** Remove tmp */
        try {
          await fs.remove(tmp(img))
        } catch (e) {
          logger.error(e)
        }

        obs.next(img)
      })
    )
    .subscribe({
      next: next => obs.next(next),
    })
  })

  /**
   * Log metastream's emitted events
   */
  processing.subscribe({
    next: next => next && logger.info(next),
  })
}

process(SOURCES)
