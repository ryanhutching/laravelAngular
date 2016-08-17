angular.module('app', ['ui.router', 'appCrop', 'appMap', 'clubsApp', 'teamsApp', 'peoplesApp', 'stadiumsApp'])

    .constant("CSRF_FILED", '{{ csrf_field() }}')
    .config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    })
    .config(['$stateProvider', '$urlRouterProvider', '$locationProvider', function ($stateProvider, $urlRouterProvider, $locationProvider) {

        //$locationProvider.html5Mode(true);
        $stateProvider
            .state('abs', {
                    abstract: true,
                    url: '/'
                }
            )
            .state('home', {
                    url: '/home',
                    views: {
                        'nav': {
                            templateUrl: '/views/home/home.html'
                        }
                    }
                }
            )
            .state('dashboard', {
                    url: '/dashboard',
                    views: {
                        'nav': {
                            templateUrl: '/views/dashboard/index.html'
                        }
                    }
                }
            )
            .state('dashboard.database', {
                    url: '/database',
                    views: {
                        'content': {
                            templateUrl: '/views/dashboard/database/index.html'
                        }
                    }
                }
            )
            .state('dashboard.database.clubs', {
                    url: '/clubs',
                    views: {
                        'database_tabs': {
                            templateUrl: '/views/dashboard/database/clubs/clubs.html'
                        }
                    }
                }
            )
            .state('dashboard.database.stadiums', {
                    url: '/stadiums',
                    views: {
                        'database_tabs': {
                            templateUrl: '/views/dashboard/database/stadiums/stadiums.html'
                        }
                    }
                }
            )
            .state('dashboard.database.teams', {
                    url: '/teams',
                    views: {
                        'database_tabs': {
                            templateUrl: '/views/dashboard/database/teams/teams.html'
                        }
                    }
                }
            )
            .state('dashboard.database.peoples', {
                    url: '/peoples',
                    views: {
                        'database_tabs': {
                            templateUrl: '/views/dashboard/database/peoples/peoples.html'
                        }
                    }
                }
            )
    }]);
//# sourceMappingURL=app.js.map
