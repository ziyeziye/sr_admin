<?php

namespace App\Traits;

use App\Events\DataOperation;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

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

}
