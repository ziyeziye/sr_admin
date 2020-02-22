<?php

namespace App\Models;

class RoleMenu extends BaseModel
{
    const CREATED_AT = false;
    const UPDATED_AT = false;
    protected $fillable = [
        'id',
        'role_id',
        'menu_id',
    ];
}
