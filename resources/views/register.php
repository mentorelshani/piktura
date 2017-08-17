<!DOCTYPE html>
<html>
<head>
	<title>Register</title>

	     <link rel="stylesheet" href="../frontend/css/main.css">
     <!-- JS (load angular, ui-router, and our custom js file) -->
     <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script> -->

    <script src="//cdn.jsdelivr.net/hammerjs/2.0.4/hammer.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-route.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular-animate.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular-aria.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.10.3/TweenMax.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="https://rawgit.com/angular/bower-material/master/angular-material.min.css">
</head>
<body ng-app="">
<form action="/signup" method="post">
<input type="hidden" name="_token" value="<?php echo csrf_token() ?>";">
Username:<input type="text" name="username" value="22"> <br>
Password:<input type="password" name="password" id="aa"><br>
Confirm password :<input type="password" name="apassword" id="ab"> <br>
<script>
 $(document).ready(function(){
  $("#a").click(function() { 
  	console.log(2);
		var a = document.getElementById("aa").value;
		var b = document.getElementById("ab").value;
		if (a !=b && (a!= null && b != null)){
			alert("Confirm Password");
		}
		else {
			$("#ss").trigger("click");
		};
	})
  });
</script>
<input type="button" id="a" value="submit">
<input type="submit"  id="ss" value="Sign up" ng-show="sds">
	
</form>
</body>
</html>