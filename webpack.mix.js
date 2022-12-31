const mix = require('laravel-mix');
require('laravel-mix-tailwind');

mix.browserSync('127.0.0.1:8000');
mix.disableNotifications();
mix.js('resources/js/app.js', 'public/js')
    .vue()
    .tailwind()
    .postCss('resources/css/app.css', 'public/css', [
    ]);