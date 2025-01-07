/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    fontSize: {
        xs: ['12px', '16px'],
        sm: ['14px', '20px'],
        base: ['16px', '19.5px'],
        lg: ['18px', '21.94px'],
        xl: ['20px', '24.38px'],
        '2xl': ['24px', '29.26px'],
        '3xl': ['28px', '50px'],
        '4xl': ['48px', '58px'],
        '8xl': ['96px', '106px']
    },
    extend: {
        fontFamily:{
            poppins:['Poppins', 'sans-serif'],
            palanquin: ['Palanquin', 'sans-serif'],
            montserrat: ['Montserrat', 'sans-serif'],
            mono: ['Roboto Mono', 'monospace'],
        },
        animation:{
            'alert-show': 'showAlert 1s ease forwards',
            'alert-hide': 'hideAlert 1s ease forwards',
        },
        keyframes:{
            showAlert: {
                '0%': { transform: 'translateX(100%)' },
                '40%': { transform: 'translateX(-10%)' },
                '80%': { transform: 'translateX(0%)' },
                '100%': { transform: 'translateX(-10px)' },
            },
            hideAlert: {
                '0%': { transform: 'translateX(-10px)' },
                '40%': { transform: 'translateX(0%)' },
                '80%': { transform: 'translateX(-10%)' },
                '100%': { transform: 'translateX(100%)' },
            },
        },
        colors: {
            'primary': "#ECEEFF",
            "coral-red": "#FF6452",
            "slate-gray": "#6D6D6D",
            "pale-blue": "#F5F6FF",
            "white-400": "rgba(255, 255, 255, 0.80)"
          },
          boxShadow: {
            '3xl': '0 10px 40px rgba(0, 0, 0, 0.1)'
          },
          backgroundImage: {
            'hero': "url('assets/images/collection-background.svg')",
            'card': "url('assets/images/thumbnail-background.svg')",
          },
          screens: {
            "wide": "1440px"
          }
    },
  },
  plugins: [

  ],
}

