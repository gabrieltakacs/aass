var elixir = require('laravel-elixir');
var app_root_path = '../../../';
var paths = {
    'jquery':       app_root_path + 'node_modules/jquery/',
    'bootstrap':    app_root_path + 'vendor/twbs/bootstrap-sass/'
};

elixir(function(mix) {
    // Application styles
    mix.sass([
        'resources/assets/sass/*.scss'
    ], 'resources/assets/css/app.css');

    mix.styles([
        'resources/assets/css/app.css'
    ], 'public/styles/stylesheet.css');

    // Scripts
    mix.scripts([
        paths.jquery + "dist/jquery.js",
        paths.bootstrap + 'assets/javascripts/bootstrap.js',
        'resources/assets/js/*.js'
    ], 'public/js/app.js');

    // Fonts
    mix.copy('node_modules/bootstrap-sass/assets/fonts', 'public/fonts');
});
