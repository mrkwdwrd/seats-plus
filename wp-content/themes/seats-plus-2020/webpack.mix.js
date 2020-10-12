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

// Assets build
mix.js('resources/js/app.js', 'js')
  .extract(['slick-carousel', 'selectize'], 'js/vendor.js')
  .copyDirectory('node_modules/selectize/dist', 'lib/selectize')
  .copyDirectory('node_modules/slick-carousel/slick', 'lib/slick')
  .sass('resources/sass/vendor.scss', 'css')
  .sass('resources/sass/app.scss', 'css')
  .options(options)
  .sourceMaps()
  .mergeManifest()
  .then(function () {
    spinner.stop()
  });
