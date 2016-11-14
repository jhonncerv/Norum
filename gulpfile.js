var elixir = require('laravel-elixir');
var es2015 = require('babel-preset-es2015');
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
    mix.sass('app.scss')
        .browserify('app.js')
        .version(['css/app.css', 'js/app.js'])
    .browserSync({ proxy: 'homestead.app'});
});
