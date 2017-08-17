<?php
namespace app\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use app\Http\Requests;
use app\Http\Controllers\Controller;

class angController extends Controller
{
     public function index(Request $request){
    	$tasks = DB::select('select * from tasks');
    	if(null !=( $request->session()->get('username'))){

    		$role =  $request->session()->get('role');
	 		echo "Jeni kyqur si ". $request->session()->get('username') ."   " . $request->session()->get('role');
	 		echo "<input type='hidden' value='$role' id = 'a' >";
	 		echo '<br><a href="/logout">Log Out</a>';	

		
    	return view('ang',['tasks1'=>$tasks]);
    	}
    	else 
    		echo '<script>window.location.href = "/login";</script>';
    		// print_r ($tasks);
    }
    public function show(Request $request,$id)
	 {
		$selected = DB::select('select * from tasks where id_task = ?',[$id]);
    	return view('details',['task'=>$selected]);
	 }

	 public function delete (Request $request,$id){
	 	if('Admin'==( $request->session()->get('role'))){
	 		$query = DB::delete('delete from tasks where id_task = ?',[$id]);
	 		echo '<script>window.location.href = "/ang";</script>';
	 		}
	 	else 
    		echo '<script>window.location.href = "/login";</script>';
	 }

	  public function edit (Request $request,$id){
	  	if('Admin'==( $request->session()->get('role'))){
	 		$selected = DB::select('select * from tasks where id_task = ?',[$id]);
	 		return view('editView',['task'=>$selected]);
	 	}
	 	else 
    		echo '<script>window.location.href = "/login";</script>';
	 }

	  public function update (Request $request ,$id){
	  	if('Admin'==( $request->session()->get('role'))){
		 	$taskname = $request->name;
			$status = $request->status;
			$selected = DB::update('UPDATE tasks set taskname = ? , status = ? where id_task= ?',[$taskname,$status,$id]);
		 	 echo '<script>window.location.href = "/ang";</script>';
		}
		else 
    		echo '<script>window.location.href = "/login";</script>';
	 }
}