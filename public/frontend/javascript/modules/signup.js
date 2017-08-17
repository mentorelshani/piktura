 angular.module("Task.signup",['ngRoute'])

.config(['$routeProvider',function($routeProvider){
	$routeProvider.
		when('/signup',{
			templateUrl:"frontend/views/signup.php",
			controller:"SignUpCtrl"
		});
}])

.controller('SignUpCtrl',['$scope',function($scope){


	console.log("hej");


}])