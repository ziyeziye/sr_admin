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
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::middleware(['role'])->group(function(){
        Route::get('/roles', "RoleController@table")->name('role.list');
        Route::post('/roles', "RoleController@save")->name('role.save');
        Route::put('/roles/{id}', "RoleController@update")->name('role.update');
        Route::delete('/roles', "RoleController@delete")->name('role.delete');
        Route::get('/roles/{id}/menu', "RoleController@roleMenu")->name('role.role_menu');

        Route::get('/admin', "AdminController@table")->name('admin.list');
        Route::post('/admin', "AdminController@save")->name('admin.save');
        Route::put('/admin/{id}', "AdminController@update")->name('admin.update');
        Route::delete('/admin', "AdminController@delete")->name('admin.delete');
        Route::get('/admin/{id}/role', "AdminController@userRole")->name('admin.user_role');
        Route::post('/admin/password', "AdminController@password")->name('admin.password');
        Route::get('/admin/login_info', "AdminController@loginInfo")->name('admin.login_info');
        Route::get('/admin/login_perms', "AdminController@loginPerms")->name('admin.login_perms');

        Route::get('/menus', "MenuController@table")->name('menu.list');
        Route::get('/menus/group', "MenuController@group")->name('menu.group');
        Route::get('/menus/{id}', "MenuController@info")->name('menu.info');
        Route::post('/menus', "MenuController@save")->name('menu.save');
        Route::put('/menus/{id}', "MenuController@update")->name('menu.update');
        Route::delete('/menus', "MenuController@delete")->name('menu.delete');

    });
});

