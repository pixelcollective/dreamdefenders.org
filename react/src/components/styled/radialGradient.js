// @flow
import constructGradientValue from '../internalHelpers/_constructGradientValue'
import PolishedError from '../internalHelpers/_errors'

function radialGradient({
  colorStops,
  extent = '',
  fallback,
  position = '',
  shape = '',
}) => {
  if (!colorStops || colorStops.length < 2) {
    throw new PolishedError(57)
  }
  return {
    backgroundColor: fallback || colorStops[0].split(' ')[0],
    backgroundImage: constructGradientValue`radial-gradient(${position}${shape}${extent}${colorStops.join(
      ', ',
    )})`,
  }
}

export default radialGradient
