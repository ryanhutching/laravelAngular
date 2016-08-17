app.factory('NgRequestService', ['$http', '$q', function ($http, $q) {

    /** Get all stadiums */
    function getClubStadiums() {
        $http({
            method : "GET",
            url : "/stadiums/all",
            headers: {'X-Requested-With': 'XMLHttpRequest'}
        }).then(function (response) {
            $scope.stadiums = response.data;
        });
    }

    return {
        sendRequest: function (method, urlPath, params, tokenAuth) {

            var headers = {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'ZUMO-API-VERSION': '2.0.0'
            };
            if (tokenAuth)
                headers = {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'ZUMO-API-VERSION': '2.0.0',
                    'X-ZUMO-AUTH': tokenAuth
                };

            var deferred = $q.defer();

            console.log(method, urlPath, params);

            $http({
                method: method,
                url: urlPath,
                data: params,
                headers: headers
            }).success(function (data, status, headers) {
                deferred.resolve(data);
            }).error(function (data, status, headers, config, statusText) {
                console.log('Request Failed!', data, status, headers, config, statusText); //todo
                deferred.reject({data: data, status: status});
            });
            return deferred.promise;
        }
    }
}]);