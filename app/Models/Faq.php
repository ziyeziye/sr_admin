<?php

namespace App\Models;

class Faq extends BaseModel
{
    protected $fillable = [
        "id",
        "name",
        "content",
        "create_time",
        "update_time",
    ];
}
