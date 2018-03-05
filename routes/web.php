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

Auth::routes();

// 登陆后的操作
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    /*
    |--------------------------------------------------------------------------
    | 角色管理
    |--------------------------------------------------------------------------
    */
    Route::resource('roles', 'RolesController');

    /*
    |--------------------------------------------------------------------------
    | 权限管理
    |--------------------------------------------------------------------------
    */
    Route::resource('permissions', 'PermissionsController');

    /*
    |--------------------------------------------------------------------------
    | 教务管理
    |--------------------------------------------------------------------------
    */
    Route::resource('deans', 'DeansController');

    /*
    |--------------------------------------------------------------------------
    | 学生管理
    |--------------------------------------------------------------------------
    */
    Route::resource('students', 'StudentsController');
});



