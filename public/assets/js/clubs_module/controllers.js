angular.module('clubsApp', [])
    .controller('clubsController', ['$scope', '$http', function ($scope, $http) {
        $scope.clubsData = {};
        $scope.stadiums = [];
        $scope.users = [];
        $scope.bad = {
            success: false,
            message: []
        };
        $scope.clubs = {};

        getClubs();
        getStadiums();
        getUsers();

        /** Create a new club */
        $scope.submit = function(clubsData) {
            $http({
                method : "POST",
                url : "/clubs/create",
                headers: {'X-Requested-With': 'XMLHttpRequest'},
                data: clubsData
            }).then(function (response) {
                var status = response.data.success;
                if(!status) {
                    $scope.bad.success = true;
                    $scope.bad.message =  response.data.message;
                } else {
                    getClubs();
                }
            });
        };

        /** Get all Clubs */
        function getClubs() {
            $http({
                method : "GET",
                url : "/clubs/all/teams",
                headers: {'X-Requested-With': 'XMLHttpRequest'}
            }).then(function (response) {
                $scope.clubs = response.data;
            });
        }

        /** Get all stadiums */
        function getStadiums() {
            $http({
                method : "GET",
                url : "/stadiums/all",
                headers: {'X-Requested-With': 'XMLHttpRequest'}
            }).then(function (response) {
                $scope.stadiums = response.data;
            });
        }

        /** Get all users */
        function getUsers() {
            $http({
                method : "GET",
                url : "/users/all",
                headers: {'X-Requested-With': 'XMLHttpRequest'}
            }).then(function (response) {
                $scope.users = response.data;
            });
        }

    }]);
