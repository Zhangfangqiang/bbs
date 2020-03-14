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

mix.js          ( 'resources/web/js/app.js'     , 'public/web/js/app.js')
  .scripts      (['resources/web/js/web.js']    , 'public/web/js/web.js')
  .sass         ( 'resources/web/sass/app.scss' , 'public/web/css')
  .version      ()
  .copyDirectory( 'resources/web/layer'         , 'public/web/layer')
  .copyDirectory( 'resources/web/ueditor'       , 'public/web/ueditor');

