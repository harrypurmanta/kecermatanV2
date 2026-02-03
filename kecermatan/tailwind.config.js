/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.php", "./app/Controllers/**/*.php"],
  theme: {
    extend: {
      colors : {
        one : '#98ABEE',
        two : '#201658',
        three : '#F9E8C9',
        four : '#1D24CA',
    }
  },
},
  plugins: [],
}

