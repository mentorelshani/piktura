 angular.module("Task.home",['ngRoute'])

.service('ParamsFrom_Home', function () {
        var propertyShowInput = '';

        return {
            getProperty: function () {
                return propertyShowInput;
            },
            setProperty: function(value) {
                propertyShowInput = value;
                
            }
        };
    })
.config(['$routeProvider',function($routeProvider){
	$routeProvider.
		
		when('/home',{
			templateUrl:"frontend/views/home.php",
			controller:"TaskCtrl"
		})
		.when('/slideshow',{
			templateUrl:"frontend/views/slideshow.php",
			controller:"TaskCtrl"
		});
		
}])
    

    // .service('ParamsFrom_Home', function () {
    //     var propertyShowInput = '';

    //     return {
    //         getProperty: function () {
    //             return propertyShowInput;
    //         },
    //         setProperty: function(value) {
    //             propertyShowInput = value;
    //         }
    //     };
    // })
    .animation('.slide-animation', function () {
        return {
            beforeAddClass: function (element, className, done) {
                var scope = element.scope();

                if (className == 'ng-hide') {
                    var finishPoint = element.parent().width();
                    if(scope.direction !== 'right') {
                        finishPoint = -finishPoint;
                    }
                    TweenMax.to(element, 0.5, {left: finishPoint, onComplete: done });
                }
                else {
                    done();
                }
            },
            removeClass: function (element, className, done) {
                var scope = element.scope();

                if (className == 'ng-hide') {
                    element.removeClass('ng-hide');

                    var startPoint = element.parent().width();
                    if(scope.direction === 'right') {
                        startPoint = -startPoint;
                    }

                    TweenMax.fromTo(element, 0.5, { left: startPoint }, {left: 0, onComplete: done });
                }
                else {
                    done();
                }
            }
        };
    })


