let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.js('resources/assets/js/bulma-carousel.min.js', 'public/js')
mix.js('resources/assets/js/bootstrap.js', 'public/js')

mix.webpackConfig({
    resolve: {
      alias: {
        'vue$': 'vue/dist/vue.runtime.common.js'
      }
    }
  });
  
mix
  .js('resources/assets/js/entry-client.js', 'public/js')
  .js('resources/assets/js/entry-server.js', 'public/js')
;