<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	/**
	* Company has many users
	*/
    public function users(){
    	return $this->hasMany(User::class,'company_id');
    }

    /*
    * Company has owner
    */
    public function owner(){
    	return $this->users()->where('is_owner',true);
    }
}
