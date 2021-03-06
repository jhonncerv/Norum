var elixir = require('laravel-elixir');
var es2015 = require('babel-preset-es2015');
require('laravel-elixir-imagemin');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir(function(mix) {
    mix.imagemin()
        .sass('app.scss')
        .browserify('app.js')
        .version(['css/app.css', 'js/app.js'])
        .browserSync({ proxy: '192.168.10.10'});
});
