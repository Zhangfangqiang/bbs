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

/* 由于百度编辑器,请求后端资源路径要和路由路径一致所以 就不放在assets 目录下了 我也没有找到好的解决办法 ^_^ 略略略 */
mix.js          ( 'resources/assets/web/js/app.js'     , 'public/web/js/app.js')
  .scripts      (['resources/assets/web/js/web.js']    , 'public/web/js/web.js')
  .sass         ( 'resources/assets/web/sass/app.scss' , 'public/web/css')
  .version      ()
  .copyDirectory( 'resources/assets/web/img'           , 'public/web/img')
  .copyDirectory( 'resources/assets/web/layer'         , 'public/web/layer')
  .copyDirectory( 'resources/assets/web/ueditor'       , 'public/web/ueditor');

