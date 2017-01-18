var gulp = require("gulp");
var shell = require('gulp-shell');
var elixir = require('laravel-elixir');
var themeInfo = require('./theme.json');
var task = elixir.Task;

elixir.extend("stylistPublish", function () {
    new task("stylistPublish", function () {
        return gulp.src("").pipe(shell("php ../../artisan stylist:publish " + themeInfo.name));
    }).watch("**/*.scss", ['sass']);
});
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

elixir(function (mix) {

    /**
     * Compile STYLES
     */
    mix.sass([
        'main.scss',
        './bower_components/Swiper/dist/css/swiper.min.css'
    ], 'assets/css/main.css')
    /**
     * Compile JAVASCRIPTS
     */
        .scripts([
            './bower_components/jquery/dist/jquery.min.js',
            './bower_components/parallax.js/parallax.js',
            './bower_components/Swiper/dist/js/swiper.min.js',
            './bower_components/bootstrap/dist/js/bootstrap.min.js'
        ], 'assets/js/all.js').stylistPublish();


    // mix.copy('resources/assets/js', 'assets/js');
});
