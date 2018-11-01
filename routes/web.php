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

// Route::group(['middleware' =>['web','auth']], function(){
// 	Route::get('/', function(){
// 		return view('home');
// 	});
// 	Route::get('/home', function(){
// 		if(Auth::user()->role==0){
// 			return view('home');
// 		} 
// 		if(Auth::user()->role==1){
// 			$users['users'] = \App\User::all();
// 			return view('tendik', $users);
// 		}
// 		else {
// 			$users['users'] = \App\User::all();
// 			return view('admin', $users);
// 		}
// 	});

Route::get('/', 'UserController@index')->name('home');
Route::get('/buat-rapat', 'UserController@buat_rapat');


Route::post('/new-rapat', 'RapatController@create');
Route::get('/notulensi/{id}', 'RapatController@notulensi');
Route::post('/autosave-notulensi', 'RapatController@autosave');
Route::post('/manualsave-notulensi', 'RapatController@manualsave');

