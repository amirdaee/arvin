<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Department extends Model
{
    use NodeTrait;

    protected $fillable = [
        'name','note','parent_id','_lft','_rgt','manager_id'
    ];
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function getParent(){
        return $this->find($this->parent_id);
    }

    public function manager()
    {
        return $this->belongsTo('App\User');
    }
}
