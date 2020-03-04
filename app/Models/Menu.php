<?php

namespace App\Models;

class Menu extends BaseModel
{
    public $timestamps = false;

    protected $fillable = [
        'id',
        'parent_id',
        'name',
        'url',
        'perms',
        'type',
        'icon',
        'orders',
    ];

    protected $appends = [
        "parent_name",
    ];

    public function getParentNameAttribute()
    {
        $parentName = self::where("id", $this->parent_id)->value("name");
        return $parentName ?: "一级菜单";
    }

}
