<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Shanmuga\LaravelEntrust\Traits\LaravelEntrustUserTrait;

class User extends Authenticatable
{
    use LaravelEntrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','first_name','last_name', 'email', 'password','national_id','mobile','department_id'
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

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function managerDepartmetns()
    {
        return $this->hasMany('App\Department');
    }
    public function projecs()
    {
        return $this->belongsToMany('App\Project');
    }

}
