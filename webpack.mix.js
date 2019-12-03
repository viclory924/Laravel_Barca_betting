let mix = require('laravel-mix');
let webpack = require('webpack');

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
mix
    // .copy('resources/assets/js/pace.min.js', 'public/js')
    // .copy('resources/assets/css/style.css', 'public/css')
    // .copy('resources/assets/css/custom.css', 'public/css')
    // .copy('resources/assets/fonts/','public/fonts', false)
    // .copy('resources/assets/img/','public/img', false)
    //
    .copy('resources/assets/js/old_layout/main.js', 'public/js')
    .copy('resources/assets/js/old_layout/jquery-3.3.1.min.js', 'public/js')
    .copy('resources/assets/js/old_layout/jquery.cookie.js', 'public/js')
    .copy('resources/assets/js/old_layout/iframeResizer.min.js', 'public/js')
    .copy('resources/assets/js/old_layout/jquery.date-dropdowns.js', 'public/js')
    .copy('resources/assets/js/old_layout/jquery.responsImg.min.js', 'public/js')
    .copy('resources/assets/js/old_layout/sticky.min.js', 'public/js')
    .copy('resources/assets/js/old_layout/swiper.min.js', 'public/js')
    .copy('resources/assets/js/old_layout/tabs.min.js', 'public/js')
    .copy('resources/assets/js/old_layout/modernizr.custom.js', 'public/js')
    .copy('resources/assets/js/old_layout/select2.full.min.js', 'public/js')
    .copy('resources/assets/js/old_layout/jquery.validate.js', 'public/js')
    .copy('resources/assets/js/old_layout/jquery.validate.messages_ru.js', 'public/js')
    .copy('resources/assets/js/old_layout/validation.js', 'public/js')
    .copy('resources/assets/js/old_layout/depo.js', 'public/js')


    .sass('resources/assets/sass/app.scss', 'public/css')

    /** new layout **/
    .copy('resources/assets/css/', 'public/css')
    .copy('resources/assets/js/', 'public/js')
    .copy('resources/assets/img/','public/img')
    .copy('resources/assets/fonts/','public/fonts', false)
;
//.js('resources/assets/js/validation.js', 'public/js')
    //.extract(['jquery', 'bootstrap', 'isotope-layout'])
    //.sass('resources/assets/sass/app.scss', 'public/css');
