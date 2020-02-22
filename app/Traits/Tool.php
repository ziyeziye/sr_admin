<?php

namespace App\Traits;

use App\Events\DataOperation;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

trait Tool
{
    public function success($code = 200, $msg = 'success')
    {
        return response()->json(
            [
                'msg' => $msg,
                'code' => $code
            ]
            , 200);
    }

    public function successWithMsg($msg = 'success', $code = 200)
    {
        return response()->json(
            [
                'msg' => $msg,
                'code' => $code
            ]
            , 200);
    }

    public function successWithResult($result, $code = 200, $msg = 'success')
    {
        return response()->json(
            [
                'result' => $result,
                'msg' => $msg,
                'code' => $code
            ]
            , 200);
    }

    public function successWithData($data, $code = 200, $msg = 'success')
    {
        return response()->json([
            'data' => $data,
            'msg' => $msg,
            'code' => $code
        ], 200);
    }

    public function error($code = 404, $msg = 'error')
    {
        return response()->json(
            [
                'msg' => $msg,
                'code' => $code
            ]
            , 200);
    }

    public function errorWithMsg($msg = 'error', $code = 404)
    {
        return response()->json(
            [
                'msg' => $msg,
                'code' => $code
            ], 200);
    }

    public function log($type, $route_name, $desc)
    {
        $data = [
            'type' => $type,
            'route_name' => $route_name,
            'desc' => $desc
        ];
        event(new DataOperation($data));
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
