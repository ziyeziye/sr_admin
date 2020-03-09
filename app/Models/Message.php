<?php

namespace App\Models;

class Message extends BaseModel
{
    protected $fillable = [
        "id",
        "reply",
        "content",
        "create_time",
        "update_time",
    ];
}
