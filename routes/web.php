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
Route::get('/web/captcha', 'CommonController@getCaptcha')->name('common.captcha');

Route::group(['prefix'=>'/api'], function () {
    Route::get('/refresh', "Auth\AdminLoginController@refresh")->name('admin.refresh@刷新token');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login@登录');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout@退出登录');

    Route::middleware(['role'])->group(function(){
        Route::get('/logs', "LogController@table")->name('log.list');

        Route::get('/roles', "RoleController@table")->name('role.list@角色列表');
        Route::post('/roles', "RoleController@save")->name('role.save@新增角色');
        Route::put('/roles/{id}', "RoleController@update")->name('role.update@修改角色');
        Route::delete('/roles', "RoleController@delete")->name('role.delete@删除角色');
        Route::get('/roles/{id}/menu', "RoleController@roleMenu")->name('role.role_menu');

        Route::get('/admin', "AdminController@table")->name('admin.list');
        Route::post('/admin', "AdminController@save")->name('admin.save@新增管理员');
        Route::put('/admin/{id}', "AdminController@update")->name('admin.update@修改管理员');
        Route::delete('/admin', "AdminController@delete")->name('admin.delete@删除管理员');
        Route::get('/admin/{id}/role', "AdminController@userRole")->name('admin.user_role');
        Route::post('/admin/password', "AdminController@password")->name('admin.password@修改密码');
        Route::get('/admin/login_info', "AdminController@loginInfo")->name('admin.login_info');
        Route::get('/admin/login_perms', "AdminController@loginPerms")->name('admin.login_perms');

        Route::get('/menus', "MenuController@table")->name('menu.list');
        Route::get('/menus/group', "MenuController@group")->name('menu.group');
        Route::get('/menus/{id}', "MenuController@info")->name('menu.info');
        Route::post('/menus', "MenuController@save")->name('menu.save@新增菜单');
        Route::put('/menus/{id}', "MenuController@update")->name('menu.update@修改菜单');
        Route::delete('/menus', "MenuController@delete")->name('menu.delete@删除菜单');

    });
});

