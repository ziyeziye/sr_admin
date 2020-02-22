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

    public function menus()
    {
        return $this->belongsToMany('App\Models\Menu', 'role_menus', 'role_id', 'menu_id')->withPivot(['role_id', 'menu_id']);
    }

    public function roleMenus()
    {
        return $this->hasMany('App\Models\RoleMenu');
    }
}
