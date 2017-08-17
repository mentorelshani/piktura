 <?php

 if(function_exists($_GET['f'])) {
  $_GET['f']();
 }
 else{
  echo "Nuk eksiston";
 }




function getTask()
{ 
  require 'db_connect.php';

    $query = pg_query($db, "SELECT * FROM  tasks  ;");
    $result=pg_fetch_all($query);
     
    print_r(json_encode($result));
}


function addTask()
{ 
   require 'db_connect.php';   

    $TaskName = pg_escape_string($_GET['taskname']);     
    $Status = pg_escape_string($_GET['status']);   
    $Date = date("Y/m/d h:i:sa");        
    
    $query = pg_query($db, " INSERT into tasks(TaskName,Status,Date_Created) values('$TaskName','$Status','$Date');");  

     print_r($Status);               
}


 function deleteTask()
 {
    require 'db_connect.php';
     
      $id=pg_escape_string($_GET['id']);      
      $result = pg_query($db, "DELETE FROM tasks WHERE id_task =$id ");
        
      print_r("Deleted");
 }


function editTask()
{
  require 'db_connect.php';

    $id_task= pg_escape_string($_GET['id']);
    $TaskName = pg_escape_string($_GET['taskname']);
    if(isset($_GET['details']))
    {
      $Details = pg_escape_string($_GET['details']);
    }
    else 
    {
      $Details = "";
    }
    
    $Status = pg_escape_string($_GET['status']);
     
    $result1 = pg_query($db,"UPDATE tasks SET taskname='$TaskName',details='$Details', status='$Status' WHERE id_task=$id_task");
    $query = pg_query($db,"SELECT * from tasks WHERE id_task=$id_task");

    $result=pg_fetch_all($query);
    print_r(json_encode($result));
}


function getObj()
{
  require 'db_connect.php';

    $id= pg_escape_string($_GET['id_task']);
    $query = pg_query($db, "SELECT * FROM  tasks  WHERE id_task=$id ;");
    $result=pg_fetch_all($query);
    
    print_r(json_encode($result));
}

function getUser()
{
  require 'db_connect.php';
    $username= pg_escape_string($_GET['userN']);
    $password = pg_escape_string($_GET['passW']);

    $query=pg_query($db,"SELECT * FROM  users  WHERE username='$username' and hash_password='$password';");
 
     $result=pg_fetch_all($query);
     

   print_r(json_encode($result));

  
}

function createUser()
{
  echo hash('md5', 'messagess AKA in this case should be password+salt_pas');
}
?>