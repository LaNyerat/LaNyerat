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

mix.styles([
    'public/ln-content/themes/miniblog/assets/css/bootstrap.min.css',
    'public/ln-content/themes/miniblog/assets/css/magnific-popup.css',
    'public/ln-content/themes/miniblog/assets/css/jquery-ui.css',
    'public/ln-content/themes/miniblog/assets/css/owl.carousel.min.css',
    'public/ln-content/themes/miniblog/assets/css/owl.theme.default.min.css',
    'public/ln-content/themes/miniblog/assets/css/bootstrap-datepicker.css',
    'public/ln-content/themes/miniblog/assets/fonts/flaticon/font/flaticon.css',
    'public/ln-content/themes/miniblog/assets/css/aos.css',
    'public/ln-content/themes/miniblog/assets/css/style.css'
], 'public/css/frontend/main.min.css')
.scripts([
    'public/ln-content/themes/miniblog/assets/js/jquery-3.3.1.min.js',
    'public/ln-content/themes/miniblog/assets/js/jquery-migrate-3.0.1.min.js',
    'public/ln-content/themes/miniblog/assets/js/jquery-ui.js',
    'public/ln-content/themes/miniblog/assets/js/popper.min.js',
    'public/ln-content/themes/miniblog/assets/js/bootstrap.min.js',
    'public/ln-content/themes/miniblog/assets/js/owl.carousel.min.js',
    'public/ln-content/themes/miniblog/assets/js/jquery.stellar.min.js',
    'public/ln-content/themes/miniblog/assets/js/jquery.countdown.min.js',
    'public/ln-content/themes/miniblog/assets/js/jquery.magnific-popup.min.js',
    'public/ln-content/themes/miniblog/assets/js/bootstrap-datepicker.min.js',
    'public/ln-content/themes/miniblog/assets/js/aos.js',
    'public/ln-content/themes/miniblog/assets/js/main.js'
], 'public/js/frontend/main.min.js').version();
