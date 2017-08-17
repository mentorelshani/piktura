 angular.module("Task",['ngRoute','Task.home','Task.login','Task.admin','Task.signup'])

.config(['$routeProvider',function($routeProvider){
    $routeProvider.otherwise({redirectTo:"/login"})
}]);
