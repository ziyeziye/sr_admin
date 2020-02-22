<?php

namespace App\Models;

use App\Traits\ModelTraits;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

/**
 * Class User
 * @package App\Models
 *
 * @mixin Builder
 */
class Admin extends Authenticatable
{
    use ModelTraits;
    use Notifiable;

    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'password',
        'sex',
        'email',
        'mobile',
        'status',
        'create_admin_id',
        'create_time',
        'update_time',
        'remake',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 生成api_token
     * @param int $expiresTime 过期时间,默认30分钟
     * @return string
     */
    public function generateToken($expiresTime = 1800)
    {
        $token = Str::random(80);
        $api_token = hash('sha256', $token);
        $this->api_token = $api_token;
        $this->expires_at = date("Y-m-d H:i:s", time() + $expiresTime);
        $this->save();
        return $token;
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'admin_roles', 'admin_id', 'role_id')->withPivot('admin_id', 'role_id');
    }
}
