/**
 * dreamdefenders.org
 * styleguide implementation
 *
 * @status in progress
 */
const colorway = {
  highlightYellow: {
    hex: `#FDE135`,
    rgb: `rgb(253, 225, 53)`,
    rgba: tr => `rgba(253, 225, 53, ${tr})`,
  },
  dreamersBlue: {
    hex: `#52C0FF`,
    rgb: `rgb(82, 192, 255)`,
    rgba: tr => `rgba(82, 192, 255, ${tr})`,
  },
  coolGrey: {
    hex: `#AEAEAE`,
    rgb: `rgb(174, 174, 174)`,
    rgba: tr => `rgba(174, 174, 174, ${tr})`,
  },
  neutralIvory: {
    hex: `#FCF8EE`,
    rgb: `rgb(255, 248, 238)`,
    rgba: tr => `rgba(255, 248, 238, ${tr})`,
  },
  nearlyBlack: {
    hex: `#1E2531`,
    rgb: `rgb(30, 37, 49)`,
    rgba: tr => `rgba(30, 37, 49, ${tr})`,
  },
  black: {
    hex: `#000000`,
    rgb: `rgb(0, 0, 0)`,
    rgba: tr => `rgba(0, 0, 0, ${tr})`,
  },
  white: {
    hex: `#FFFFFF`,
    rgb: `rgb(255, 255, 255)`,
    rgba: tr => `rgba(255, 255, 255, ${tr})`,
  }
}

const fonts = {
  robotoSans: { fontFamily: `'Roboto Sans', sans-serif` },
  robotoSlab: { fontFamily: `'Roboto Slab', serif` },
}

const typography = {
  heading: {
    ...fonts.robotoSans,
    fontWeight: 900,
    fontSize:   5,
    leading:    65/50,
    textTransform: `uppercase`,
  },
  subheading: {
    ...fonts.robotoSans,
    fontWeight: 900,
    fontSize:   4,
    leading:    70/40,
  },
  h3: {
    ...fonts.robotoSans,
    fontWeight: 700,
    fontSize:   3,
    leading:    38.4/32,
  },
  h4: {
    ...fonts.robotoSans,
    fontWeight: 500,
    fontSize:   2.8,
    leading:    33.8/26,
  },
  h5: {
    ...fonts.robotoSans,
    fontWeight: 500,
    fontSize:   2.6,
    leading:    27/18,
  },
  body: {
    ...fonts.robotoSans,
    fontWeight: 500,
    fontSize:   1.8,
    leading:    27/18,
  },
  pullQuote: {
    ...fonts.robotoSerif,
    fontWeight: 500,
    fontSize:   4,
    leading:    56/40,
  },
}

const ornamentation = {
  stripes: `
    background: repeating-linear-gradient(
      45deg,
      ${colorway.nearlyBlack.rgba`1`},
      ${colorway.nearlyBlack.rgba`0`} 10px,
      ${colorway.nearlyBlack.rgba`1`} 10px,
      ${colorway.nearlyBlack.rgba`0`} 20px,
    );
  `,
}

export const theme = {
  colorway,
  fonts,
  typography,
  ornamentation,
}
