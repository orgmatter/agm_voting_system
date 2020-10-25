const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |

 .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

 */

mix.js('resources/js/admin.js', 'public/js')
    .js('resources/js/shareholder.js', 'public/js')
    .sass('resources/sass/admin.sass', 'public/css')
    .sass('resources/sass/shareholder.sass', 'public/css');
