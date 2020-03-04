<?php

namespace App\Models;

class RoleMenu extends BaseModel
{
    public $timestamps = false;

    protected $fillable = [
        'id',
        'role_id',
        'menu_id',
    ];
}
