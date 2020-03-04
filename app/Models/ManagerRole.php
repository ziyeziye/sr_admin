<?php

namespace App\Models;

class ManagerRole extends BaseModel
{
    public $timestamps = false;

    protected $fillable = [
        'id',
        'role_id',
        'admin_id',
    ];
}
