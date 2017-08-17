<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="tableTaskData" >

			<table class="table tblTask">
				<tr ><th>Id</th><th>Task</th><th>Status</th><th>Date</th><th>Modify</th></tr>
				@foreach ($tasks as $task)
				<tr ><!-- perseritja e rreshtave  -->
					<td>
						{{ $task->id_task }}
					</td>
					<td>
						{{ $task->taskname }}	
					</td>
					<td>
						{{ $task->status }}
					</td>
					<td>
						{{ $task->date_created }}
					</td>
				</tr>
				@endforeach
			</table>

	</div>
</body>
</html>