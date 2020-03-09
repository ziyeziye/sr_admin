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
Route::post('/web/upload', 'CommonController@upload')->name('common.upload@上传图片');

Route::group(['prefix'=>'/api/admin'], function () {
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

        Route::get('/managers', "ManagerController@table")->name('manager.list');
        Route::post('/managers', "ManagerController@save")->name('manager.save@新增管理员');
        Route::put('/managers/{id}', "ManagerController@update")->name('manager.update@修改管理员');
        Route::delete('/managers', "ManagerController@delete")->name('manager.delete@删除管理员');
        Route::get('/managers/{id}/role', "ManagerController@userRole")->name('manager.user_role');
        Route::post('/managers/password', "ManagerController@password")->name('manager.password@修改密码');
        Route::get('/managers/login_info', "ManagerController@loginInfo")->name('manager.login_info');
        Route::get('/managers/login_perms', "ManagerController@loginPerms")->name('manager.login_perms');

        Route::get('/menus', "MenuController@table")->name('menu.list');
        Route::get('/menus/group', "MenuController@group")->name('menu.group');
        Route::get('/menus/{id}', "MenuController@info")->name('menu.info');
        Route::post('/menus', "MenuController@save")->name('menu.save@新增菜单');
        Route::put('/menus/{id}', "MenuController@update")->name('menu.update@修改菜单');
        Route::delete('/menus', "MenuController@delete")->name('menu.delete@删除菜单');

        //=======================WEB业务设置=======================================
        Route::get('/partners', "PartnerController@table")->name('partner.list');
        Route::get('/partners/{id}', "PartnerController@info")->name('partner.info');
        Route::post('/partners', "PartnerController@save")->name('partner.save@新增友链');
        Route::put('/partners/{id}', "PartnerController@update")->name('partner.update@修改友链');
        Route::delete('/partners', "PartnerController@delete")->name('partner.delete@删除友链');

        Route::get('/faqs', "FaqController@table")->name('faq.list');
        Route::get('/faqs/{id}', "FaqController@info")->name('faq.info');
        Route::post('/faqs', "FaqController@save")->name('faq.save@新增问题');
        Route::put('/faqs/{id}', "FaqController@update")->name('faq.update@修改问题');
        Route::delete('/faqs', "Faqontroller@delete")->name('faq.delete@删除问题');

        Route::get('/messages', "MessageController@table")->name('message.list');
        Route::get('/messages/{id}', "MessageController@info")->name('message.info');
        Route::post('/messages', "MessageController@save")->name('message.save@新增留言');
        Route::put('/messages/{id}', "MessageController@update")->name('message.update@回复留言');
        Route::delete('/messages', "Messageontroller@delete")->name('message.delete@删除留言');

    });
});

