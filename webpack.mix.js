/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

const mix = require('laravel-mix');

require('mix-tailwindcss');
require('laravel-mix-polyfill');

mix
    .js(['resources/js/app.js'], 'public/js/app.js').vue()
    .babel('public/js/app.js', 'public/js/app.es5.js')
    .sass('resources/scss/styles.scss', 'public/css/style.css')
    .tailwind();

mix
    .browserSync({
        proxy: 'http://0.0.0.0/',
        open: false,
        files: [
            'resources/scss/*.scss', 
            'resources/js/*.js',
            'resources/views/*'
        ]
    });