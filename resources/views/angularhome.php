<!DOCTYPE html>
<html  ng-app="Task"  >
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

    <link rel="stylesheet" href="../frontend/css/main.css">
    <!-- JS (load angular, ui-router, and our custom js file) -->
    <!--  <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script> -->

    <script src="//cdn.jsdelivr.net/hammerjs/2.0.4/hammer.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-route.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular-animate.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular-aria.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.10.3/TweenMax.min.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="https://rawgit.com/angular/bower-material/master/angular-material.min.css">


    
</head>
<!-- apply our angular app to our site -->
<body ng-controller="appCTRL">

<!-- NAVIGATION -->
<div class="navbar navbar-inverse menubar" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#/index">AngularUI Router</a>
    </div>
    <ul  class="nav navbar-nav">
        <li><a ng-if="showLogOut" href="#/home">Home</a></li>
        <li><a ng-if="admin && showLogOut" href="#/admin">Admin View</a></li>
    </ul>
    <ul class="nav navbar-nav" style="float: right;">
        <li ng-if="!(showLogOut)"><a href="#/login">Log in</a></li>
        <li ng-if="showLogOut" ng-click="LogOut()" ><a href="#/login">Log out</a></li>
    </ul>
</div>

<!-- MAIN CONTENT -->
<!-- THIS IS WHERE WE WILL INJECT OUR CONTENT ============================== -->
<div class="container" >
    <div ng-view >
        <?php
        // IF ($_SESSION('role')!= 'admin'){
        //  require 'notAvaiable.php';
        //  return false;
        // } ... 
?>


<div class="TaskMenager">
    <div class="row" ng-hide="hideTableAndAddForm">
    <div ng-show="admin">
        <form ng-submit="addTask(task)" >
            
            <input type="text" name="temp" ng-model="task.taskname" value={{task.taskname}} >
            <select class="btn" ng-model = "task.status" value="{{task.status}}">
                  <option value="New">New</option>
                  <option value="Started">Started</option>
                  <option value="Progress">Progress</option>
                  <option value="Finished">Finished</option>
            </select>
            <input type="submit" class="btn" name="addTask" value="Add_Task" > 
        </form>
    </div>
    <div>Search:<input type="" name="" ng-model="selected" ng-keyup="AllTaskShow()"></div>
<!--   -->
    <div class="tableTaskData" >

            <table class="table tblTask">
                <tr ><th>Id</th><th>Task</th><th>Status</th><th>Date</th><th>Modify</th></tr>
                <tr  ng-repeat="task in tasks | orderBy : 'id_task' | filter:selected as filtered" ng-if="($index >= numrimin  && $index < numrimax)"><!-- perseritja e rreshtave  -->
                    <td>
                        {{task.id_task}}
                    </td>
                    <td>
                        <input type="text" class="form-control" ng-if="inputShow == $index "  ng-model='task.tasknameinput' >
                        <span ng-dblclick="ShowInputs($index,task)" ng-if="!(inputShow == $index) " ng-model='task.tasknameinput'>{{task.taskname}}</span>  
                    </td>
                    <td>
                        <select class="btn" ng-if="inputShow == $index" ng-model='task.status1' >
                            <option value="New" default>New</option>
                            <option value="Started">Started</option>
                            <option value="Progress">Progress</option>
                            <option value="Finished">Finished</option>
                        </select>
                        
                        <span ng-dblclick="ShowInputs($index,task)" ng-if="!(inputShow == $index) " ng-model='task.status1'>{{task.status}}</span>
                    </td>
                    <td>
                        {{task.date_created | date: "yyyy-MM-dd HH:mm:ss"}}
                    </td>
                    <td ng-click="getId($index)">
                        <button class="btn btnMore" ng-click="showDetails(task)" >...More</button>
                        <button class="btn btnEdit" ng-click="EditFrm(task)" ng-if='admin' ng-show="admin">Edit</button>
                        <button class="btn btnDetails" ng-click="DeleteTask(task)" ng-if='admin' ng-show="admin">Delete</button>
                        <button class="btn " ng-if="inputShow == $index && admin" ng-click="editTask1(task)" ng-show="admin">Update </button>
                    </td>
                </tr>
            </table>
            <hr>
            <label>Showing {{numrimin+1}} to {{numrimax}} of {{length}}</label>
            <button  ng-click="previous3()" ng-disabled="(numrimin <1)">previous</button>
            <button  ng-click="next3()" ng-disabled="(length <= numrimax)">next</button>
    </div>
    </div>




    <div class="frmMore" ng-show="showFrmMore">
        <h3 style="text-align: center;" ">Task:{{name}}</h3>
        <p><b>Status:</b> {{status}}</p>
        <p><b>Details:</b>{{details}}</p>
        <p><b>Date:</b>{{time | date: "yyyy-MM-dd HH:mm:ss"}}</p>

        <button class="btn" ng-click="showAddForm()" style="margin-left:85%;" >Go Back</button>
    </div>




    <div class="frmEdit" ng-show="showFrmEdit">
        
        <form ng-submit="editTask()" >
            <input type="text" name="IdOfTask" ng-model="id_task" ng-show="HideIdOfTask">
            Task Name:<input id="idTask" type="text" id="taskName" ng-model="name" ng-keyup="checkIfChange()"><br>
            <label>Task Status:
                <select class="btn" ng-model="status" ng-change="checkIfChange()" value="status">
                      <option value="New" default>New</option>
                      <option value="Started">Started</option>
                      <option value="Progress">Progress</option>
                      <option value="Finished">Finished</option>
                </select>
            </label><br>
            <label>Task Details:<textarea rows="12" cols="100" ng-model="details" ng-keyup="checkIfChange()">{{details}}</textarea></label><br>
            <label>Task Date of create:{{time |  date: "yyyy-MM-dd HH:mm:ss"}}</label><br>

            <input type="submit" class="btn" name="editTask" value="Edit Task" ng-disabled="submit">
        </form>
            <button class="btn" ng-click="showAddFormFROMeditFrm()" style=" margin-left:85%;" >Add New</button>

        <hr>
    </div>

    
    
</div>


    </div>
</div>



<script src="../frontend/javascript/modules/app.js"></script>
<script src="../frontend/javascript/modules/home.js"></script>
<script src="../frontend/javascript/modules/login.js"></script>   
<script src="../frontend/javascript/modules/admin.js"></script>
<script src="../frontend/javascript/modules/signup.js"></script>  
    
</body>
</html>
