<?php

namespace App\Http\Controllers;

use App\Services\AdminService;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends BaseController
{
    public function table(Request $request)
    {
        //获取数据
        $page = get_page();
        $where = request()->input();
        $result = AdminService::table($where, ...$page);
        return $this->successWithResult($result);
    }

    public function save(Request $request)
    {
        //验证参数
        $check = $this->_valid([
            'name' => 'required|unique:admins|min:3|max:50',
        ], [
            'name.required' => '请输入用户名',
            'name.unique' => '用户名重复',
            'name.min' => '用户名最少输入3个字符',
            'name.max' => '用户名太长了',
        ]);

        if (true !== $check) {
            return $this->errorWithMsg($check, 405);
        }

        $password = $request->input("password", "123456");
        if (is_null($password)) {
            $password = "123456";
        }
        $password = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            "name" => $request->input("name"),
            "password" => $password,
            "email" => $request->input("email"),
            "mobile" => $request->input("mobile"),
            "status" => $request->input("status"),
            "create_admin_id" => Auth::user()->id,
            'roleIdList' => $request->input("roleIdList"),
        ];

        $result = AdminService::save($data);
        return $this->successWithResult($result);

    }

    public function update(Request $request, $id)
    {
        //验证参数
        $check = $this->_valid([
            'name' => 'required|min:3|max:50',
        ], [
            'name.required' => '请输入用户名',
            'name.min' => '用户名最少输入3个字符',
            'name.max' => '用户名太长了',
        ]);

        if (true !== $check) {
            return $this->errorWithMsg($check, 405);
        }
        $data = [
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "mobile" => $request->input("mobile"),
            "status" => $request->input("status"),
            'roleIdList' => $request->input("roleIdList"),
        ];
        $password = $request->input("password");
        if (!is_null($password)) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $data["password"] = $password;
        }

        $result = AdminService::update($data, $id);
        if (false === $result) {
            return $this->errorWithMsg("修改失败");
        }
        return $this->successWithResult($result);
    }

    public function delete(Request $request)
    {
        $ids = $request->input();
        $result = AdminService::delete($ids);
        if (false === $result) {
            return $this->errorWithMsg("删除失败");
        }
        return $this->successWithResult($result);
    }

    public function password(Request $request)
    {
        $user = Auth::user();
        $password = $request->input("password");
        $newPass = $request->input("newPassword");
        $newCode = password_hash($newPass, PASSWORD_DEFAULT);

        if (!password_verify($password, $user->password)) {
            return $this->errorWithMsg("原密码错误");
        } else {
            if ($user->update(['password' => $newCode])) {
                Auth::logout();
                return $this->success();
            }
            return $this->errorWithMsg("修改密码失败");
        }
    }

    public function loginInfo()
    {
        return $this->successWithResult(Auth::user());
    }

    public function loginPerms()
    {
        $user = Auth::user();
        if ($user->name == "admin") {
            $user = "admin";
        }

//        dd(Route::getRoutes());
//        dd(Route::currentRouteName());
        $data = RoleService::permissions($user);
        return $this->successWithResult($data);
    }

    public function userRole($id)
    {
        $result = AdminService::userRole($id);
        return $this->successWithResult($result);
    }

}
