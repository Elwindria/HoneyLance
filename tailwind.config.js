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
                    '100': 'rgba(250, 156, 13, 0.1)',
                    '200': 'rgba(250, 156, 13, 0.2)',
                    '300': 'rgba(250, 156, 13, 0.3)',
                    '400': 'rgba(250, 156, 13, 0.4)',
                    '500': 'rgba(250, 156, 13, 0.5)',
                    '600': 'rgba(250, 156, 13, 0.6)',
                    '700': 'rgba(250, 156, 13, 0.7)',
                    '800': 'rgba(250, 156, 13, 0.8)',
                    '900': 'rgba(250, 156, 13, 0.9)',
                    DEFAULT: 'rgba(250, 156, 13, 1)',
                },
                'darkHoney':{
                    '100': 'rgba(194, 96, 1, 0.1)',
                    '200': 'rgba(194, 96, 1, 0.2)',
                    '300': 'rgba(194, 96, 1, 0.3)',
                    '400': 'rgba(194, 96, 1, 0.4)',
                    '500': 'rgba(194, 96, 1, 0.5)',
                    '600': 'rgba(194, 96, 1, 0.6)',
                    '700': 'rgba(194, 96, 1, 0.7)',
                    '800': 'rgba(194, 96, 1, 0.8)',
                    '900': 'rgba(194, 96, 1, 0.9)',
                    DEFAULT: 'rgba(194, 96, 1, 1)',
                }
            },
        },
    },
    
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
