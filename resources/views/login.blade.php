<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
Enter username and password 
<form action='/LoggingIn' method="post">
 	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
 	Username = <input type="text" name="username" ><br>
 	Password = <input type="text" name="password" >


<button type="submit">Log in</button><br>
<a href="/register">Sign up here</a>
</form>
</body>
</html>