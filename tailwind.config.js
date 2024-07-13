/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/*/*.blade.php",
    "./resources/**/**",
  ],
  theme: {
    extend: {
      fontFamily: {
        Montserrat: ["Montserrat", 'sans-serif'],
      },
    },
  },
  plugins: [
      
    ],
}

