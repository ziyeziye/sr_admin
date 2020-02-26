<?php

namespace App\Http\Controllers;

use App\Models\Log;

class LogController extends BaseController
{
    public function table()
    {
        $page = get_page();
        $where = request()->input();
        $option['order_by'] = ["order" => "create_time", "desc" => "desc"];
        $query = Log::query();
        if (isset($where['user_name']) && !empty($where['user_name'])) {
            $query = $query->where("user_name", "like", "%{$where['user_name']}%");
        }
        if (isset($where['operation']) && !empty($where['operation'])) {
            $query = $query->where("operation", "like", "%{$where['operation']}%");
        }
        $result = Log::ModelSearch($query, $option, ...$page);
        return $this->successWithResult($result);
    }


}
