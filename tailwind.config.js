/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: 'jit',
    purge: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    content: [],
    theme: {
        extend: {},
    },
    plugins: [],
}
