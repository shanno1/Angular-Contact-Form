(function () {
    'use strict';

    angular.module('contactform', ['ngRoute'])
        .config(rtProvider);

    function rtProvider($routeProvider) {
        $routeProvider

        .when("/",{ templateUrl: "partials/home.html"})
        .when("/home",{ templateUrl: "partials/home.html"})
        .otherwise({redirectTo: "/"});

        
  }
  
})();