<?php

namespace App\Services;


use App\Models\Admin;
use App\Models\AdminRole;

class AdminService extends BaseService
{
    public static function table($param = [], int $page = null, int $size = 15)
    {
        $query = Admin::query();
        if (isset($param['name']) && !empty($param['name'])) {
            $query = $query->where("name", "like", "%{$param['name']}%");
        }
        return Admin::ModelSearch($query, $param, $page, $size);
    }

    public static function save($data)
    {
        $roleIdList = isset($data["roleIdList"]) ? $data["roleIdList"] : [];
        unset($data["roleIdList"]);
        $mod = Admin::create($data);
        if ($mod && !empty($roleIdList)) {
            $temp = [];
            foreach ($roleIdList as $item) {
                $temp[] = ['role_id' => $item, 'admin_id' => $mod->id];
            }
            AdminRole::insert($temp);
        }
        return $mod;
    }

    public static function update($data, $id)
    {
        $roleIdList = isset($data["roleIdList"]) ? $data["roleIdList"] : [];
        unset($data["roleIdList"]);

        $info = Admin::find($id);
        if ($info) {
            if (isset($data["name"]) && $data["name"] != $info->name) {
                if (Admin::where("name", $data["name"])->exists()) {
                    return false;
                }
            }

            $info->update($data);
            AdminRole::where("admin_id", $id)->delete();
            if (!empty($roleIdList)) {
                $temp = [];
                foreach ($roleIdList as $item) {
                    $temp[] = ['role_id' => $item, 'admin_id' => $id];
                }
                AdminRole::insert($temp);
            }
        }
        return $info;
    }

    public static function delete($ids)
    {
        if (!empty($ids)) {
            if (Admin::whereIn("id", $ids)->delete()) {
                AdminRole::whereIn("admin_id", $ids)->delete();
                return true;
            }
        }
        return false;
    }

    public static function userRole($id)
    {
        $info = Admin::find($id);
        if ($info) {
            $info->setAttribute("roleIdList", $roles_id = $info->roles->map(function ($role) {
                return $role->id;
            }));
        }
        return $info;
    }
}
