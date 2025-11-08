import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Mulish', 'ui-sans-serif', 'system-ui'],
                cave: ['Cave Story', 'sans-serif'],            
            },
            colors: {
                brand: {
                    default: '#4075CF',
                    light: '#96A0FF',
                    dark: '#004AAD',
                },
            },
        },
    },

    plugins: [forms],
};
