<?php

use Illuminate\Support\Facades\Route;

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
    return view('admin.admin');
});

// 中间件 登录
Route::prefix('/login')->group(function(){
	Route::get('/','LoginController@index');
	Route::post('logindo','LoginController@logindo');
	Route::get('editout','LoginController@editout');
});

// 管理员模块
Route::prefix('/admin')->middleware('islogin')->group(function(){
	Route::get('/','AdminController@index');
	Route::get('create','AdminController@create');
	Route::post('store','AdminController@store');
	Route::get('destroy/{id}','AdminController@destroy');
	Route::get('edit/{id}','AdminController@edit');
	Route::post('update/{id}','AdminController@update');
	Route::get('delete','AdminController@delete');//ajax删除
	Route::get('createpost','AdminController@createpost');//js验证名称唯一性
});
// 拜访会议
Route::prefix('/meeting')->middleware('islogin')->group(function(){
	Route::get('/','MeetingController@index');
	Route::get('create','MeetingController@create');
	Route::post('store','MeetingController@store');
	Route::get('destroy/{id}','MeetingController@destroy');
	Route::get('edit/{id}','MeetingController@edit');
	Route::post('update/{id}','MeetingController@update');
	Route::get('delete','MeetingController@delete');//ajax删除
	Route::get('createpost','MeetingController@createpost');//js验证名称唯一性
});