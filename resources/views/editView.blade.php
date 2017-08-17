<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body>
@foreach ($task as $task1)
<form action='/Edit/{{$task1->id_task}}' method="post">
 	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
 	Taskname = <input type="text" name="name" value="{{$task1->taskname}}" ><br>
 	Status = <input type="text" name="status" value="{{$task1->status}}" >

<button type="submit">Edit</button>
@endforeach
</form>
</body>
</html>