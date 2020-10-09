<?php

namespace App;

use Shanmuga\LaravelEntrust\Models\EntrustRole;

class Role extends EntrustRole
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'display_name','description'
    ];
}
