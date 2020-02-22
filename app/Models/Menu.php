<?php

namespace App\Models;

class Menu extends BaseModel
{
    //
    protected $fillable = [
        'id',
        'parent_id',
        'name',
        'url',
        'perms',
        'type',
        'icon',
    ];
}
