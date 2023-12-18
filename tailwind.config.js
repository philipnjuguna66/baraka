const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                poppins: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    950 :  "#0095e7",
                    900 :  "#0095e7",
                    800 :  "#0095e7",
                    700 :  "#0095e7",
                    600 :  "#0095e7",
                    500 :  "#0095e7",
                    400 :  "#0095e7",
                },
                secondary: {
                    900 :  "#d61523",
                    800 :  "#d61523",
                    700 :  "#d61523",
                    600 :  "#d61523",
                    500 :  "#d61523",
                    400 :  "#d61523",
                },
                danger: colors.rose,
                warning: colors.yellow
            }
        },
    },

    plugins: [
        require('flowbite/plugin') ,
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
};
