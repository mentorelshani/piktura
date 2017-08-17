<!DOCTYPE html>
<html  ng-app="Task" >
<head>
<title>Task</title>
    <!-- CSS (load bootstrap) -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <style>
        .navbar { border-radius:0; }
        input {
            text-align: center;
        }
    </style>

     <link rel="stylesheet" href="css/main.css">
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
<!-- apply our angular app to our site -->
<body ng-controller="TaskCtrl" >

<!-- NAVIGATION -->


<!-- MAIN CONTENT -->
<!-- THIS IS WHERE WE WILL INJECT OUR CONTENT ============================== -->
<div class="container" >



 <input type="text" ng-show="sd">
<div class="TaskMenager">
    <div class="row" >

        <div>
        <form action="/insert" ng-if="role == 'Admin'">
            
            Task Name :<input type="text" name="taskname" required>
            Status :<select class="btn" name="status" >
                  <option value="New">New</option>
                  <option value="Started">Started</option>
                  <option value="Progress">Progress</option>
                  <option value="Finished">Finished</option>
            </select>
            <input type="submit" class="btn" value="Add">
        </form>
    </div>


    <div class="tableTaskData">
            <table class="table tblTask">
                <tr ><th>Index</th><th>Id</th><th>Task</th><th>Status</th><th>Date</th><th>Modify</th></tr>

                @foreach ($tasks1 as $index => $task)
                <tr ><!-- perseritja e rreshtave  -->
                    <td>
                        {{$index}}
                    </td>
                    <td >
                       <a href="a" >{{$task->id_task}}</a> 
                    </td>
                    <td>
                       <input type="text" class="form-control" ng-if="!(inputShow == $index) "  ng-model='task.tasknameinput' >
                      <!--   <span  href="/ShowInputs/'{{$task->id_task}}'" ng-if="(inputShow == $index)" >{{$task->taskname}}</span> -->
                        <a href="/ShowInputs/{{$task->id_task}}">{{$task->taskname}}</a>    
                    </td>
                    <td ng-show="true">
                        {{$task->status}} 
                    </td>
                    <td>
                        {{$task->date_created}}
                    </td>
                    <td>
                        <button onclick="location.href='/ShowInputs/{{$task->id_task}}';" >Details</button>
                        <button onclick="location.href='/DeleteTask/{{$task->id_task}}';"
                        ng-if="role == 'Admin'">Delete</button>
                        <button onclick="location.href='/EditTask/{{$task->id_task}}';" ng-if="role == 'Admin'">Edit</button>
                    </td>
                
                </tr>
                @endforeach
            </table>

            <hr>
    </div>
    </div>


    
</div>


    </div>
</div>



<!-- <script src="../frontend/javascript/modules/app.js"></script> -->
<script src="../frontend/javascript/modules/home.js"></script>
<!-- <script src="../frontend/javascript/modules/login.js"></script>   
<script src="../frontend/javascript/modules/admin.js"></script>
<script src="../frontend/javascript/modules/signup.js"></script>  --> 
    
</body>
</html>
