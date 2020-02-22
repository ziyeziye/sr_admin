<?php

namespace App\Models;

class Menu extends BaseModel
{
    const CREATED_AT = false;
    const UPDATED_AT = false;

    protected $fillable = [
        'id',
        'parent_id',
        'name',
        'url',
        'perms',
        'type',
        'icon',
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
