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

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
   'public/css/css-api.css',
   'public/vendor/select2/dist/css/select2.min.css',
   'public/vendor/bootstrap-daterangepicker/daterangepicker.css',
   'public/vendor/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
   'public/vendor/dropzone/dist/dropzone.css',
   'public/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css',
   'public/vendor/fullcalendar/dist/fullcalendar.min.css',
   'public/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css',
   'public/vendor/slick-carousel/slick/slick.css',
   'public/icon_fonts_assets/typicons/typicons.css',
   'public/icon_fonts_assets/entypo/style.css',
   'public/css/main5739.css',
   'public/css/custom.css'
], 'public/css/app-bc.css');

mix.scripts([
   'public/vendor/jquery/dist/jquery.min.js',
   'public/vendor/popper.js/dist/umd/popper.min.js',
   'public/vendor/moment/moment.js',
   'public/vendor/chart.js/dist/Chart.min.js',
   'public/vendor/select2/dist/js/select2.full.min.js',
   'public/vendor/jquery-bar-rating/dist/jquery.barrating.min.js',
   'public/vendor/ckeditor/ckeditor.js',
   'public/vendor/bootstrap-validator/dist/validator.min.js',
   'public/vendor/bootstrap-daterangepicker/daterangepicker.js',
   'public/vendor/ion.rangeSlider/js/ion.rangeSlider.min.js',
   'public/vendor/dropzone/dist/dropzone.js',
   'public/vendor/editable-table/mindmup-editabletable.js',
   'public/vendor/datatables.net/js/jquery.dataTables.min.js',
   'public/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js',
   'public/vendor/fullcalendar/dist/fullcalendar.min.js',
   'public/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js',
   'public/vendor/tether/dist/js/tether.min.js',
   'public/vendor/slick-carousel/slick/slick.min.js',
   'public/vendor/bootstrap/js/dist/util.js',
   'public/vendor/bootstrap/js/dist/alert.js',
   'public/vendor/bootstrap/js/dist/button.js',
   'public/vendor/bootstrap/js/dist/carousel.js',
   'public/vendor/bootstrap/js/dist/collapse.js',
   'public/vendor/bootstrap/js/dist/dropdown.js',
   'public/vendor/bootstrap/js/dist/modal.js',
   'public/vendor/bootstrap/js/dist/tab.js',
   'public/vendor/bootstrap/js/dist/tooltip.js',
   'public/vendor/bootstrap/js/dist/popover.js',
   'public/vendor/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
   'public/js/dataTables.bootstrap4.min.js',
   'public/js/demo_customizer5739.js',
   'public/js/main5739.js',
   'public/js/counties.js',
   'public/js/constituencies.js',
   'public/js/wards.js',
   'public/js/api.js',
   'public/js/helper-api.js',
   'public/js/jwt/core.js',
   'public/js/jwt/enc-base64.js',
   'public/js/jwt/hmac.js',
   'public/js/jwt/sha256.js'
], 'public/js/app-bc.js');

