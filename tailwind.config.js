/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  content: [
    'index.php',
    './src/**/*.{php, html}'
  ],
  theme: {
    extend: {
      colors: {
        'lavender': {
          '50': '#faf6fe',
          '100': '#f3eafd',
          '200': '#e9d9fb',
          '300': '#d8bbf7',
          '400': '#c190f0',
          'main': '#b47aea',
          '600': '#9345d8',
          '700': '#7e33bd',
          '800': '#6b2f9a',
          '900': '#57277c',
        },
        'burnt-sienna': {
          '50': '#fef3ee',
          '100': '#fce4d8',
          '200': '#f9c5af',
          '300': '#f49e7d',
          'main': '#ef6c49',
          '500': '#eb4624',
          '600': '#dc2e1a',
          '700': '#b62018',
          '800': '#911c1b',
          '900': '#751a19',
        },
        'thatch': {
          '50': '#f9f7f7',
          '100': '#f3eeed',
          '200': '#eae1de',
          '300': '#dacbc7',
          'main': '#bea69f',
          '500': '#ac8f87',
          '600': '#94776e',
          '700': '#7b615a',
          '800': '#67534d',
          '900': '#584944',
        },
      },
    },
  },
  plugins: [],
}
