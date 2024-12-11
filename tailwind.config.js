/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        animation: {
            'fade-in-out': 'fadeInOut 3s ease-in-out',
        },
        keyframes: {
            fadeInOut: {
                '0%': { opacity: '0', transform: 'translateY(-20px)' },
                '10%': { opacity: '1', transform: 'translateY(0)' },
                '90%': { opacity: '1', transform: 'translateY(0)' },
                '100%': { opacity: '0', transform: 'translateY(-20px)' },
            },
        },
    },
  },
  plugins: [
      require('tailwind-scrollbar'),
  ],
}