.controller('TaskCtrl',['$scope','$http',function ($scope,$http){  
	
	$scope.slides = [
            {image: 'http://legacy.clutterfairyhouston.com/wp-content/uploads/2013/08/Depositphotos_25224381-dry-erase-board-to-do-list-everything-frown-face-1024x1024.jpg', description: 'Image 00'},
            {image: 'https://jobs.viktre.com/wp-content/uploads/2017/05/Task-Management.jpg',description: 'Image 01'},
            {image: 'https://i2.wp.com/mobtreal.com/wp-content/uploads/2017/06/1-1.jpg?resize=400%2C250', description: 'Image 02'},
            {image: 'https://us.123rf.com/450wm/faithie/faithie1505/faithie150502627/40358108-organizing-and-collaborating-laptops-and-office-objects-on-shared-desk.jpg?ver=6', description: 'Image 03'},
            {image: 'http://organize365.com/wp-content/uploads/2016/01/conversational-task-clips.jpg', description: 'Image 04'}
        ];

        $scope.direction = 'left';
        $scope.currentIndex = 0;

        $scope.setCurrentSlideIndex = function (index) {
            $scope.direction = (index > $scope.currentIndex) ? 'left' : 'right';
            $scope.currentIndex = index;
        };

        $scope.isCurrentSlideIndex = function (index) {
            return $scope.currentIndex === index;
        };

        $scope.prevSlide = function () {
            $scope.direction = 'left';
            $scope.currentIndex = ($scope.currentIndex < $scope.slides.length - 1) ? ++$scope.currentIndex : 0;
        };

        $scope.nextSlide = function () {
            $scope.direction = 'right';
            $scope.currentIndex = ($scope.currentIndex > 0) ? --$scope.currentIndex : $scope.slides.length - 1;
        };
	

	$scope.tableTask=false;
	$scope.spanShow1=true;
	$scope.inputShow1=false;
	$scope.filtered="";
	$scope.statusi = 'Progress';
	var savetask_forEdit="";
	var savetask_forEdit2="";
	// $scope.admin1 =true;

	// $scope.showLogOut = true;

	
	

	// $scope.showLogOut = true;
	

	// if( a == 11 )
	// 	{	
			
	// 		console.log(' if');
	// 		$scope.showLogOut = true;
	// 	}
	// else if ( a != 11 )
	// 	 { 
	// 	 	// $scope.showLogOut=false;
	// 	 	console.log('else if');
	// 	 }





	$scope.ShowInputs=function(i,task){


			$http({
			method: 'POST', //CHANGE THIS FROM GET TO POST
			url: 'Database/Function.php?f=getObj',
			params: { id_task :task.id_task }, //USE PROPER JAVASRIPT OBJECTS

			headers: {'Content-Type': 'application/x-www-form-urlencoded'}

			}).then(function (response) 
			{
			    ObjTask=response.data["0"];
			    task.taskname=ObjTask.taskname;
			    task.status=ObjTask.status;

			    task.tasknameinput=ObjTask.taskname;
			    task.status1=ObjTask.status;
			
			})
			if($scope.admin){
				$scope.inputShow = i;
			}
	}


	$scope.editTask=function()
	{

		swal({
		  title: 'Are you sure you want to edit this task?',
		  text: "",
		  type: 'question',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, edit it!'
		  }).then(function () {
		  swal(
		    'Edited!',
		    'Your Task has been edited.',
		    'success'
		  	)
				$http({
					method: 'POST', //CHANGE THIS FROM GET TO POST
					url: 'Database/Function.php?f=editTask',
					params: { id:$scope.id_task, taskname: $scope.name, details:$scope.details, status:$scope.status }, //USE PROPER JAVASRIPT OBJECTS

					headers: {'Content-Type': 'application/x-www-form-urlencoded'}

					}).then(function (response) 
					{	
						save = response.data["0"];

						$scope.name=save.taskname;
						$scope.status=save.status;
						$scope.details=save.details;

					    
					})
					
					$scope.submit = true;
					
					$scope.EditFrm(save);
					$scope.AllTaskShow();
		})
	}

	$scope.length = 0;

	$http.get("Database/Function.php?f=getTask")
		.then(function (response) {

		$scope.tasks=response.data;

		
		});
	$scope.AllTaskShow=function(){
		$http.get("Database/Function.php?f=getTask")
		.then(function (response) {

		$scope.tasks=response.data;
		$scope.length = $scope.filtered.length;

		$scope.numrimin = 0;
		$scope.numrimax = 3;
		
		if($scope.length<3)
			$scope.numrimax =$scope.length;
		



		});
	}

	$scope.addTask=function(param)
	{
		if (!(param) || !(param.taskname) || !(param.status) ){
					swal(
  			
  			'Please fill all inputs!',
  			'',
  			'warning'
			)
		}

		else {
			swal(
	  			
	  			'You added a new Task!',
	  			'',
	  			'success'
				)

			$http({
				method: 'POST', //CHANGE THIS FROM GET TO POST
				url: 'Database/Function.php?f=addTask',
				params: { taskname: param.taskname, status:param.status}, //USE PROPER JAVASRIPT OBJECTS

				headers: {'Content-Type': 'application/x-www-form-urlencoded'}

				}).then(function (response) 
				{
				    console.log(response);
				    //clear fild in form
				})

				$scope.AllTaskShow();	
				$scope.status="";
			}
	
	}

	$scope.AllTaskShow();

	$scope.showDetails = function(taskParams)
	{	

		$scope.name=taskParams.taskname;
		$scope.status=taskParams.status;
		$scope.time=taskParams.date_created;
		$scope.details=taskParams.details;

		$scope.showFrmMore=true;
		$scope.hideTableAndAddForm=true;
	}

	$scope.showAddForm=function()
	{
		$scope.showFrmMore=false;
		$scope.hideTableAndAddForm=false;
	}

	$scope.showAddFormFROMeditFrm=function()
	{
		$scope.hideTableAndAddForm=false;
		$scope.showFrmEdit=false;
	}

	var save="";
	var ObjTask="";

	$scope.EditFrm=function(taskParams)
	{
		$scope.id_task=taskParams.id_task;
		$scope.name=taskParams.taskname;
		$scope.status=taskParams.status;
		$scope.time=taskParams.date_created;
		$scope.details=taskParams.details;

		$scope.showFrmEdit=true;
		$scope.hideTableAndAddForm=true;

		save=taskParams;


	}

	$scope.submit=true;

	$scope.checkIfChange=function()
	{	
		if($scope.name === save.taskname &&  $scope.status === save.status && ($scope.details === save.details || $scope.details==""))
		{
			$scope.submit=true;		
		}
		else
		{
			$scope.submit=false;
		}
	}



	$scope.editTask1=function(task)
	{
		swal({
		  title: 'Are you sure you want to edit this task?',
		  text: "",
		  type: 'question',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, edit it!'
		  }).then(function () {
		  swal(
		    'Edited!',
		    'Your Task has been edited.',
		    'success'
		  	   )

				$http({
					method: 'POST', //CHANGE THIS FROM GET TO POST
					url: 'Database/Function.php?f=editTask',
					params: { id:task.id_task, taskname: task.tasknameinput, status:task.status1 }, //USE PROPER JAVASRIPT OBJECTS

					headers: {'Content-Type': 'application/x-www-form-urlencoded'}

					}).then(function (response) 
					{	
					    console.log(response.data);
					    
					})
					$scope.inputShow =-1;
					$scope.AllTaskShow();
					console.log(task.status1);
			})
	}

	$scope.getObjTask=function(i)
	{


		$http({
		method: 'POST', //CHANGE THIS FROM GET TO POST
		url: 'Database/Function.php?f=getObj',
		params: { id_task :i }, //USE PROPER JAVASRIPT OBJECTS
		headers: {'Content-Type': 'application/x-www-form-urlencoded'}

		}).then(function (response) 
		{
		    ObjTask=response.data["0"];		    
			    //clear fild in form
		})			
	}
		
	$scope.numrimin = 0;
	$scope.numrimax = 3;
		// $scope.maxi = 3;
	$scope.next3=function()
	{
		$scope.numrimin += 3;
			
		$scope.numrimax += 3;
		$scope.maxi = $scope.numrimax;

		if($scope.numrimax > $scope.length)
		{
				$scope.numrimax = $scope.length;
		}
	}

	$scope.previous3=function()
	{
		if($scope.numrimax == $scope.length)
		{
			$scope.numrimax -= ($scope.numrimax-$scope.numrimin);
		}
		else
		{
			$scope.numrimax -= 3;
		}			
		
		$scope.numrimin -=3;
	}
	

	$scope.DeleteTask=function(t)
	{
		swal({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!',
		  cancelButtonText: 'No, cancel!',
		  confirmButtonClass: 'btn btn-success',
		  cancelButtonClass: 'btn btn-danger',
		  buttonsStyling: false
		}).then(function () {
		  swal(
		    'Deleted!',
		    'Your file has been deleted.',
		    'success'
		  )
			$http({
				method: 'POST', //CHANGE THIS FROM GET TO POST
				url: 'Database/Function.php?f=deleteTask',
				params: {id: t.id_task}, //USE PROPER JAVASRIPT OBJECTS

				headers: {'Content-Type': 'application/x-www-form-urlencoded'}

				}).then(function (response) 
				{
				  
				})

			$scope.AllTaskShow();

			}, function (dismiss) {
			  // dismiss can be 'cancel', 'overlay',
			  // 'close', and 'timer'
		  if (dismiss === 'cancel') {
		    swal(
		      'Cancelled',
		      'Your task is not deleted !',
		      'info'
		    )
		  }
		})
	}
	
}]);



