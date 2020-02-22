<?php

namespace App\Services;

use App\Models\Menu;

class RoleService extends BaseService
{
    public static function roleMenus()
    {
        $list = Menu::query()
            ->select('id', 'parent_id', 'name', 'url', 'type', 'icon', 'perms', 'orders')
//            ->where(['parent_id' => 0])
            ->whereIn('type', [0, 1])
            ->orderBy('orders', 'asc')
            ->get()
            ->toArray();

        $tree = [];
        $tree = list2tree($list, 'id', 'parent_id', 'list', 0, $tree);

        return [
            'menuList' => $tree,
            'permissions' => [],
        ];
    }






}
