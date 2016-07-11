<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'name', 'email', 'telephone', 'mobile', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
   public function address(){
		return $this->hasOne( 'App\Address') ;
	}
   public function cvs(){
		return $this->hasMany( 'App\Cvs') ;
	}
   public function skill_list(){
		return $this->hasMany( 'App\SkillList') ;
	}

}
