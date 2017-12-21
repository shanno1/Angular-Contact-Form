angular.module('contactform', ['ngRoute'])
.directive('gototop', function () {
    return {
         restrict: 'E',
         link: function ($rootScope, window, scope, elem, attrs) {
              $rootScope.$on("$routeChangeSuccess", function (event, currentRoute, previousRoute) {
                  window.scrollTo(0, 0);

              });
         }
    }
});
