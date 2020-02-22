<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

/**
 * 地址管理
 * @package App\Services
 */
class CartService extends BaseService
{
    public static function table($param = [], $page = null, $size = 15)
    {
        $where = [];
        if (isset($param["user_id"]) && is_numeric($param["user_id"])) {
            $where["user_id"] = $param["user_id"];
        }

        $query = Cart::where($where);
        $data = Cart::ModelSearch($query, $param, $page, $size);
        $data->map(function ($item) {
            $item->setAttribute("sku", $item->sku);
        });
        return $data->toArray();
    }

    public static function info($id)
    {
        $data = Cart::find($id);
        return !$data ? false : $data;
    }

    public static function add($data)
    {
        $info = Cart::where([
            "user_id" => $data["user_id"],
            "sku_id" => $data["sku_id"],
        ])->first();
        if (!$info) {
            if (Cart::create($data)) {
                return true;
            }
        }
        return false;
    }

    public static function update($id, $data)
    {
        $info = self::info($id);
        if (!$info) {
            throw new \Exception("商品不存在");
        }

        return $info->update($data);
    }

    /**
     * 移除购物车
     * @param $id
     * @return bool|mixed|null
     * @throws \Exception
     */
    public static function delete($id)
    {
        $info = self::info($id);
        if (!$info) {
            throw new \Exception("商品不存在");
        }

        return $info->delete();
    }

    /**
     * 获取购物车商品列表
     * @param array $param
     * @param null $page
     * @param int $size
     * @return Cart[]|LengthAwarePaginator|Collection|\Illuminate\Support\Collection
     */
    public static function skus($param = [], $page = null, $size = 15)
    {
        $where = [];
        if (isset($param["user_id"]) && is_numeric($param["user_id"])) {
            $where["user_id"] = $param["user_id"];
        }

        $query = Cart::where($where);
        $data = Cart::ModelSearch($query, $param, $page, $size);
        $data = $data->map(function ($item) {
//            $item->setAttribute("sku", $item->sku);
            $sku = $item->sku;
            $sku["number"] = $item["number"];
            return $sku;
        });
        return $data;
    }

    /**
     * 根据条件清空购物车
     * @param $param = ["user_id","store_id","sku_id","status"]
     * @return mixed
     */
    public static function cleanUp($param)
    {
        $where = [];
        if (isset($param["user_id"]) && is_numeric($param["user_id"])) {
            $where["user_id"] = $param["user_id"];
        }
        if (isset($param["store_id"]) && is_numeric($param["store_id"])) {
            $where["store_id"] = $param["store_id"];
        }
        if (isset($param["sku_id"]) && is_numeric($param["sku_id"])) {
            $where["sku_id"] = $param["sku_id"];
        }
        if (isset($param["status"]) && is_numeric($param["status"])) {
            $where["status"] = $param["status"];
        }

        return Cart::where($where)->delete();
    }
}
