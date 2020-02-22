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

Route::get('/web/captcha.jpg', 'CommonController@getCaptcha')->name('common.captcha');

Route::group(['prefix'=>'/api'], function () {
    Route::get('/refresh', "Auth\AdminLoginController@refresh")->name('admin.refresh');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login');

    Route::middleware(['role'])->group(function(){
        Route::get('/roles/menus', "RoleController@roleMenus")->name('role.role_menus');

        Route::get('/admin', "AdminController@table")->name('admin.list');
        Route::get('/admin/login_info', "AdminController@login_info")->name('admin.login_info');

    });
});

