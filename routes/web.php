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
//Front page
Route::get('/', 'PageController@index');
Route::get('/journey', 'PageController@journey');
Route::get('/bus', 'PageController@bus');
Route::get('/schedule', 'PageController@schedule');

//Normal users
Route::group(['middleware' => 'auth'], function () {
	Auth::routes();	
	Route::get('/home', 'UserController@index');
	Route::get('/home/bus', 'UserController@bus');
	Route::get('/home/journey', 'UserController@journey');
	Route::get('/home/schedule', 'UserController@schedule');
	Route::get('/home/reservation', 'ReservationController@index');
});
Auth::routes();
Route::get('/home', 'UserController@index');
//admins
Route::group(['middleware' => 'web'], function () {
	Route::get('admin', 'AdminController@index')->name('dashboard');
	Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	//journey
	Route::get('admin/journey',['as'=>'admin.journey.index','uses'=>'JourneyController@index']);
	Route::get('admin/journey/create',['as'=>'admin.journey.create','uses'=>'JourneyController@create']);
	Route::post('admin/journey/store',['as'=>'admin.journey.store','uses'=>'JourneyController@store']);
	Route::delete('admin/journey/destroy/{id}',['as'=>'admin.journey.destroy','uses'=>'JourneyController@destroy']);
	Route::get('admin/journey/{id}/edit',['as'=>'admin.journey.edit','uses'=>'JourneyController@edit']);
	Route::patch('admin/journey/update/{id}',['as'=>'admin.journey.update','uses'=>'JourneyController@update']); 
	//Bus information
	Route::get('admin/bus',['as'=>'admin.bus.index','uses'=>'BusController@index']);
	Route::get('admin/bus/create',['as'=>'admin.bus.create','uses'=>'BusController@create']);
	Route::post('admin/bus/store',['as'=>'admin.bus.store','uses'=>'BusController@store']);
	Route::delete('admin/bus/destroy/{id}',['as'=>'admin.bus.destroy','uses'=>'BusController@destroy']);
	Route::get('admin/bus/{id}/edit',['as'=>'admin.bus.edit','uses'=>'BusController@edit']);
	Route::patch('admin/bus/update/{id}',['as'=>'admin.bus.update','uses'=>'BusController@update']); 
	//Bus Schedule 
	Route::get('admin/schedule',['as'=>'admin.schedule.index','uses'=>'ScheduleController@index']);
	Route::get('admin/schedule/create',['as'=>'admin.schedule.create','uses'=>'ScheduleController@create']);
	Route::post('admin/schedule/store',['as'=>'admin.schedule.store','uses'=>'ScheduleController@store']);
	Route::delete('admin/schedule/destroy/{id}',['as'=>'admin.schedule.destroy','uses'=>'ScheduleController@destroy']);
	Route::get('admin/schedule/{id}/edit',['as'=>'admin.schedule.edit','uses'=>'ScheduleController@edit']);
	Route::patch('admin/schedule/update/{id}',['as'=>'admin.schedule.update','uses'=>'ScheduleController@update']);
	//Registered Users
	Route::get('admin/user',['as'=>'admin.user.index','uses'=>'AdminUserController@index']);
	Route::get('admin/user/create',['as'=>'admin.user.create','uses'=>'AdminUserController@create']);
	Route::post('admin/user/store',['as'=>'admin.user.store','uses'=>'AdminUserController@store']);
	Route::delete('admin/user/destroy/{id}',['as'=>'admin.user.destroy','uses'=>'AdminUserController@destroy']);
	Route::get('admin/user/{id}/edit',['as'=>'admin.user.edit','uses'=>'AdminUserController@edit']);
	//Route::patch('admin/user/update/{id}',['as'=>'admin.user.update','uses'=>'AdminUserController@update']);

});
//Staff
Route::group(['middleware' => 'web'], function () {
	Route::get('/staff', 'StaffController@index')->name('dashboard');
	Route::get('staff/login', 'Auth\StaffLoginController@showLoginForm')->name('staff.login');
	Route::post('staff/login', 'Auth\StaffLoginController@login')->name('staff.login.submit');    
});



