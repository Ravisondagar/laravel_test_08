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

mix.js('resources/js/app.js', 'public/js/min')
   .sass('resources/sass/app.scss', 'public/css/min');

   mix.styles([
   'public/vendors/styles/style.css',
   'public/src/plugins/datatables/media/css/jquery.dataTables.css',
   'public/src/plugins/datatables/media/css/dataTables.bootstrap4.css',
   'public/src/plugins/datatables/media/css/responsive.dataTables.css',
   ], 'public/css/main.css');

   mix.scripts([
   'public/vendors/scripts/script.js',
   'public/src/plugins/datatables/media/js/jquery.dataTables.min.js',
   'public/src/plugins/datatables/media/js/dataTables.bootstrap4.js',
   'public/src/plugins/datatables/media/js/dataTables.responsive.js',
   'public/src/plugins/datatables/media/js/responsive.bootstrap4.js',
   'public/src/plugins/datatables/media/js/button/dataTables.buttons.js',
   'public/src/plugins/datatables/media/js/button/buttons.bootstrap4.js',
   'public/src/plugins/datatables/media/js/button/buttons.print.js',
   'public/src/plugins/datatables/media/js/button/buttons.html5.js',
   'public/src/plugins/datatables/media/js/button/buttons.flash.js',
   'public/src/plugins/datatables/media/js/button/pdfmake.min.js',
   'public/src/plugins/datatables/media/js/button/vfs_fonts.js',
   ], 'public/js/main.js');