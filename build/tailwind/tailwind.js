const tw = require('tailwindcss')
const blendModes = require('tailwindcss-blend-mode')
const gradients = require('tailwindcss-gradients')
const multiColumn = require('tailwindcss-multi-column')

module.exports = tw({
  prefix: '',
  important: false,
  separator: ':',
  theme: {
    screens: {
      sm: '640px',
      md: '768px',
      lg: '896px',
      xl: '1024px',
    },
    colors: {
      transparent: 'transparent',
      black: {
        default: 'rgba(0, 0, 0, 1)',
        900: 'rgba(0, 0, 0, 0.9)',
        800: 'rgba(0, 0, 0, 0.8)',
        700: 'rgba(0, 0, 0, 0.7)',
        600: 'rgba(0, 0, 0, 0.6)',
        500: 'rgba(0, 0, 0, 0.5)',
        400: 'rgba(0, 0, 0, 0.4)',
        300: 'rgba(0, 0, 0, 0.3)',
        200: 'rgba(0, 0, 0, 0.2)',
        100: 'rgba(0, 0, 0, 0.1)',
      },
      white: {
        default: 'rgba(255, 255, 255, 1)',
        900: 'rgba(255, 255, 255, 0.9)',
        800: 'rgba(255, 255, 255, 0.8)',
        700: 'rgba(255, 255, 255, 0.7)',
        600: 'rgba(255, 255, 255, 0.6)',
        500: 'rgba(255, 255, 255, 0.5)',
        400: 'rgba(255, 255, 255, 0.4)',
        300: 'rgba(255, 255, 255, 0.3)',
        200: 'rgba(255, 255, 255, 0.2)',
        100: 'rgba(255, 255, 255, 0.1)',
      },
      gray: {
        default: 'rgba(24, 24, 24, 1)',
        100: 'rgba(24, 24, 24, 0.1)',
        200: 'rgba(24, 24, 24, 0.2)',
        300: 'rgba(24, 24, 24, 0.3)',
        400: 'rgba(24, 24, 24, 0.4)',
        500: 'rgba(24, 24, 24, 0.5)',
        600: 'rgba(24, 24, 24, 0.6)',
        700: 'rgba(24, 24, 24, 0.7)',
        800: 'rgba(24, 24, 24, 0.8)',
        900: 'rgba(24, 24, 24, 0.9)',
      },
      yellow: {
        default: 'rgba(253, 225, 53, 1)',
        100: 'rgba(253, 225, 53, 0.1)',
        200: 'rgba(253, 225, 53, 0.2)',
        300: 'rgba(253, 225, 53, 0.3)',
        400: 'rgba(253, 225, 53, 0.4)',
        500: 'rgba(253, 225, 53, 0.5)',
        600: 'rgba(253, 225, 53, 0.6)',
        700: 'rgba(253, 225, 53, 0.7)',
        800: 'rgba(253, 225, 53, 0.8)',
        900: 'rgba(253, 225, 53, 0.9)',
      },
      blue: {
        default: 'rgba(91, 214, 255, 1)',
        100: 'rgba(91, 214, 255, 0.1)',
        200: 'rgba(91, 214, 255, 0.2)',
        300: 'rgba(91, 214, 255, 0.3)',
        400: 'rgba(91, 214, 255, 0.4)',
        500: 'rgba(91, 214, 255, 0.5)',
        600: 'rgba(91, 214, 255, 0.6)',
        700: 'rgba(91, 214, 255, 0.7)',
        800: 'rgba(91, 214, 255, 0.8)',
        900: 'rgba(91, 214, 255, 0.9)',
      },
    },
    spacing: {
      px: '1px',
      0: '0',
      1: '0.25rem',
      2: '0.5rem',
      3: '0.75rem',
      4: '1rem',
      5: '1.25rem',
      6: '1.5rem',
      8: '2rem',
      10: '2.5rem',
      12: '3rem',
      16: '4rem',
      20: '5rem',
      24: '6rem',
      32: '8rem',
      40: '10rem',
      48: '12rem',
      64: '16rem',
      96: '24rem',
      128: '32rem',
    },
    backgroundColor: theme => theme('colors'),
    borderColor: theme => ({
      default: theme(`colors.gray.300`, `currentColor`),
      ...theme(`colors`),
    }),
    boxShadow: {
      default: '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)',
      md: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
      lg: '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
      xl: '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
      '2xl': '0 25px 50px -12px rgba(0, 0, 0, 0.25)',
      epic: '0 50px 100px -24px rgba(0, 0, 0, 0.5)',
      inner: 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.06)',
      outline: '0 0 0 3px rgba(66, 153, 225, 0.5)',
      none: 'none',
    },
    fontFamily: {
      sans: [
        `-apple-system`,
        `BlinkMacSystemFont`,
        `"Segoe UI"`,
        `Roboto`,
        `"Helvetica Neue"`,
        `Arial`,
        `"Noto Sans"`,
        `sans-serif`,
        `"Apple Color Emoji"`,
        `"Segoe UI Emoji"`,
        `"Segoe UI Symbol"`,
        `"Noto Color Emoji"`,
      ],
      'display': [
        `Roboto Condensed`,
        `-apple-system`,
        `BlinkMacSystemFont`,
        `"Segoe UI"`,
        `Roboto`,
        `"Helvetica Neue"`,
        `Arial`,
        `"Noto Sans"`,
        `sans-serif`,
        `"Apple Color Emoji"`,
        `"Segoe UI Emoji"`,
        `"Segoe UI Symbol"`,
        `"Noto Color Emoji"`,
      ],
    },
    height: theme => ({
      auto: 'auto',
      full: '100%',
      screen: '100vh',
      overflow: '130vh',
      ...theme('spacing'),
    }),
    listStyleType: {
      none: 'none',
      disc: 'disc',
      decimal: 'decimal',
    },
    margin: (theme, { negative }) => ({
      auto: 'auto',
      ...theme('spacing'),
      ...theme('width'),
      ...negative(theme('spacing')),
    }),
    maxHeight: theme => ({
      auto: 'auto',
      ...theme('spacing'),
      full: '100%',
      screen: '100vh',
    }),
    maxWidth: theme => ({
      ...theme('spacing'),
      'xs': `16rem`,
      'sm': `20rem`,
      'md': `24rem`,
      'lg': `28rem`,
      'xl': `32rem`,
      '2xl': `36rem`,
      '3xl': `42rem`,
      '4xl': `48rem`,
      '5xl': `56rem`,
      '6xl': `64rem`,
      'full': `100%`,
    }),
    minHeight: {
      '0': `0`,
      'full': `100%`,
      'screen': `100vh`,
    },
    minWidth: {
      '0': '0',
      full: '100%',
    },
    objectPosition: {
      'bottom': 'bottom',
      'center': 'center',
      'left': 'left',
      'left-bottom': 'left bottom',
      'left-top': 'left top',
      'right': 'right',
      'right-bottom': 'right bottom',
      'right-top': 'right top',
      'top': 'top',
    },
    opacity: {
      '0': '0',
      '25': '0.25',
      '50': '0.5',
      '75': '0.75',
      '100': '1',
    },
    order: {
      first: '-9999',
      last: '9999',
      none: '0',
      '1': '1',
      '2': '2',
      '3': '3',
      '4': '4',
      '5': '5',
      '6': '6',
      '7': '7',
      '8': '8',
      '9': '9',
      '10': '10',
      '11': '11',
      '12': '12',
    },
    padding: theme => theme('spacing'),
    placeholderColor: theme => theme('colors'),
    stroke: {
      current: 'currentColor',
    },
    textColor: theme => theme('colors'),
    width: theme => ({
      auto: 'auto',
      '1/2': '50%',
      '1/3': '33.333333%',
      '2/3': '66.666667%',
      '1/4': '25%',
      '2/4': '50%',
      '3/4': '75%',
      '1/5': '20%',
      '2/5': '40%',
      '3/5': '60%',
      '4/5': '80%',
      '1/6': '16.666667%',
      '2/6': '33.333333%',
      '3/6': '50%',
      '4/6': '66.666667%',
      '5/6': '83.333333%',
      '1/12': '8.333333%',
      '2/12': '16.666667%',
      '3/12': '25%',
      '4/12': '33.333333%',
      '5/12': '41.666667%',
      '6/12': '50%',
      '7/12': '58.333333%',
      '8/12': '66.666667%',
      '9/12': '75%',
      '10/12': '83.333333%',
      '11/12': '91.666667%',
      full: '100%',
      screen: '100vw',
      ...theme('spacing'),
    }),
    zIndex: {
      '-20': '-20',
      '-10': '-10',
      auto: 'auto',
      '0': '0',
      '10': '10',
      '20': '20',
      '30': '30',
      '40': '40',
      '50': '50',
    },
    gap: theme => theme('spacing'),
    gridTemplateColumns: {
      none: 'none',
      '1': 'repeat(1, minmax(0, 1fr))',
      '2': 'repeat(2, minmax(0, 1fr))',
      '3': 'repeat(3, minmax(0, 1fr))',
      '4': 'repeat(4, minmax(0, 1fr))',
      '5': 'repeat(5, minmax(0, 1fr))',
      '6': 'repeat(6, minmax(0, 1fr))',
      '7': 'repeat(7, minmax(0, 1fr))',
      '8': 'repeat(8, minmax(0, 1fr))',
      '9': 'repeat(9, minmax(0, 1fr))',
      '10': 'repeat(10, minmax(0, 1fr))',
      '11': 'repeat(11, minmax(0, 1fr))',
      '12': 'repeat(12, minmax(0, 1fr))',
    },
    gridColumn: {
      auto: 'auto',
      'span-1': 'span 1 / span 1',
      'span-2': 'span 2 / span 2',
      'span-3': 'span 3 / span 3',
      'span-4': 'span 4 / span 4',
      'span-5': 'span 5 / span 5',
      'span-6': 'span 6 / span 6',
      'span-7': 'span 7 / span 7',
      'span-8': 'span 8 / span 8',
      'span-9': 'span 9 / span 9',
      'span-10': 'span 10 / span 10',
      'span-11': 'span 11 / span 11',
      'span-12': 'span 12 / span 12',
    },
    gridColumnStart: {
      auto: 'auto',
      '1': '1',
      '2': '2',
      '3': '3',
      '4': '4',
      '5': '5',
      '6': '6',
      '7': '7',
      '8': '8',
      '9': '9',
      '10': '10',
      '11': '11',
      '12': '12',
      '13': '13',
    },
    gridColumnEnd: {
      auto: 'auto',
      '1': '1',
      '2': '2',
      '3': '3',
      '4': '4',
      '5': '5',
      '6': '6',
      '7': '7',
      '8': '8',
      '9': '9',
      '10': '10',
      '11': '11',
      '12': '12',
      '13': '13',
    },
    gridTemplateRows: {
      none: 'none',
      '1': 'repeat(1, minmax(0, 1fr))',
      '2': 'repeat(2, minmax(0, 1fr))',
      '3': 'repeat(3, minmax(0, 1fr))',
      '4': 'repeat(4, minmax(0, 1fr))',
      '5': 'repeat(5, minmax(0, 1fr))',
      '6': 'repeat(6, minmax(0, 1fr))',
    },
    gridRow: {
      auto: 'auto',
      'span-1': 'span 1 / span 1',
      'span-2': 'span 2 / span 2',
      'span-3': 'span 3 / span 3',
      'span-4': 'span 4 / span 4',
      'span-5': 'span 5 / span 5',
      'span-6': 'span 6 / span 6',
    },
    gridRowStart: {
      auto: 'auto',
      '1': '1',
      '2': '2',
      '3': '3',
      '4': '4',
      '5': '5',
      '6': '6',
      '7': '7',
    },
    gridRowEnd: {
      auto: 'auto',
      '1': '1',
      '2': '2',
      '3': '3',
      '4': '4',
      '5': '5',
      '6': '6',
      '7': '7',
    },
    transformOrigin: {
      center: 'center',
      top: 'top',
      'top-right': 'top right',
      right: 'right',
      'bottom-right': 'bottom right',
      bottom: 'bottom',
      'bottom-left': 'bottom left',
      left: 'left',
      'top-left': 'top left',
    },
    scale: {
      '0': '0',
      '50': '.5',
      '75': '.75',
      '90': '.9',
      '95': '.95',
      '100': '1',
      '105': '1.05',
      '110': '1.1',
      '125': '1.25',
      '150': '1.5',
    },
    rotate: {
      '-180': '-180deg',
      '-90': '-90deg',
      '-45': '-45deg',
      '0': '0',
      '45': '45deg',
      '90': '90deg',
      '180': '180deg',
    },
    translate: (theme, { negative }) => ({
      ...theme('spacing'),
      ...negative(theme('spacing')),
      '-full': '-100%',
      '-1/2': '-50%',
      '1/2': '50%',
      full: '100%',
    }),
    skew: {
      '-12': '-12deg',
      '-6': '-6deg',
      '-3': '-3deg',
      '0': '0',
      '3': '3deg',
      '6': '6deg',
      '12': '12deg',
    },
    /**
     * Gradients
     * @see https://github.com/benface/tailwindcss-gradients
     */
    linearGradients: theme => ({
      colors: {
        'white-yellow': [
          `${theme('colors').white['default']}`,
          `${theme('colors').yellow[400]}`,
        ],
        'white-black': [
          `${theme('colors').white['default']}`,
          `${theme('colors').black[600]}`,
        ],
        'yellow-white-blue': [
          `${theme('colors').yellow[900]}`,
          `${theme('colors').white['default']} 45%`,
          `${theme('colors').blue[100]} 65%`,
          `${theme('colors').blue[400]}`,
        ],
      },
    }),

    /**
     * Multi-column
     * @see https://github.com/hacknug/tailwindcss-multi-column
     */
    columnCount: [1, 2, 3],
    columnRuleStyle: [
      'none', 'hidden', 'dotted', 'dashed', 'solid',
      'double', 'groove', 'ridge', 'inset', 'outset',
    ],
    columnFill: ['auto', 'balance', 'balance-all'],
    columnSpan: ['none', 'all'],
    transitionProperty: {
      none: 'none',
      all: 'all',
      bg: 'background-color',
      color: 'text-color',
      border: 'border-color',
      default: 'background-color, border-color, color, fill, stroke, opacity, box-shadow, transform',
      colors: 'background-color, border-color, color, fill, stroke',
      opacity: 'opacity',
      shadow: 'box-shadow',
      transform: 'transform',
    },
    transitionTimingFunction: {
      linear: 'linear',
      in: 'cubic-bezier(0.4, 0, 1, 1)',
      out: 'cubic-bezier(0, 0, 0.2, 1)',
      'in-out': 'cubic-bezier(0.4, 0, 0.2, 1)',
      'ease-in-out': 'cubic-bezier(0.4, 0, 0.2, 1)',
    },
    transitionDuration: {
      default: '300ms',
      '75': '75ms',
      '100': '100ms',
      '150': '150ms',
      '200': '200ms',
      '300': '300ms',
      '500': '500ms',
      '700': '700ms',
      '1000': '1000ms',
      '2000': '2000ms',
      'slow': '2000ms',
    },
  },
  variants: {
    accessibility: ['responsive', 'focus'],
    alignContent: ['responsive'],
    alignItems: ['responsive'],
    alignSelf: ['responsive'],
    appearance: ['responsive'],
    backgroundAttachment: ['responsive'],
    backgroundColor: ['responsive', 'hover', 'focus'],
    backgroundPosition: ['responsive'],
    backgroundRepeat: ['responsive'],
    backgroundSize: ['responsive'],
    borderCollapse: ['responsive'],
    borderColor: ['responsive', 'hover', 'focus'],
    borderRadius: ['responsive'],
    borderStyle: ['responsive'],
    borderWidth: ['responsive'],
    boxShadow: ['responsive', 'hover', 'focus'],
    cursor: ['responsive', 'hover'],
    display: ['responsive'],
    fill: ['responsive'],
    flex: ['responsive'],
    flexDirection: ['responsive'],
    flexGrow: ['responsive'],
    flexShrink: ['responsive'],
    flexWrap: ['responsive'],
    float: ['responsive'],
    fontFamily: ['responsive'],
    fontSize: ['responsive'],
    fontSmoothing: ['responsive'],
    fontStyle: ['responsive'],
    fontWeight: ['responsive', 'hover', 'focus'],
    height: ['responsive'],
    inset: ['responsive'],
    justifyContent: ['responsive'],
    letterSpacing: ['responsive'],
    lineHeight: ['responsive'],
    listStylePosition: ['responsive'],
    listStyleType: ['responsive'],
    margin: ['responsive'],
    maxHeight: ['responsive'],
    maxWidth: ['responsive'],
    minHeight: ['responsive'],
    minWidth: ['responsive'],
    objectFit: ['responsive'],
    objectPosition: ['responsive'],
    opacity: ['responsive', 'hover', 'focus'],
    order: ['responsive'],
    outline: ['responsive', 'focus'],
    overflow: ['responsive'],
    padding: ['responsive'],
    placeholderColor: ['responsive', 'focus'],
    pointerEvents: ['responsive'],
    position: ['responsive'],
    resize: ['responsive'],
    stroke: ['responsive'],
    tableLayout: ['responsive'],
    textAlign: ['responsive'],
    textColor: ['responsive', 'hover', 'focus'],
    textDecoration: ['responsive', 'hover', 'focus'],
    textTransform: ['responsive'],
    userSelect: ['responsive'],
    verticalAlign: ['responsive'],
    visibility: ['responsive'],
    whitespace: ['responsive'],
    width: ['responsive'],
    wordBreak: ['responsive'],
    zIndex: ['responsive'],
    gap: ['responsive'],
    gridAutoFlow: ['responsive'],
    gridTemplateColumns: ['responsive'],
    gridColumn: ['responsive'],
    gridColumnStart: ['responsive'],
    gridColumnEnd: ['responsive'],
    gridTemplateRows: ['responsive'],
    gridRow: ['responsive'],
    gridRowStart: ['responsive'],
    gridRowEnd: ['responsive'],
    transform: ['responsive'],
    transformOrigin: ['responsive'],
    scale: ['responsive', 'hover', 'focus'],
    rotate: ['responsive', 'hover', 'focus'],
    translate: ['responsive', 'hover', 'focus'],
    skew: ['responsive', 'hover', 'focus'],
    transitionProperty: ['responsive', 'hover', 'focus'],
    transitionDuration: ['responsive', 'hover', 'focus'],
    transitionTimingFunction: ['responsive', 'hover', 'focus'],
    transitionDelay: ['responsive', 'hover', 'focus'],

    /** Gradients */
    backgroundImage: ['responsive', 'hover', 'focus'],
    linearGradients: ['responsive', 'hover', 'focus'],
    radialGradients: ['responsive', 'hover', 'focus'],
    conicGradients: ['responsive', 'hover', 'focus'],
    repeatingLinearGradients: ['responsive', 'hover', 'focus'],
    repeatingRadialGradients: ['responsive', 'hover', 'focus'],
    repeatingConicGradients: ['responsive', 'hover', 'focus'],

    /** Multi-column */
    columnCount: ['responsive'],
    columnGap: ['responsive'],
    columnWidth: ['responsive'],
    columnRuleColor: ['responsive'],
    columnRuleWidth: ['responsive'],
    columnRuleStyle: ['responsive'],
    columnFill: ['responsive'],
    columnSpan: ['responsive'],

    /** Blend modes */
    'isolation': ['responsive'],
    'mixBlendMode': ['responsive', 'hover'],
    'backgroundBlendMode': ['responsive', 'hover'],
  },
  corePlugins: {},
  plugins: [
    blendModes(),
    gradients(),
    multiColumn(),
  ],
});
