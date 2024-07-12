import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'white': '#FFFFFF',
                'black': '#101010',
                'misty-rose': '#FBE0D9',
                'tea-rose': '#ECB7B3',
                'sky-blue': '#C8D9E6',
                'air-blue': '#7c9bb3',
                'platinium': '#A4B8AC',
                'ash-gray': '#DCE1DA'
            },
        },
    },

    plugins: [forms, typography],
};
