var appMap = angular.module('appMap', ['vsGoogleAutocomplete'])

    .controller('MainCtrl', function($scope) {

        $scope.options = {
            types: ['(cities)'],
            componentRestrictions: { country: 'FR' }
        };

        $scope.address = {
            name: '',
            place: '',
            components: {
                placeId: '',
                streetNumber: '',
                street: '',
                city: '',
                state: '',
                countryCode: '',
                country: '',
                postCode: '',
                district: '',
                location: {
                    lat: '',
                    long: ''
                }
            }
        };

        $scope.$watch('address.name', function() {
            $scope.$parent.clubsData.address = $scope.address.name;
        });

        $scope.validateAddress = function() {
            if($scope.address.components.location.lat) {
                $scope.$parent.clubsData.address = $scope.address.name;
                $scope.$parent.clubsData.lat = $scope.address.components.location.lat;
                $scope.$parent.clubsData.long = $scope.address.components.location.long;
                $scope.$parent.clubsData.validated = 1;
                angular.element('.validated').css('display','block');
            }
        }

    })
    .directive('myMap', function() {
        // directive link function
        var link = function(scope, element, attributes) {

            var lat = scope.address.components.location.lat;
            var long = scope.address.components.location.long;

            var createMap = function (lat, long) {
                var map, infoWindow;
                var markers = [];

                // map config
                var mapOptions = {
                    center: new google.maps.LatLng(lat, long),
                    zoom: 4,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    styles: [
                        {"featureType":"landscape","stylers":[{"hue":"#FFBB00"},
                            {"saturation":43.400000000000006},{"lightness":37.599999999999994},
                            {"gamma":1}]},
                        {"featureType":"road.highway","stylers":[{"hue":"#FFC200"},
                            {"saturation":-61.8},{"lightness":45.599999999999994},
                            {"gamma":1}]},
                        {"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},
                            {"saturation":-100},
                            {"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":
                            [{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},
                        {"featureType":"water","stylers":[{"hue":"#0078FF"},
                            {"saturation":-13.200000000000003},
                            {"lightness":2.4000000000000057},{"gamma":1}]},
                        {"featureType":"poi","stylers":[{"hue":"#00FF6A"},
                            {"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}
                    ]
                };

                // init the map
                function initMap() {
                    if (map === void 0) {
                        map = new google.maps.Map(element[0], mapOptions);
                    }
                }

                // place a marker
                function setMarker(map, position, title, content) {
                    var marker;
                    var markerOptions = {
                        position: position,
                        map: map,
                        title: title,
                        icon: 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                    };

                    marker = new google.maps.Marker(markerOptions);
                    markers.push(marker); // add marker to array

                    google.maps.event.addListener(marker, 'click', function () {
                        // close window if not undefined
                        if (infoWindow !== void 0) {
                            infoWindow.close();
                        }
                        // create new window
                        var infoWindowOptions = {
                            content: content
                        };
                        infoWindow = new google.maps.InfoWindow(infoWindowOptions);
                        infoWindow.open(map, marker);
                    });
                }

                // show the map and place some markers
                initMap();

                setMarker(
                    map,
                    new google.maps.LatLng(scope.address.components.location.lat, scope.address.components.location.long)
                );
            };

            // Create Function
            //createMap();

            scope.$watch('address.components.location.lat', function (newValue) {
                lat = newValue;
                long = scope.address.components.location.long;
                if(lat) {
                    createMap(lat, long);
                } else {
                    createMap(50, 2);
                }
            });

        };

        return {
            restrict: 'E',
            template: '<div id="gmaps"></div>',
            replace: true,
            link: link
        };
    });