<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    public function roleMenus()
    {
        $data = RoleService::roleMenus();

        return $this->successWithResult($data);
    }

}
