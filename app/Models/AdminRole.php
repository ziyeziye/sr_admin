<?php

namespace App\Models;

class AdminRole extends BaseModel
{
    const CREATED_AT = false;
    const UPDATED_AT = false;
    protected $fillable = [
        'id',
        'role_id',
        'admin_id',
    ];
}
