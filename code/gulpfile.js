const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir(mix => {
    mix.sass(['app.scss', '../fontello/css/fontello.css', '../fontello/css/animation.css', '../x-editable/css/bootstrap-editable.css', '../css/app.css'])
       .webpack(['../x-editable/js/bootstrap-editable.js', 'app.js']);
    mix.copy('resources/assets/fontello/font', 'public/font');
});