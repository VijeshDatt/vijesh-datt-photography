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
  .vue({ processCssUrls: false, })
  .sass('resources/sass/app.scss', 'public/css')
  .browserSync({
    host: 'localhost:3002',
    proxy: '127.0.0.1:8000',
    post: 8080,
    tunnel: false,
    online: false,
  })
  .disableNotifications();
