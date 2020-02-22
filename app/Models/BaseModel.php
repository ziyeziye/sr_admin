<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 *  基础模型
 *
 * Class Base
 * @package App\Models
 *
 * @mixin Builder
 */
class BaseModel extends Model
{
    use \App\Traits\ModelTraits;
}
