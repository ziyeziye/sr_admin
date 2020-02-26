<?php

namespace App\Http\Middleware;

use App\Models\Log;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\OperationLog;
use Illuminate\Support\Facades\Route;

class AdminOperationLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userName = "";
        if(Auth::check()) {
            $user = $request->user();
            $userName = $user->name;
        }
        if('GET' != $request->method()){
//            $route = explode('@',Route::currentRouteName());
//            $routeName = isset($route[2]) ? $route[2] : "";
            $input = $request->all();
            $log = new Log(); # 提前创建表、model
            $log->user_name = $userName;
            $log->operation = Route::currentRouteName();
//            $log->path = $request->path();
            $log->method = $request->method();
            $log->ip = $request->ip();
//            $log->sql = '';
            $log->params = json_encode($input, JSON_UNESCAPED_UNICODE);
            $log->save();   # 记录日志
        }
        return $next($request);
    }
}
