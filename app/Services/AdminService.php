<?php

namespace App\Services;


use App\Models\Admin;

class AdminService extends BaseService
{
    public static function table($param = [], int $page = null, int $size = 15)
    {
        $where = [];
        if (isset($param['store_id']) && is_numeric($param['store_id'])) {
            $where['store_id'] = $param['store_id'];
        }
        $query = Admin::where($where);
        $data = Admin::ModelSearch($query, $param, $page, $size);
        return $data;
    }

    public static function ListToTree($list, $primaryKey = 'id', $parentKey = 'pid', $childStr = 'children', $root = 0, array &$tree)
    {

        if (is_array($list)) {

            //创建基于主键的数组引用
            $refer = array();

            foreach ($list as $key => $data) {
                $refer[$data[$primaryKey]] = &$list[$key];
            }

            foreach ($list as $key => $data) {

                //判断是否存在parent
                $parantId = $data[$parentKey];

                if ($root == $parantId) {


                    $tree[] = &$list[$key];

                } else {

                    if (isset($refer[$parantId])) {
                        $parent = &$refer[$parantId];
                        $parent[$childStr][] = &$list[$key];
                    }

                }
            }
        }

        return $tree;
    }


}
