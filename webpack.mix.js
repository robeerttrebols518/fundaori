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
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'public/site/1/css/bootstrap.min.css',
    'public/site/1/rs-plugin/css/settings.css',
    'public/site/1/css/revo-slider/custom.css',
    'public/site/1/css/icons-fonts.css',
    'public/site/1/css/style.css',
    'public/site/1/css/animate.min.css'
], 'public/css/site1.css');



