const mix = require('laravel-mix');
const ora = require('ora')
require('laravel-mix-merge-manifest');

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

var spinner = ora('Building assets...')
spinner.start()

let options = {
  processCssUrls: false
}

mix.setPublicPath(path.resolve('./'));

// Assets build
mix.js('resources/js/app.js', 'js')
  .extract(['swiper', 'select2'], 'js/vendor.js')
  .copyDirectory('node_modules/select2/dist', 'lib/select2')
  .copyDirectory('node_modules/swiper', 'lib/swiper')
  .sass('resources/sass/vendor.scss', 'css')
  .sass('resources/sass/app.scss', 'css')
  .version()
  .options(options)
  .sourceMaps()
  .mergeManifest()
  .then(function () {
    spinner.stop()
  });
