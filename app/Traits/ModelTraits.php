<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 *  基础模型
 *
 * Class Base
 * @package App\Models
 *
 * @mixin Builder
 */
trait ModelTraits
{
    /**
     * @param $model
     * @param array $option
     * @param int|null $page
     * @param int $size
     * @return mixed
     */
    public static function ModelSearch($model, $option = [], int $page = null, int $size = 15)
    {
        if (isset($option['order_by']) && is_array($option['order_by'])) {
            $model = $model->orderBy($option['order_by']['order'], $option['order_by']['desc']);
        }

        if (!isset($option['fields'])) {
            $option['fields'] = ['*'];
        }

        if (is_numeric($page)) {
            $data = $model->paginate($size, $option['fields'], 'page', $page);
        } else {
            $data = $model->select($option['fields'])->get();
        }
        return $data;
    }

}
