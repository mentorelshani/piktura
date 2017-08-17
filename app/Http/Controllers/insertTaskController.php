<?php
namespace app\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use app\Http\Requests;
use app\Http\Controllers\Controller;
class insertTaskController extends Controller
{

	public function index(Request $request){
		$taskname = $request->taskname;
		$status = $request->status;
		DB::insert('insert into tasks (taskname,status) values(?,?)',[$taskname, $status]);
		echo "Record inserted successfully.<br/>";
		echo '<a href="/ang">Click Here</a> to go back.';
	}
}