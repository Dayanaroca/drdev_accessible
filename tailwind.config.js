/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './**/*.php',
    './assets/js/**/*.js',
    //'./build/input.css'
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['"Neue Haas Grotesk Display Pro"', 'sans-serif'],
      },
      colors: {
       primary: '#FB8500',
        secondary: '#149CBC',
        baseblack: '#0B0A0A',
        hovercolor: '#DC7500',
        color1: '#F8F8FC', 
        color2: '#242424',
        color3: '#0E3346',
        color4: '#EAEAEA',
        color5: '#4D4B4B',
        color6: '#C0C0C0',
        color7: '#111827',
        color8: '#F6F9FF',
        color9: '#EEF4FF',
        color10: '#222730',
        color11: '#CFD3D7',
        color12: '#D1D3D8',
        color13: 'rgba(249, 250, 251, 0.15)',
        color14: '#C0BEC2', 
        color15: '#E0E3EE',
      }
    },
    boxShadow: {
        custom: '0 0 4px 0 rgba(0, 0, 0, 0.25)'
      },
  },
   variants: {
    extend: {
      backgroundColor: ['active'],
      borderColor: ['focus-visible'],
      ringWidth: ['focus-visible'],
    }
  },
  plugins: [],
  corePlugins: { outline: false },
}