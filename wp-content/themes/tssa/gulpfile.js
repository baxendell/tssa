/*
|--------------------------------------------------------------------------
| Elixir Asset Management
|--------------------------------------------------------------------------
|
| Elixir provides a clean, fluent API for defining some basic Gulp tasks
| for your Laravel application. By default, we are compiling the Less
| file for our application, as well as publishing vendor resources.
|
| Documentation and install instructions available here: https://laravel.com/docs/5.2/elixir#installation 
*/

var elixir = require('laravel-elixir');

/* Update path to pre-compiled assets*/
elixir.config.assetsPath = 'assets/';

/* Update autoprefix settings */
elixir.config.css.autoprefix.options.browsers.push("last 5 versions");

elixir(function(mix) {

    mix.sass('app.scss','assets/compiled/css/theme.css');

    mix.scripts([
        'vendors',
        'theme.js'
    ], 'assets/compiled/js/app.js');
});