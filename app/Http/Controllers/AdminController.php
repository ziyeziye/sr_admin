<?php

namespace App\Http\Controllers;

use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends BaseController
{
    public function table()
    {
        //获取数据
        $page = get_page('pageNum', 'pageSize');
        $where = request()->input();

//        $where["fields"] = [
//            "id",
//            "store_id",
//            "category_id",
//            "name",
//            "description",
//            "thumb",
//            // "content",
//            "type",
//            "attributes",
//            "sales",
//            // "images",
//        ];
        $result = AdminService::table($where, $page["page"]);
        return $this->successWithResult($result);
    }

    public function login_info()
    {
        return $this->successWithResult(Auth::user());

    }

}
