<?php

namespace app\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use app\Http\Controllers\Controller;


class SelectTasksController extends Controller
{
    public function index(){
    	$tasks = DB::select('select * from tasks');
    	return view('home',['tasks'=>$tasks]);
    }
}
