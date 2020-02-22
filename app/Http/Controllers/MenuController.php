<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends BaseController
{
    public function table()
    {
        $where = request()->input();
        $where['order_by'] = ["order" => "orders", "desc" => "asc"];
        $result = MenuService::table($where);
        return $this->successWithResult($result);
    }

    public function info($id)
    {
        return $this->successWithResult(Menu::find($id));
    }

    public function save(Request $request)
    {
        //验证参数
        $check = $this->_valid([
            'name' => 'required',
            'url' => 'required',
            'parent_id' => 'required',
        ], [
            'name.required' => '请输入菜单名',
            'url.required' => '请输入路由',
            'parent_id.required' => '请选择上级',
        ]);

        if (true !== $check) {
            return $this->errorWithMsg($check, 405);
        }

        $data = [
            'parent_id' => $request->input("parent_id", 0),
            'name' => $request->input("name"),
            'url' => $request->input("url"),
            'perms' => $request->input("perms"),
            'type' => $request->input("type"),
            'icon' => $request->input("icon"),
        ];

        $result = MenuService::save($data);
        return $this->successWithResult($result);
    }

    public function update(Request $request, $id)
    {
        //验证参数
        $check = $this->_valid([
            'name' => 'required',
            'url' => 'required',
            'parent_id' => 'required',
        ], [
            'name.required' => '请输入菜单名',
            'url.required' => '请输入路由',
            'parent_id.required' => '请选择上级',
        ]);

        if (true !== $check) {
            return $this->errorWithMsg($check, 405);
        }

        $data = [
            'parent_id' => $request->input("parent_id", 0),
            'name' => $request->input("name"),
            'url' => $request->input("url"),
            'perms' => $request->input("perms"),
            'type' => $request->input("type"),
            'icon' => $request->input("icon"),
        ];

        $result = MenuService::update($data, $id);
        if (false === $result) {
            return $this->errorWithMsg("修改失败");
        }
        return $this->successWithResult($result);
    }

    public function delete(Request $request)
    {
        $ids = $request->input();
        $result = MenuService::delete($ids);
        if (false === $result) {
            return $this->errorWithMsg("删除失败");
        }
        return $this->successWithResult($result);
    }

    public function group()
    {
        $result = MenuService::table([
            "type" => [0, 1],
            'order_by' => ["order" => "orders", "desc" => "asc"],
        ]);
        if ($result) {
            $result = $result->toArray();
            array_push($result, [
                "id" => 0,
                "name" => "一级菜单",
                "open" => true,
                "parent_id" => -1,
            ]);
        }

        return $this->successWithResult($result);
    }

}
