/** @type {import('tailwindcss').Config} */
export default {
  content: {
    relative: true,
    transform: (content) => content.replace(/taos:/g, ''),
    files: ['./src/*.{html,js}', "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",],
  },
  theme: {
    extend: {
      colors: {
        transparent: 'transparent',
        current: 'currentColor',
        'birutua': '#011d2a',
        'biru': '#055b82',
      },
    },
  },
  plugins: [ require('taos/plugin')
],
safelist: [
  '!duration-[0ms]',
  '!delay-[0ms]',
  'html.js :where([class*="taos:"]:not(.taos-init))'
],
}