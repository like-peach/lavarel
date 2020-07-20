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

//登录
Route::any('/wh/login','Wh\LoginController@login');
//判断登录
Route::any('/wh/index/{name?}{pwd?}','Wh\LoginController@index');
//登出
Route::any('/wh/loginOut','Wh\LoginController@loginOut');
