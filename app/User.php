<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'giang_vien_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $attributes = ['role' => 'giang_vien', 'avatar' => 'no_avatar.png', 'name' => 'Not set'];

    public function giang_vien()
    {
        return $this->belongsTo(Giang_vien::class);
    }

    public static function get_all_roles()
    {
        return ['admin' => 'Admin', 'giang_vien' => 'Giảng viên'];
    }

    public function get_role()
    {
        return User::get_all_roles()[$this->role];
    }
}
