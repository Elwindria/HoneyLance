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
                    // DEFAULT: '#FA970C',
                    DEFAULT: '#FFC96B',
                },
                'honey-dark':{
                    DEFAULT: '#AD6703',
                },
                'honey-light':{
                    // DEFAULT: '#FFA526',
                    DEFAULT: '#FFD285',
                },
                'king': {
                    // DEFAULT: '#00070F',
                    DEFAULT: '#070C12',
                },
                'king-light': {
                    // DEFAULT: '#0C9FFA',
                    DEFAULT: '#6BB3FF',
                }
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
