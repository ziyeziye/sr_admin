<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Menu;
use App\Models\Role;
use App\Models\RoleMenu;
use Illuminate\Support\Facades\Auth;

class RoleService extends BaseService
{
    public static function table($param = [], int $page = null, int $size = 15)
    {
        $query = Role::query();
        if (isset($param['role_name']) && !empty($param['role_name'])) {
            $query = $query->where("role_name", "like", "%{$param['role_name']}%");
        }
        return Role::ModelSearch($query, $param, $page, $size);
    }

    public static function save($data)
    {
        $menuIdList = isset($data["menuIdList"]) ? $data["menuIdList"] : [];
        unset($data["menuIdList"]);
        $mod = Role::create($data);
        if ($mod && !empty($menuIdList)) {
            $temp = [];
            foreach ($menuIdList as $item) {
                $temp[] = ['menu_id' => $item, 'role_id' => $mod->id];
            }
            RoleMenu::insert($temp);
        }
        return $mod;
    }

    public static function update($data, $id)
    {
        $menuIdList = isset($data["menuIdList"]) ? $data["menuIdList"] : [];
        unset($data["menuIdList"]);

        $info = Role::find($id);
        if ($info) {
            $info->update($data);
            RoleMenu::where("role_id", $id)->delete();
            if (!empty($menuIdList)) {
                $temp = [];
                foreach ($menuIdList as $item) {
                    $temp[] = ['menu_id' => $item, 'role_id' => $id];
                }
                RoleMenu::insert($temp);
            }
        }
        return $info;
    }

    public static function delete($ids)
    {
        if (!empty($ids)) {
            if (Role::whereIn("id", $ids)->delete()) {
                RoleMenu::whereIn("role_id", $ids)->delete();
                return true;
            }
        }
        return false;
    }

    public static function permissions($user)
    {
        $permissions = [];
        $menus = [];
        if (is_string($user) && $user == "admin") {
            Menu::all()->map(function ($menu) use (&$permissions, &$menus) {
                if (in_array($menu->type, [0, 1])) {
                    $menus[] = $menu->toArray();
                }
                $perms = trim($menu->perms);
                $permArr = array_filter(explode(',', $perms));
                if (!empty($permArr)) {
                    $permissions = array_merge($permissions, $permArr);
                }
            });
        } else {
            Auth::user()->roles->map(function ($role) use (&$permissions, &$menus) {
                $role->menus()->orderBy("orders","asc")->get()->map(function ($menu) use (&$permissions, &$menus) {
                    if (in_array($menu->type, [0, 1])) {
                        $menus[] = $menu->toArray();
                    }

                    $perms = trim($menu->perms);
                    $permArr = array_filter(explode(',', $perms));
                    if (!empty($permArr)) {
                        $permissions = array_merge($permissions, $permArr);
                    }
                });
            });
        }

        $tree = [];
        $tree = list2tree($menus, 'id', 'parent_id', 'list', 0, $tree);
        return [
            'menuList' => $tree,
            'permissions' => $permissions,
        ];
    }

    public static function roleMenu($id)
    {
        $info = Role::find($id);
        if ($info) {
            $info->setAttribute("menuIdList", $roles_id = $info->roleMenus->map(function ($role) {
                return $role->menu_id;
            }));
        }
        return $info;
    }


}
