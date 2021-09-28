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
.js('resources/js/bootstrap.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/popUpJQ.scss', 'public/css/popUpJQ.css')
    .sass('resources/sass/main.scss', 'public/css/main.css')
    .sass('resources/sass/cubic.scss', 'public/css/cubic.css');