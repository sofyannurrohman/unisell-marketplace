const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  mode: 'jit',

  purge: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],

  theme: {
    extend: {
      colors: {
        primary: {
          100: '#3C94FF',
          90: '#509FFF',
          70: '#77B4FF',
          50: '#9DC9FF',
          30: '#C5DFFF',
          10: '#EBF4FF',
        },
        secondary: {
          100: '#FF7115',
          70: '#FF9C5B',
          50: '#FFB88A',
          30: '#FFD4B9',
          10: '#FFF1E8',
        },
        accent: {
          100: '#FAD961',
          90: '#FADD71',
          70: '#FBE490',
          50: '#FCECB0',
          30: '#FEF4D0',
          10: '#FFFBEF',
        },
        greyscale: {
          title: '#222222',
          body: '#666666',
          placeholder: '#CFCFCF',
          stroke: '#E6E6E6',
          label: '#F8F8F8',
          'off-white': '#FFF',
        },
        success: '#66BD50',
        warning: '#EBBC46',
        error: '#DE4841',
      },
      fontFamily: {
        sans: ['Inter', ...defaultTheme.fontFamily.sans],
      },
      fontSize: {
        sm: ['0.85rem', '1.2rem'],
        base: ['1rem', '1.2rem'],
        lg: ['1.177rem', '1.2rem'],
        xl: ['1.333rem', '1.2rem'],
        '2xl': ['1.5rem', '1.2rem'],
        '3xl': ['1.777rem', '1.2rem'],
      },
    },
  },

  variants: {
    extend: {
      opacity: ['disabled'],
    },
  },

  plugins: [
    require('@tailwindcss/forms')
  ],
};
