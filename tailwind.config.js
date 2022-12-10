/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      'index.php',
      './src/**/*.php'
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
