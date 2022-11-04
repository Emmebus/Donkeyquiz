const plugin = require('tailwindcss/plugin')

module.exports = {
  corePlugins: {
    container: false
  },

  content: [
    './resources/js/**/*.{vue, js, ts, jsx, tsx}',
    './resources/views/**/*.php'
  ],
  safelist: ['bg-purple', 'bg-green', 'hidden'],
  theme: {
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
      '2xl': '1440px'
    },

    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      white: '#fff',
      trueblack: '#000',
      black: '#202E55',
      grey: '#EEEEEE',
      blue: '#000064',
      purple: '#7678ED',
      green: '#00FFC4',

    },

    fontSize: {
      10: '0.625rem',
      14: '0.875rem',
      16: '1rem',
      20: '1.25rem',
      24: '1.5rem',
      36: '2.25rem',
      48: ['3rem', '3rem'],
    },

    fontFamily: {
      poppins: ['poppins', 'serif']
    },

    extend: {
      // ..
    }
  },
  plugins: [
    // ..
  ]
}
