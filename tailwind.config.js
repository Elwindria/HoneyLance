const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'honey':{
                    DEFAULT: '#FA970C',
                },
                'honey-dark':{
                    DEFAULT: '#AD6703',
                },
                'honey-light':{
                    DEFAULT: '#FFA526',
                },
                'king': {
                    DEFAULT: '#00070F',
                },
                'king-light': {
                    DEFAULT: '#0C9FFA',
                }
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
