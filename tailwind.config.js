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
                    DEFAULT: '#FA9C0D',
                },
                'darkHoney':{
                    DEFAULT: '#9C6208',
                },
                'king': {
                    // DEFAULT: '#241c18',
                    DEFAULT: '#3E2703',
                }
            },
        },
    },
    
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
