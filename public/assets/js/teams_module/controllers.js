angular.module('teamsApp', [])
    .controller('teamController', ['$scope', '$http', function ($scope, $http) {
        $scope.teamsData = {};
        $scope.bad = {
            success: false,
            message: []
        };
        $scope.teams = {};
        $scope.stadiums = getClubStadiums();
        $scope.users = getUsers();

        /** Create a new team */
        $scope.submit = function(teamsData) {
            console.log(teamsData);
            /*$http({
                method : "POST",
                url : "/team/create",
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

        /** Get all stadiums */
        function getClubStadiums() {
            $http({
                method : "GET",
                url : "/stadiums/all",
                headers: {'X-Requested-With': 'XMLHttpRequest'}
            }).then(function (response) {
                return response.data;
            });
        }

        /** Get all users */
        function getUsers() {
            $http({
                method : "GET",
                url : "/users/all",
                headers: {'X-Requested-With': 'XMLHttpRequest'}
            }).then(function (response) {
                return response.data;
            });
        }

    }]);