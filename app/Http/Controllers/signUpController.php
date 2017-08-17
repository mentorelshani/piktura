<?php
namespace app\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use app\Http\Requests;
use app\Http\Controllers\Controller;
class signUpController extends Controller
{

	public function index(Request $request){
		$username = $request->username;
		$password = $request->password;
		$role = "User";
		try {
			$a = DB::insert('insert into users (username,hash_password, role_user) values(?,?,?)',[$username, $password, $role]);
			echo "\nRecord inserted successfully.<br/>";echo "<br>";
			echo '<a href="/ang">Click Here</a>';
		} 
		catch(\Illuminate\Database\QueryException $ex){ 
			  // dd($ex->getMessage()); 
			  // Note any method of class PDOException can be called on $ex.
			echo 'use another username';
			echo "<br>";
		}	
		
		
		$request->session()->put('username',$username);
		$request->session()->put('role',$role);;
		
	
	}
}