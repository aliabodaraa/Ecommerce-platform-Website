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
    .sass('resources/sass/main_style.scss', 'public/css/main_style.css')
    .sass('resources/sass/user_style.scss', 'public/css/user_style.css')
    .sass('resources/sass/cubic.scss', 'public/css/cubic.css');
    //.sass('resources/sass/swiperHome.scss', 'public/css/swiperHome.css');
    // .sass('resources/js/swiperHome.scss', 'public/assets/js/swiperHome.css');