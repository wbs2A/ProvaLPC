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
mix.js('resources/js/vendorTemplate/js/jquery-2.2.4.min.js', 'public/js');
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
mix.js('resources/js/vendorTemplate/js/easing.min.js', 'public/js').sass('resources/sass/animate.min.scss', 'public/css');
mix.js('resources/js/vendorTemplate/js/hoverIntent.js', 'public/js').sass('resources/sass/font-awesome.min.scss', 'public/css');
mix.js('resources/js/vendorTemplate/js/imagesloaded.pkgd.min.js', 'public/js').sass('resources/sass/jquery.DonutWidget.min.scss', 'public/css');
mix.js('resources/js/vendorTemplate/js/jquery.ajaxchimp.min.js', 'public/js').sass('resources/sass/jquerysctipttop.scss', 'public/css');
mix.js('resources/js/vendorTemplate/js/jquery.counterup.min.js', 'public/js').sass('resources/sass/linearicons.scss', 'public/css');
mix.js('resources/js/vendorTemplate/js/jquery.magnific-popup.min.js', 'public/js').sass('resources/sass/magnific-popup.scss', 'public/css');
mix.js('resources/js/vendorTemplate/js/jquery.nice-select.min.js', 'public/js').sass('resources/sass/nice-select.scss', 'public/css');
mix.js('resources/js/vendorTemplate/js/jquery.sticky.js', 'public/js');
mix.js('resources/js/vendorTemplate/js/justified.min.js', 'public/js');
mix.js('resources/js/vendorTemplate/js/mail-script.js', 'public/js');
mix.js('resources/js/vendorTemplate/js/bootstrap.min.js', 'public/js');
mix.js('resources/js/vendorTemplate/js/owl.carousel.min.js', 'public/js').sass('resources/sass/owl.carousel.scss', 'public/css');
mix.js('resources/js/vendorTemplate/js/parallax.min.js', 'public/js');
mix.js('resources/js/vendorTemplate/js/slick.js', 'public/js');
mix.js('resources/js/vendorTemplate/js/superfish.js', 'public/js');
mix.js('resources/js/vendorTemplate/js/waypoints.min.js', 'public/js');
mix.js('resources/js/vendorTemplate/js/main.js', 'public/js').sourceMaps();