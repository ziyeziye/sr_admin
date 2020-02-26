<?php

namespace App\Models;

class Log extends BaseModel
{
    const UPDATED_AT = false;
    const CREATED_AT = false;

    protected $fillable = [
        "id",
        "user_name",
        "operation",
        "method",
        "method",
        "params",
        "response",
        "ip",
        "create_time",
        "old",
        "url",
        "action"
    ];
}
