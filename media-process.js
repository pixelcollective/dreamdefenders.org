const sharp = require('sharp')
const globby = require('globby')

/**
 * Where to get dem piccies.
 */
const SITE_PATHS = [
  `web/app/uploads/**/*.jpg`,
  `web/app/uploads/**/*.jpeg`,
  `web/app/uploads/**/*.png`,
  `web/app/themes/sage/resources/assets/images/*.jpg`,
  `web/app/themes/sage/resources/assets/images/*.jpeg`,
  `web/app/themes/sage/resources/assets/images/*.png`,
]

/**
 * Crunch functch.
 */
const processImage = async ({source, output, ext}) => {
  if (ext == 'png') {
    await sharp(source)
      .png({
        progressive: true,
        quality: 50,
        compressionLevel: 6,
      })
      .toFile(output)
  } else if (ext == 'jpeg' || ext == 'jpg') {
    await sharp(source)
      .jpeg({
        progressive: true,
        optimizeScans: true,
        optimizeCoding: true,
        quality: 50,
      })
      .toFile(output)
  } else {
    console.log(`skipping ${output}`)
  }
}


/**
 * Run it.
 */
console.log(`Copying WordPress Media Library`)

globby.sync(SITE_PATHS).forEach(image => {
  console.log(`Processing ${image}`)
  ;(async () => {
    processImage({
      source: image.replace('web', 'sharp'),
      output: image,
      ext: image.split('.')[image.split('.').length-1],
    }).catch(err => console.error(err))
  })()
})