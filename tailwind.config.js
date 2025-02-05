import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: 'var(--primary)',  // Custom primary color
                secondary: 'var(--secondary)',  // Custom secondary color
                tertiary: 'var(--tertiary)',  // Custom tertiary color
            },
            borderColor: theme => ({
                ...theme('colors'),
                primary: 'var(--primary)',  // Border color from custom variables
                secondary: 'var(--secondary)',  // Border color for light mode
              }),
        },
    },
    plugins: [],
};
