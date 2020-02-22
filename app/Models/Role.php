<?php

namespace App\Models;

class Role extends BaseModel
{
    //
    protected $fillable = [
        'id',
        'role_name',
        'remark',
        'create_admin_id',
        'create_time',
        'update_admin_id',
        'update_time',
    ];
}
