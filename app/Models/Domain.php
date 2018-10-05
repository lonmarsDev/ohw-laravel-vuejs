<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    //
    /**
	* Domains key belong to user
	*/
	public function user(){
		return $this->belongsTo(User::class);
	}

	/**
     * Regenerate Random Key
     */
    public static function randomNumber($length = 6) {
        $str = "";
        $characters = array_merge(range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
}
