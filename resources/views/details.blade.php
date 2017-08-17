<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body>
 @foreach ($task as $task1)
 	Task id = {{$task1->id_task}}
 	<br>
 	Taskname = {{$task1->taskname}}
@endforeach
</body>
</html>