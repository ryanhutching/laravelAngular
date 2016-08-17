var elixir = require('laravel-elixir');

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

   /* mix.scripts(
        'angular.js',
        'public/assets/js/plugins/angular.min.js',
        'node_modules/angular'
    );

    mix.scripts(
        'angular-animate.js',
        'public/assets/js/plugins/angular-animate.min.js',
        'node_modules/angular-animate'
    );

    mix.scripts(
        'angular-resource.js',
        'public/assets/js/plugins/angular-resource.min.js',
        'node_modules/angular-resource'
    );

    mix.scripts(
        'angular-mocks.js',
        'public/assets/js/plugins/angular-mocks.min.js',
        'node_modules/angular-mocks'
    );

    mix.scripts(
        'bootstrap.js',
        'public/assets/js/plugins/bootstrap.min.js',
        "node_modules/bootstrap-sass/assets/javascripts"
    );

    mix.scripts(
        'jquery.js',
        'public/assets/js/plugins/jquery.min.js',
        "node_modules/jquery/dist"
    );

    mix.scripts(
        'ui-bootstrap.js',
        'public/assets/js/plugins/ui-bootstrap.min.js',
        'node_modules/angular-ui-bootstrap/dist'
    );

    mix.scripts(
        'ng-img-crop.js',
        'public/assets/js/crop_module/ng-img-crop.min.js',
        'node_modules/ng-img-crop/compile/unminified'
    );

    mix.styles(
        'ng-img-crop.css',
        'public/assets/css/clubs/ng-img-crop.min.css',
        'node_modules/ng-img-crop/compile/unminified'
    );

    mix.scripts(
        'angular-google-maps.js',
        'public/assets/js/map_module/google-map.min.js',
        'node_modules/angular-google-maps/dist'
    );

     mix.scripts(
     'angular-ui-router.js',
     'public/assets/js/plugins/angular-ui-router.min.js',
     'node_modules/angular-ui-router/release'
     );

    mix.scripts(
        'placeholdem.js',
        'public/assets/js/plugins/placeholdem.min.js'
    );

    mix.styles(
     'ng-img-crop.css',
     'public/assets/css/clubs/ng-img-crop.min.css',
     'node_modules/ng-img-crop/compile/unminified'
     );

    mix.scripts(
        'vs-google-autocomplete.js',
        'public/assets/js/map_module/vs-google-autocomplete.min.js'
    );*/

    mix.styles(
        'style.css',
        'public/assets/css/clubs/style.css'
    );

    mix.scripts(
        'appMap.js',
        'public/assets/js/map_module/appMap.min.js'
    );

    mix.scripts(
        'appCrop.js',
        'public/assets/js/crop_module/appCrop.min.js'
    );

    mix.scripts(
        'app.js',
        'public/assets/js/app.js'
    );

    mix.scripts(
        'clubs.js',
        'public/assets/js/clubs.min.js'
    );

});
