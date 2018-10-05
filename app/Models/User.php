<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','company_id','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
    * User has many api keys
    */
    public function apikeys(){
        return $this->hasMany(ApiKey::class);
    }

    /**
    * User has many domains
    */
    public function domains(){
        return $this->hasMany(domain::class);
    }

    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }

    public function securityAnswers()
    {
        return $this->hasMany(UserSecurityAnswer::class);
    }

}
