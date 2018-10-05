<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Role extends Model
{
     use SoftDeletes;
	/**
	* Role belongs to many Permission
	*/
    public function permissions(){
    	return $this->belongsToMany(Permission::class);
    }
    /**
    * Role has many Users
    */
    public function users(){
    	return $this->hasMany(User::class);
    }
}
