import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {

    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',

        './node_modules/flowbite/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
 keyframes: {
                marqueeLeft: {
                    '0%': { transform: 'translateX(0)' },
                    '100%': { transform: 'translateX(-50%)' },
                },
                marqueeRight: {
                    '0%': { transform: 'translateX(-50%)' },
                    '100%': { transform: 'translateX(0)' },
                },
            },
            animation: {
                'marquee-left': 'marqueeLeft 28s linear infinite',
                'marquee-right': 'marqueeRight 30s linear infinite',
            },
            boxShadow: {
                'soft-xl': '0 20px 60px rgba(2, 8, 23, 0.14)',
            },
            
            
        },
    },

    plugins: [
        forms,


        require('flowbite/plugin'),
    ],
};
