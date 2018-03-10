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
Route::get('get_qiniu_token', 'Controller@getToken');

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

    /*
    |--------------------------------------------------------------------------
    | 老师管理
    |--------------------------------------------------------------------------
    */
    Route::resource('teachers', 'TeachersController');

    /*
    |--------------------------------------------------------------------------
    | 课程管理
    |--------------------------------------------------------------------------
    */
    Route::resource('courses', 'CoursesController');

    /*
    |--------------------------------------------------------------------------
    | 用户管理
    |--------------------------------------------------------------------------
    */
    // 修改资料页面
    Route::get('user_info', 'UsersController@userInfo');
    // 提交修改资料
    Route::post('update_info/{user}', 'UsersController@updateInfo');
    // 修改密码视图
    Route::get('change_pwd_view', 'UsersController@changePwdView');
    // 修改密码操作
    Route::post('change_pwd', 'UsersController@changePwd');
});



