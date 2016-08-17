<!DOCTYPE html>
<html ng-app="app">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
    <title>Decise Elements</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,400" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset("/assets/css/clubs/style.css")}}">
    <link rel="stylesheet" href="{{asset("/assets/css/clubs/ng-img-crop.min.css")}}">
</head>

<body>

<div ui-view="nav"></div>
<div ui-view="content"></div>


{{-- The Scripts must attach with gulpfile--}}
{{-- Will do it after finishing the project --}}
<script src="{{asset("/assets/js/plugins/jquery.min.js")}}"></script>
<script src="{{asset("/assets/js/plugins/bootstrap.min.js")}}"></script>
<script src="{{asset("/assets/js/plugins/placeholdem.min.js")}}"></script>
<script src="{{asset("/assets/js/clubs.min.js")}}"></script>

<script src="{{"/assets/js/plugins/angular.min.js"}}"></script>
<script src="{{"/assets/js/plugins/angular-ui-router.min.js"}}"></script>
<script src="{{"/assets/js/plugins/angular-resource.min.js"}}"></script>
<script src="{{"/assets/js/plugins/ui-bootstrap.min.js"}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>

<script src="{{"/assets/js/map_module/google-map.min.js"}}"></script>
<script src="{{"/assets/js/map_module/vs-google-autocomplete.min.js"}}"></script>
<script src="{{"/assets/js/map_module/appMap.min.js"}}"></script>

<script src="{{"/assets/js/crop_module/ng-img-crop.min.js"}}"></script>
<script src="{{"/assets/js/crop_module/appCrop.min.js"}}"></script>

<script src="{{"/assets/js/clubs_module/clubsApp.js"}}" ></script>
<script src="{{"/assets/js/clubs_module/controllers.js"}}" ></script>

<script src="{{"/assets/js/teams_module/teamsApp.js"}}" ></script>
<script src="{{"/assets/js/teams_module/controllers.js"}}" ></script>

<script src="{{"/assets/js/peoples_module/peoplesApp.js"}}" ></script>
<script src="{{"/assets/js/peoples_module/controllers.js"}}" ></script>

<script src="{{"/assets/js/stadiums_module/stadiumsApp.js"}}" ></script>
<script src="{{"/assets/js/stadiums_module/controllers.js"}}" ></script>

{{--<script src="{{"/assets/js/common_module/database_routes.js"}}" ></script>--}}
<script src="{{"/assets/js/app.js"}}"></script>

</body>
</html>