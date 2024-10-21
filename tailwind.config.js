import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
        './node_modules/highlight.js/**/*',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary-dark': '#000000', // Black
                'primary-gray': '#111111', // Very dark gray
                'secondary-gray': '#232323', // Dark gray
                'tertiary-gray': '#343434', // Medium dark gray
                'primary-white': '#FFFFFF', // White
                'custom-background': '#09090b', // HSL(240, 10%, 3.9%) equivalent in hex
                'border-color': '#28282b',
                'muted-color' : '#868686',
            },
        },
    },

    plugins: [
        forms,
        require("daisyui")
    ],
};
