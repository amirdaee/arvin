<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project','company','note'
    ];
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
