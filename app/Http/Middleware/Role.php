<?php

namespace App\Http\Middleware;

//use App\Models\Permission;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Role
{
    /**
     * 根据当前的用户，获取当前用户有关的权限，并且获得即将要访问的接口，来判断是否能问题该接口
     * 如果用户是管理员，则无条件访问，用户是其他角色，则进行权限比较
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
          //  使用缓存系统，把各个角色所对应的功能先缓存起来，提高访问效率
//        1. 获取用户的信息
          if (Auth::check()){
              $user = $request->user();
              return $next($request);

              //TODO
/*
              //        2. 判断当前用户是否是管理员  ’admin'
              $roles = $user->roles;
              $arrRoles = explode(',', $roles);
              if (in_array($this->getAdmin(),$arrRoles)) {
                  return $next($request);
              } else {
//        3. 如果不是管理员，进一步验证权限，如果是管理员，则无条件放行
                $route = Route::currentRouteName();
                $permisions = [];
                $whiteList = ['users.info', 'users.logout', 'logs.show', 'logs.index', 'users.index', 'users.show'];
                if (in_array($route, $whiteList)) {
                    return $next($request);
                } else {
                   $arrPermisions = \App\Models\Role::whereIn('name', $arrRoles)->pluck('permissions')->toArray();
                   $strPermissions = implode(',', $arrPermisions);   // 连接多个角色的功能
                   $arrPermisions = explode(',', $strPermissions);
                   $arrPermissons = Permission::whereIn('id', $arrPermisions)->pluck('route_name')->toArray();  // 获取当前用户所有角色的功能
                   if (in_array($route, $arrPermissons)){
                       return $next($request);
                   } else {
                       return response()->json([
                          'status' => 'error',
                          'status_code' => 403,
                           'info' => '无法访问指定的接口，请授权后再访问'
                       ], 403);
                   }
                }

              }
              */
          } else {
              // 没有登录
              return response()->json([
                "code" => 401,
                "msg" => "无法访问指定的接口，请登录后再试"
              ], 200);
          }
         // 同意放行
    }

    public function getAdmin()
    {
        return 'admin';
    }


}
