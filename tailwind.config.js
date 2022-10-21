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
                    DEFAULT: '#FFC96B',
                },
                'honey-dark':{
                    DEFAULT: '#AD6703',
                },
                'honey-light':{
                    DEFAULT: '#FFD285',
                },
                'king': {
                    DEFAULT: '#070C12',
                },
                'king-light': {
                    DEFAULT: '#6BB3FF',
                }
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
