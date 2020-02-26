<?php

namespace App\Traits;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

trait Tool
{
    public function success($code = 200, $msg = 'success')
    {
        $data = [
            'msg' => $msg,
            'code' => $code
        ];
        $this->writeLog($data);
        return response()->json($data, 200);
    }

    public function successWithMsg($msg = 'success', $code = 200)
    {
        $data = [
            'msg' => $msg,
            'code' => $code
        ];
        $this->writeLog($data);
        return response()->json($data, 200);
    }

    public function successWithResult($result, $code = 200, $msg = 'success')
    {
        $data = [
            'result' => $result,
            'msg' => $msg,
            'code' => $code
        ];
        $this->writeLog($data);
        return response()->json($data, 200);
    }

    public function successWithData($data, $code = 200, $msg = 'success')
    {
        $data = [
            'data' => $data,
            'msg' => $msg,
            'code' => $code
        ];
        $this->writeLog($data);
        return response()->json($data, 200);
    }

    public function error($code = 404, $msg = 'error')
    {
        $data = [
            'msg' => $msg,
            'code' => $code
        ];
        $this->writeLog($data);
        return response()->json($data, 200);
    }

    public function errorWithMsg($msg = 'error', $code = 404)
    {
        $data = [
            'msg' => $msg,
            'code' => $code
        ];
        $this->writeLog($data);
        return response()->json($data, 200);
    }

    public function writeLog($resp = [])
    {
        $userName = "";
        $request = request();
        if (Auth::check()) {
            $user = $request->user();
            $userName = $user->name;
        }
        if ('GET' != $request->method()) {
            $route = explode('@',Route::currentRouteName());
            $routeName = isset($route[1]) ? $route[1] : "";
            Log::insert([
                "user_name" => $userName,
                "operation" => $routeName,
                "method" => $request->method(),
                "params" => json_encode($request->all(), JSON_UNESCAPED_UNICODE),
                "response" => json_encode($resp, JSON_UNESCAPED_UNICODE),
                "ip" => $request->ip(),
                "old" => "",
                "url" => $request->url(),
                "action" => Route::currentRouteAction(),
            ]);
        }
    }

    public function isAdmin()
    {
//        $roles = explode(',', Auth::user()->roles);
//        return in_array('admin', $roles);
    }

    /**
     * @param array $rules 验证规则
     * @param array $messages 自定义错误
     * @param bool $reMsgArr 返回错误数组
     * @param array|null $data 验证数据集
     * @param bool $reValid 返回验证器
     * @return bool|\Illuminate\Contracts\Validation\Validator
     * @throws \Exception
     */
    protected function _valid(array $rules, array $messages = [], $reMsgArr = false, array $data = null, $reValid = false)
    {
        if (is_null($data)) {
            $data = request()->all();
        }

        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            if ($reValid) {
                return $validator;
            }
            //TODO:返回错误消息数组
            if ($reMsgArr) {
                $msgs = $validator->errors()->toArray();
            }

            return $validator->errors()->first();
        }

        return true;
    }

}
