/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  purge: [
    'index.php',
    './src/**/*.{php, html}'
  ],
  content: [
    'index.php',
    './src/**/*.{php, html}'
  ],
  theme: {
    extend: {
      colors: {
        'prussianBlue': '#003049',
        'maximumRed': '#D62828',
        'orange': '#F77F00',
        'maximumYellowRed': '#FCBF49',
        'lemonMeringue': '#EAE2B7',
      },
    },
  },
  plugins: [],
}
