<?php

namespace App\Services;

use App\Models\BaseModel;

class BaseService
{
    public static $model;

    public function __construct(BaseModel $model)
    {
        self::$model = $model;
    }

    public static function table($param = [], int $page = null, int $size = 15)
    {
        $query = self::$model->query();
        if (isset($param['name']) && !empty($param['name'])) {
            $query = $query->where("name", "like", "%{$param['name']}%");
        }
        return self::$model->ModelSearch($query, $param, $page, $size);
    }

    public static function info($id)
    {
        return self::$model->find($id);
    }

    public static function save($data)
    {
        return self::$model->create($data);
    }

    public static function update($data, $id)
    {
        $info = self::$model->find($id);
        if ($info) {
            $info->update($data);
        }
        return $info;
    }

    public static function delete($ids)
    {
        if (!empty($ids)) {
            if (self::$model->whereIn("id", $ids)->delete()) {
                return true;
            }
        }
        return false;
    }
}
