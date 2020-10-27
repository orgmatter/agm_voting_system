const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/admin/app.js', 'public/js/admin')
    .js('resources/js/shareholder/app.js', 'public/js/shareholder')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin/app.scss', 'public/css/admin')
    .sass('resources/sass/shareholder/app.scss', 'public/css/shareholder');

