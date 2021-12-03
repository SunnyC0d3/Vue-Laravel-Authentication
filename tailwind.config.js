module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    fontFamily: {
      main: ['Montserrat', 'sans-serif'],
      secondary: ['Karla', 'serif'],
    },
    extend: {
      colors: {
        gray:         '#eeeeee',
        purple:       '#7961EE',
        dark_purple:  '#4A00FF',
        white:        '#FFFFFF',
        black:        '#000000'
      },
    },
  },
  plugins: [],
}
