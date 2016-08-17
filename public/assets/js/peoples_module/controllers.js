angular.module('peoplesApp', [])
    .controller('peopleController', ['$scope', '$http', function ($scope, $http) {
        $scope.peoplesData = {};
        $scope.bad = {
            success: false,
            message: []
        };
        $scope.users = getUsers();

        /** Create a new people */
        $scope.submit = function(peoplesData) {
            $http({
                method : "POST",
                url : "/people/create",
                headers: {'X-Requested-With': 'XMLHttpRequest'},
                data: peoplesData
            }).then(function (response) {
                var status = response.data.success;
                if(!status) {
                    $scope.bad.success = true;
                    $scope.bad.message =  response.data.message;
                } else {

                }
            });
        };

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
