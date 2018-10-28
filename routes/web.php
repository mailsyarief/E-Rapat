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


Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('admin/routes', 'HomeController@admin')->middleware('admin');

Route::group(['middleware' =>['web','auth']], function(){
	Route::get('/', function(){
		return view('home');
	});
// role 0 = dosen
// role 1 = tenaga pendidik
// role 2 = admin
	Route::get('/home', function(){
		if(Auth::user()->role==0){
			return view('home');
		} 
		if(Auth::user()->role==1){
			$users['users'] = \App\User::all();
			return view('tendik', $users);
		}
		else {
			$users['users'] = \App\User::all();
			return view('admin', $users);
		}
	});

	Route::get('/buat-rapat', 'RapatController@buat_rapat');

});
