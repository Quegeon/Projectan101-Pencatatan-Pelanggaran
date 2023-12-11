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
        'ins':'linear-gradient(to left, rgb(217, 70, 239), rgb(220, 38, 38), rgb(251, 146, 60))',
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