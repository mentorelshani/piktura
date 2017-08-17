<?php
namespace app\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use app\Http\Requests;
use app\Http\Controllers\Controller;

class loginController extends Controller
{
    public function index(Request $request){
    	$username = $request->username;
    	$password = $request->password;
    	$user = DB::SELECT('SELECT * FROM users WHERE username ILIKE ? and hash_password = ? ',[$username,$password]);

   		if($user==null){
   			echo "nuk ekziston";
   			$request->session()->forget('username');
   			$request->session()->forget('role');
   		}
   		else {
   			print_r($user[0]->role_user);
   			$request->session()->put('username',$user[0]->username);
   			$request->session()->put('role',$user[0]->role_user);

   			echo '<script>window.location.href = "/ang";
	 			</script>';

	 		// echo "Jeni kyqur si ". $request->session()->get('username') . $request->session()->get('role');	
	 		// echo '<br><a href="/logout">Log Out5</a>.';



   		};
    }

    public function logout(Request $request){
    	$request->session()->forget('username');
    	$request->session()->forget('role');
		echo '<script>window.location.href = "/login";
	 			</script>';
		
    }
}
