/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors: {
      'white': '#ffffff',
      'myblue': {
        0: '#EAF4F8',
        1: '#4EB3D3',
        2: '#2B8CBE',
        3: '#225EA8',
        4: '#084081',
        5: '#081D58',
      },
      'mygrey': {
        0 : '#F5F5F5',
        1: '#E6E6E6',
        2: '#CCCCCC',
        3: '#8F8F8F',
      },
      'black': '#131313',
      'myred': {
        1: '#C22639',
        2: '#E45465',
      },
      'myellow': {
        1: '#D7B749'
      }
    },
    extend: {},
  },
  plugins: [],
}