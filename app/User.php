<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function isVerified()
    {
        if ($this->verified)
        {
            return true;
        }
        return false;
    }


    public function isAdmin()
    {
        if ($this->admin)
        {
            return true;
        }
        return false;
    }


    public function isActive()
    {
        if ($this->active)
        {
            return true;
        }
        return false;
    }


    public function papers()
    {
        return $this->hasMany(Paper::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

}
