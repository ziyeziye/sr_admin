<?php

namespace App\Services;


use App\Models\Manager;
use App\Models\ManagerRole;

class ManagerService extends BaseService
{
    public static function table($param = [], int $page = null, int $size = 15)
    {
        $query = Manager::query();
        if (isset($param['name']) && !empty($param['name'])) {
            $query = $query->where("name", "like", "%{$param['name']}%");
        }
        return Manager::ModelSearch($query, $param, $page, $size);
    }

    public static function save($data)
    {
        $roleIdList = isset($data["roleIdList"]) ? $data["roleIdList"] : [];
        unset($data["roleIdList"]);
        $mod = Manager::create($data);
        if ($mod && !empty($roleIdList)) {
            $temp = [];
            foreach ($roleIdList as $item) {
                $temp[] = ['role_id' => $item, 'admin_id' => $mod->id];
            }
            ManagerRole::insert($temp);
        }
        return $mod;
    }

    public static function update($data, $id)
    {
        $roleIdList = isset($data["roleIdList"]) ? $data["roleIdList"] : [];
        unset($data["roleIdList"]);

        $info = Manager::find($id);
        if ($info) {
            if (isset($data["name"]) && $data["name"] != $info->name) {
                if (Manager::where("name", $data["name"])->exists()) {
                    return false;
                }
            }

            $info->update($data);
            ManagerRole::where("admin_id", $id)->delete();
            if (!empty($roleIdList)) {
                $temp = [];
                foreach ($roleIdList as $item) {
                    $temp[] = ['role_id' => $item, 'admin_id' => $id];
                }
                ManagerRole::insert($temp);
            }
        }
        return $info;
    }

    public static function delete($ids)
    {
        if (!empty($ids)) {
            if (Manager::whereIn("id", $ids)->delete()) {
                ManagerRole::whereIn("admin_id", $ids)->delete();
                return true;
            }
        }
        return false;
    }

    public static function userRole($id)
    {
        $info = Manager::find($id);
        if ($info) {
            $info->setAttribute("roleIdList", $roles_id = $info->roles->map(function ($role) {
                return $role->id;
            }));
        }
        return $info;
    }
}
