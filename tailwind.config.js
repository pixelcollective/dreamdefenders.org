const gradients = require('tailwindcss-gradients');

module.exports = {
  prefix: '',
  important: false,
  separator: ':',
  theme: {
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
    },
    colors: {
      transparent: 'transparent',
      black: {
        default: 'rgba(0, 0, 0, 1)',
        900:     'rgba(0, 0, 0, .9)',
        800:     'rgba(0, 0, 0, .8)',
        700:     'rgba(0, 0, 0, .7)',
        600:     'rgba(0, 0, 0, .6)',
        500:     'rgba(0, 0, 0, .5)',
        400:     'rgba(0, 0, 0, .4)',
        300:     'rgba(0, 0, 0, .3)',
        200:     'rgba(0, 0, 0, .2)',
        100:     'rgba(0, 0, 0, .1)',
        50:      'rgba(0, 0, 0, .05)',
        25:      'rgba(0, 0, 0, .025)',
        10:      'rgba(0, 0, 0, .01)',
      },
      white:  {
        default: 'rgba(255, 255, 255,  1)',
        900:     'rgba(255, 255, 255, .9)',
        800:     'rgba(255, 255, 255, .8)',
        700:     'rgba(255, 255, 255, .7)',
        600:     'rgba(255, 255, 255, .6)',
        500:     'rgba(255, 255, 255, .5)',
        400:     'rgba(255, 255, 255, .4)',
        300:     'rgba(255, 255, 255, .3)',
        200:     'rgba(255, 255, 255, .2)',
        100:     'rgba(255, 255, 255, .1)',
        50:      'rgba(255, 255, 255, .05)',
        25:      'rgba(255, 255, 255, .025)',
        10:      'rgba(255, 255, 255, .01)',
      },
      gray: {
        default: 'rgba(26, 32, 44,  1)',
        100:     'rgba(26, 32, 44, .1)',
        200:     'rgba(26, 32, 44, .2)',
        300:     'rgba(26, 32, 44, .3)',
        400:     'rgba(26, 32, 44, .4)',
        500:     'rgba(26, 32, 44, .5)',
        600:     'rgba(26, 32, 44, .6)',
        700:     'rgba(26, 32, 44, .7)',
        800:     'rgba(26, 32, 44, .8)',
        900:     'rgba(26, 32, 44, .9)',
      },
      yellow: {
        default: 'rgba(253, 225, 53,  1)',
        100:     'rgba(253, 225, 53, .1)',
        200:     'rgba(253, 225, 53, .2)',
        300:     'rgba(253, 225, 53, .3)',
        400:     'rgba(253, 225, 53, .4)',
        500:     'rgba(253, 225, 53, .5)',
        600:     'rgba(253, 225, 53, .6)',
        700:     'rgba(253, 225, 53, .7)',
        800:     'rgba(253, 225, 53, .8)',
        900:     'rgba(253, 225, 53, .9)',
      },
      blue: {
        default: 'rgba(91, 214, 255,  1)',
        100:     'rgba(91, 214, 255, .1)',
        200:     'rgba(91, 214, 255, .2)',
        300:     'rgba(91, 214, 255, .3)',
        400:     'rgba(91, 214, 255, .4)',
        500:     'rgba(91, 214, 255, .5)',
        600:     'rgba(91, 214, 255, .6)',
        700:     'rgba(91, 214, 255, .7)',
        800:     'rgba(91, 214, 255, .8)',
        900:     'rgba(91, 214, 255, .9)',
      },
    },
    spacing: {
      px: '1px',
      '0': '0',
      '1': '0.25rem',
      '2': '0.5rem',
      '3': '0.75rem',
      '4': '1rem',
      '5': '1.25rem',
      '6': '1.5rem',
      '8': '2rem',
      '10': '2.5rem',
      '12': '3rem',
      '16': '4rem',
      '20': '5rem',
      '24': '6rem',
      '32': '8rem',
      '40': '10rem',
      '48': '12rem',
      '64': '16rem',
      '96': '24rem',
      '128': '32rem',
    },
    backgroundColor: theme => theme('colors'),
    backgroundPosition: {
      bottom: 'bottom',
      center: 'center',
      left: 'left',
      'left-bottom': 'left bottom',
      'left-top': 'left top',
      right: 'right',
      'right-bottom': 'right bottom',
      'right-top': 'right top',
      top: 'top',
    },
    backgroundSize: {
      auto: 'auto',
      cover: 'cover',
      contain: 'contain',
    },
    borderColor: theme => ({
      ...theme('colors'),
      default: theme('colors.gray.300', 'currentColor'),
    }),
    borderRadius: {
      none: '0',
      sm: '0.125rem',
      default: '0.25rem',
      lg: '0.5rem',
      full: '9999px',
    },
    borderWidth: {
      default: '1px',
      '0': '0',
      '2': '2px',
      '4': '4px',
      '8': '8px',
    },
    boxShadow: {
      default: '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)',
      md: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
      lg: '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
      xl: '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
      '2xl': '0 25px 50px -12px rgba(0, 0, 0, 0.25)',
      inner: 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.06)',
      outline: '0 0 0 3px rgba(66, 153, 225, 0.5)',
      none: 'none',
    },
    container: {
      center: true,
    },
    cursor: {
      auto: 'auto',
      default: 'default',
      pointer: 'pointer',
      wait: 'wait',
      text: 'text',
      move: 'move',
      'not-allowed': 'not-allowed',
    },
    fill: {
      current: 'currentColor',
    },
    flex: {
      '1': '1 1 0%',
      auto: '1 1 auto',
      initial: '0 1 auto',
      none: 'none',
    },
    flexGrow: {
      '0': '0',
      default: '1',
    },
    flexShrink: {
      '0': '0',
      default: '1',
    },
    fontFamily: {
      sans: [
        '-apple-system',
        'BlinkMacSystemFont',
        '"Segoe UI"',
        'Roboto',
        '"Helvetica Neue"',
        'Arial',
        '"Noto Sans"',
        'sans-serif',
        '"Apple Color Emoji"',
        '"Segoe UI Emoji"',
        '"Segoe UI Symbol"',
        '"Noto Color Emoji"',
      ],
      display: [
        'Roboto Condensed',
        '-apple-system',
        'BlinkMacSystemFont',
        '"Segoe UI"',
        'Roboto',
        '"Helvetica Neue"',
        'Arial',
        '"Noto Sans"',
        'sans-serif',
        '"Apple Color Emoji"',
        '"Segoe UI Emoji"',
        '"Segoe UI Symbol"',
        '"Noto Color Emoji"',
      ],
    },
    fontSize: {
      xs: '0.75rem',
      sm: '0.875rem',
      base: '1rem',
      lg: '1.125rem',
      xl: '1.25rem',
      '2xl': '1.5rem',
      '3xl': '1.875rem',
      '4xl': '2.25rem',
      '5xl': '3rem',
      '6xl': '4rem',
    },
    fontWeight: {
      hairline: '100',
      thin: '200',
      light: '300',
      normal: '400',
      medium: '500',
      semibold: '600',
      bold: '700',
      extrabold: '800',
      black: '900',
    },
    height: theme => ({
      auto: 'auto',
      ...theme('spacing'),
      full: '100%',
      screen: '100vw',
    }),
    inset: {
      '0': '0',
      auto: 'auto',
    },
    letterSpacing: {
      tighter: '-0.05em',
      tight: '-0.025em',
      normal: '0',
      wide: '0.025em',
      wider: '0.05em',
      widest: '0.1em',
    },
    lineHeight: {
      none: '1',
      tight: '1.25',
      snug: '1.375',
      normal: '1.5',
      relaxed: '1.625',
      loose: '2',
    },
    listStyleType: {
      none: 'none',
      disc: 'disc',
      decimal: 'decimal',
    },
    margin: (theme, { negative }) => ({
      auto: 'auto',
      ...theme('spacing'),
      ...negative(theme('spacing')),
    }),
    maxHeight: theme => ({
      auto: 'auto',
      ...theme('spacing'),
      full: '100%',
      screen: '100vh',
    }),
    maxWidth: {
      xs: '20rem',
      sm: '24rem',
      md: '28rem',
      lg: '32rem',
      xl: '36rem',
      '2xl': '42rem',
      '3xl': '48rem',
      '4xl': '56rem',
      '5xl': '64rem',
      '6xl': '72rem',
      full: '100%',
    },
    minHeight: {
      '0': '0',
      full: '100%',
      screen: '100vh',
    },
    minWidth: {
      '0': '0',
      full: '100%',
    },
    objectPosition: {
      'bottom':       'bottom',
      'center':       'center',
      'left':         'left',
      'left-bottom':  'left bottom',
      'left-top':     'left top',
      'right':        'right',
      'right-bottom': 'right bottom',
      'right-top':    'right top',
      'top':          'top',
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
      last:  '9999',
      none:  '0',
      '1':   '1',
      '2':   '2',
      '3':   '3',
      '4':   '4',
      '5':   '5',
      '6':   '6',
      '7':   '7',
      '8':   '8',
      '9':   '9',
      '10':  '10',
      '11':  '11',
      '12':  '12',
    },
    padding: theme => theme('spacing'),
    placeholderColor: theme => theme('colors'),
    stroke: {
      current: 'currentColor',
    },
    textColor: theme => theme('colors'),
    width: theme => ({
      auto: 'auto',
      ...theme('spacing'),
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
    }),
    zIndex: {
      auto: 'auto',
      '0': '0',
      '10': '10',
      '20': '20',
      '30': '30',
      '40': '40',
      '50': '50',
    },
    /**
     * Gradients
     * @see https://github.com/benface/tailwindcss-gradients
     */
    linearGradients: theme => ({
      colors: {
        'white-yellow': [
          `${theme('colors').white['defeault']}`,
          `${theme('colors').yellow[400]}`,
        ],
        'white-black':  [
          `${theme('colors').white['defeault']}`,
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
     * Transitions
     * @see https://github.com/benface/tailwindcss-transitions
     */
    transitionProperty: {
      'none': 'none',
      'all': 'all',
      'color': 'color',
      'bg': 'background-color',
      'border': 'border-color',
      'colors': [
        'color',
        'background-color',
        'border-color'
      ],
      'opacity': 'opacity',
      'transform': 'transform',
    },
    transitionDuration: {
      'default': '250ms',
      '0': '0ms',
      '100': '100ms',
      '250': '250ms',
      '500': '500ms',
      '750': '750ms',
      '1000': '1000ms',
    },
    transitionTimingFunction: {
      'default': 'ease',
      'linear': 'linear',
      'ease': 'ease',
      'ease-in': 'ease-in',
      'ease-out': 'ease-out',
      'ease-in-out': 'ease-in-out',
    },
    transitionDelay: {
      'default': '0ms',
      '0': '0ms',
      '100': '100ms',
      '250': '250ms',
      '500': '500ms',
      '750': '750ms',
      '1000': '1000ms',
    },
    willChange: {
      'auto': 'auto',
      'scroll': 'scroll-position',
      'contents': 'contents',
      'opacity': 'opacity',
      'transform': 'transform',
    },
  },
  variants: {
    accessibility: [`responsive`, `focus`],
    alignContent: [`responsive`],
    alignItems: [`responsive`],
    alignSelf: [`responsive`],
    appearance: [`responsive`],
    backgroundAttachment: [`responsive`],
    backgroundColor: [`responsive`, `hover`, `focus`],
    backgroundPosition: [`responsive`],
    backgroundRepeat: [`responsive`],
    backgroundSize: [`responsive`],
    borderCollapse: [`responsive`],
    borderColor: [`responsive`, `hover`, `focus`],
    borderRadius: [`responsive`],
    borderStyle: [`responsive`],
    borderWidth: [`responsive`],
    boxShadow: [`responsive`, `hover`, `focus`],
    cursor: [`responsive`, `hover`],
    display: [`responsive`],
    fill: [`responsive`],
    flex: [`responsive`],
    flexDirection: [`responsive`],
    flexGrow: [`responsive`],
    flexShrink: [`responsive`],
    flexWrap: [`responsive`],
    float: [`responsive`],
    fontFamily: [`responsive`],
    fontSize: [`responsive`],
    fontSmoothing: [`responsive`],
    fontStyle: [`responsive`],
    fontWeight: [`responsive`, `hover`, `focus`],
    height: [`responsive`],
    inset: [`responsive`],
    justifyContent: [`responsive`],
    letterSpacing: [`responsive`],
    lineHeight: [`responsive`],
    listStylePosition: [`responsive`],
    listStyleType: [`responsive`],
    margin: [`responsive`],
    maxHeight: [`responsive`],
    maxWidth: [`responsive`],
    minHeight: [`responsive`],
    minWidth: [`responsive`],
    objectFit: [`responsive`],
    objectPosition: [`responsive`],
    opacity: [`responsive`, `hover`, `focus`],
    order: [`responsive`],
    outline: [`responsive`, `focus`],
    overflow: [`responsive`],
    padding: [`responsive`],
    placeholderColor: [`responsive`, `focus`],
    pointerEvents: [`responsive`],
    position: [`responsive`],
    resize: [`responsive`],
    stroke: [`responsive`],
    tableLayout: [`responsive`],
    textAlign: [`responsive`],
    textColor: [`responsive`, `hover`, `focus`],
    textDecoration: [`responsive`, `hover`, `focus`],
    textTransform: [`responsive`],
    userSelect: [`responsive`],
    verticalAlign: [`responsive`],
    visibility: [`responsive`],
    whitespace: [`responsive`],
    width: [`responsive`],
    wordBreak: [`responsive`],
    zIndex: [`responsive`],
    /** Transitions */
    backgroundImage:          [`responsive`],
    linearGradients:          [`responsive`],
    radialGradients:          [`responsive`],
    conicGradients:           [`responsive`],
    repeatingLinearGradients: [`responsive`],
    repeatingRadialGradients: [`responsive`],
    repeatingConicGradients:  [`responsive`],
    /** Gradients */
    transitionProperty:       [`responsive`],
    transitionDuration:       [`responsive`],
    transitionTimingFunction: [`responsive`],
    transitionDelay:          [`responsive`],
    willChange:               [`responsive`],
  },
  corePlugins: {},
  plugins: [
    gradients(),
    require('tailwindcss-transitions')(),
  ],
}
