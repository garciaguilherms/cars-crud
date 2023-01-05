/** @type {import('tailwindcss').Config} */

module.exports = {
  content: ['./resources/views/**/*.blade.php', './resources/js/**/*.vue', './src/**/*.{html,js}'],
  theme: {
    extend: {
      opacity: ['disabled'],
      cursor: ['disabled'],
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
