<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/a', function () {
   	 phpinfo();
});

Route::get('/home','SelectTasksController@index');

Route::get('/angluar',function(){
	return view('angularhome');
});

Route::get('/ang','angController@index');

Route::get('/insert', 'insertTaskController@index');


Route::get('ShowInputs/{id}','angController@show');

Route::get('DeleteTask/{id}','angController@delete');

Route::get('EditTask/{id}','angController@edit');

Route::post('Edit/{id}','angController@update');

Route::get('/login',function(){
	if(null !=(session()->get('username'))){
		echo '<script>window.location.href = "/ang";
	 			</script>';
	}
	else{
		return view('login');
	}
});

Route::post('LoggingIn','loginController@index');

Route::get('/session',function(){
	return session()->get('role') ."   ". session()->get('username');
});

Route::get('/logout','loginController@logout');

Route::get('/register',function(){
	if(null !=(session()->get('username'))){
		echo '<script>window.location.href = "/ang";
	 			</script>';
	}
	else{
		return view('register');
	}
});

Route::post('/signup','signUpController@index');

Route::get('/routes',function(){
	return view('routes');
});


