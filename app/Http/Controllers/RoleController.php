<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RoleController extends BaseController
{
    public function table(Request $request)
    {
        //获取数据
        $page = $request->exists("pageNum") ? get_page() : [null];
        $where = request()->input();
        $result = RoleService::table($where, ...$page);
        return $this->successWithResult($result);
    }

    public function save(Request $request)
    {
        //验证参数
        $check = $this->_valid([
            'role_name' => 'required|min:3|max:50',
        ], [
            'role_name.required' => '请输入角色名',
            'role_name.min' => '角色最少输入3个字符',
            'role_name.max' => '角色太长了',
        ]);

        if (true !== $check) {
            return $this->errorWithMsg($check, 405);
        }

        $data = [
            "role_name" => $request->input("role_name"),
            "remark" => $request->input("remark"),
            "create_admin_id" => Auth::user()->id,
            "update_admin_id" => Auth::user()->id,
            'menuIdList' => $request->input("menuIdList"),
        ];

        $result = RoleService::save($data);
        return $this->successWithResult($result);
    }

    public function update(Request $request, $id)
    {
        //验证参数
        $check = $this->_valid([
            'role_name' => 'required|min:3|max:50',
        ], [
            'role_name.required' => '请输入角色名',
            'role_name.min' => '角色最少输入3个字符',
            'role_name.max' => '角色太长了',
        ]);

        if (true !== $check) {
            return $this->errorWithMsg($check, 405);
        }
        $data = [
            "role_name" => $request->input("role_name"),
            "remark" => $request->input("remark"),
            "update_admin_id" => Auth::user()->id,
            'menuIdList' => $request->input("menuIdList"),
        ];

        $result = RoleService::update($data, $id);
        if (false === $result) {
            return $this->errorWithMsg("修改失败");
        }
        return $this->successWithResult($result);
    }

    public function delete(Request $request)
    {
        $ids = $request->input();
        $result = RoleService::delete($ids);
        if (false === $result) {
            return $this->errorWithMsg("删除失败");
        }
        return $this->successWithResult($result);
    }

    public function roleMenu($id)
    {
        $result = RoleService::roleMenu($id);
        return $this->successWithResult($result);
    }

}
