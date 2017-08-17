 angular.module("Task.login",['ngRoute'])

.config(['$routeProvider',function($routeProvider){
	$routeProvider.
		when('/login',{
			templateUrl:"frontend/views/Login.php",
			controller:"LogInCtrl"
		});
}])

.directive( 'goClick', function ( $location ) {
  return function ( scope, element, attrs ) {
    var path;

    attrs.$observe( 'goClick', function (val) {
      path = val;
    });

    element.bind( 'click', function () {
      scope.$apply( function () {
        $location.path( path );
      });
    });
  };
})

.controller('LogInCtrl',['$scope','$http','$location','ParamsFrom_Home',function ($scope,$http,$location,ParamsFrom_Home){  
    
}])

.controller('appCTRL',['$scope','$http','$location','ParamsFrom_Home',function ($scope,$http,$location,ParamsFrom_Home){

		$scope.showLogOut = false;
		console.log("appCTRL");
		var a="";
		ParamsFrom_Home.setProperty(1);
		a=ParamsFrom_Home.getProperty();
		console.log(a);

		$scope.a1=true;

	$scope.btnLogin1=function(params)
	{
		 console.log(params);
		 		$http({
			method: 'POST', //CHANGE THIS FROM GET TO POST
			url: 'Database/Function.php?f=getUser',
			params: { userN : params.Username , passW:params.Password }, //USE PROPER JAVASRIPT OBJECTS

			headers: {'Content-Type': 'application/x-www-form-urlencoded'}

			}).then(function (response) 
			{
				if(response.data.length== 1)
				{
					//sweet alert warning ->you heve fill in wrong way fields

						console.log('Click event');
						$scope.showLogOut = true;

						if(response.data["0"].role_user == 'Admin'){
							$scope.admin = true;
						}

					$location.path('/home');

				}
				else
				{
							swal('BUGG i lojes!');

				}
						   console.log(response.data);
			
			})
		}
		$scope.LogOut=function()
		{
			$scope.showLogOut=false;
		}
}]);