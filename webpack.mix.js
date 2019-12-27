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
    'public/fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css',
    'public/bower_components/select2/dist/css/select2.min.css',
    'public/bower_components/bootstrap-daterangepicker/daterangepicker.css',
    'public/bower_components/dropzone/dist/dropzone.css',
    'public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css',
    'public/bower_components/fullcalendar/dist/fullcalendar.min.css',
    'public/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css',
    'public/bower_components/slick-carousel/slick/slick.css',
    'public/css/maince5a.css'
], 'public/css/mix-asset.css');

//mix.js('resources/js/app.js', 'public/js')
   //.sass('resources/sass/app.scss', 'public/css');
   
mix.scripts([
    'public/bower_components/jquery/dist/jquery.min.js',
    'public/bower_components/popper.js/dist/umd/popper.min.js',
    'public/bower_components/moment/moment.js',
    'public/bower_components/chart.js/dist/Chart.min.js',
    'public/bower_components/select2/dist/js/select2.full.min.js',
    'public/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js',
    'public/bower_components/ckeditor/ckeditor.js',
    'public/bower_components/bootstrap-validator/dist/validator.min.js',
    'public/bower_components/bootstrap-daterangepicker/daterangepicker.js',
    'public/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js',
    'public/bower_components/dropzone/dist/dropzone.js',
    'public/bower_components/editable-table/mindmup-editabletable.js',
    'public/bower_components/datatables.net/js/jquery.dataTables.min.js',
    'public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
    'public/bower_components/fullcalendar/dist/fullcalendar.min.js',
    'public/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js',
    'public/bower_components/tether/dist/js/tether.min.js',
    'public/bower_components/slick-carousel/slick/slick.min.js',
    'public/bower_components/bootstrap/js/dist/util.js',
    'public/bower_components/bootstrap/js/dist/alert.js',
    'public/bower_components/bootstrap/js/dist/button.js',
    'public/bower_components/bootstrap/js/dist/carousel.js',
    'public/bower_components/bootstrap/js/dist/collapse.js',
    'public/bower_components/bootstrap/js/dist/dropdown.js',
    'public/bower_components/bootstrap/js/dist/modal.js',
    'public/bower_components/bootstrap/js/dist/tab.js',
    'public/bower_components/bootstrap/js/dist/tooltip.js',
    'public/bower_components/bootstrap/js/dist/popover.js',
    'public/js/demo_customizerce5a.js',
    'public/js/maince5a.js'
], 'public/js/mix-asset.js');
