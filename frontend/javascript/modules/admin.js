 angular.module("Task.admin",['ngRoute'])

.config(['$routeProvider',function($routeProvider){
	$routeProvider.
		when('/admin',{
			templateUrl:"frontend/views/admin/admin.php",
			controller:"AdminIndexCtrl"
		});
}])


.controller('AdminIndexCtrl',[function(){
	console.log('Thisisss is AdminIndex');


}]);
