angular.module('stadiumsApp', [])
    .controller('stadiumController', ['$scope', '$http', function ($scope, $http) {
        $scope.stadiumsData = {};
        $scope.bad = {
            success: false,
            message: []
        };
        $scope.stadiums = getStadionsWithClubs();



        /** Create a new team */
        $scope.submit = function(stadiumsData) {
            console.log(stadiumsData);
            /*$http({
             method : "POST",
             url : "/stadiums/create",
             headers: {'X-Requested-With': 'XMLHttpRequest'},
             data: teamsData
             }).then(function (response) {
             var status = response.data.success;
             if(!status) {
             $scope.bad.success = true;
             $scope.bad.message =  response.data.message;
             } else {

             }
             });*/
        };

        function getStadionsWithClubs() {
            var stadiums = {};
            $http({
                method : "GET",
                url : "/stadiums/all_clubs",
                headers: {'X-Requested-With': 'XMLHttpRequest'}
            }).then(function (response) {
                return response.data;
            });
        }
    }]);













