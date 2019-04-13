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
    .js('resources/js/single_custom.js', 'public/js')
    .js('resources/js/dashboard.js', 'public/js')
    .js('resources/js/buscaLocacao.js', 'public/js')
    .js('resources/js/jquery.mask.js', 'public/js')
    .js('resources/js/register.js', 'public/js')
    .js('resources/js/locacao.js', 'public/js')
    .js('resources/js/jquery-2.2.4.min.js', 'public/js')
    .js('resources/js/bootstrap.js', 'public/js')
    .js('resources/js/bootstrap-confirmation.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.sass('resources/sass/bootstrap.scss', 'public/css');