<?php

namespace App\Services;

use App\Models\Menu;
use App\Models\RoleMenu;

class MenuService extends BaseService
{
    public static function table($param = [], int $page = null, int $size = 15)
    {
        $query = Menu::query();
        if (isset($param['role_name']) && !empty($param['role_name'])) {
            $query = $query->where("role_name", "like", "%{$param['role_name']}%");
        }
        if (isset($param['type']) && !empty($param['type'])) {
            $query = $query->whereIn("type", $param['type']);
        }
        return Menu::ModelSearch($query, $param, $page, $size);
    }

    public static function save($data)
    {
        return Menu::create($data);
    }

    public static function update($data, $id)
    {
        $info = Menu::find($id);
        if ($info) {
            $info->update($data);
        }
        return $info;
    }

    public static function delete($ids)
    {
        if (!empty($ids)) {
            if (Menu::whereIn("id", $ids)->delete()) {
                RoleMenu::whereIn("menu_id", $ids)->delete();
                return true;
            }
        }
        return false;
    }

}
