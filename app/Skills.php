<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    //
    protected $fillable = [
        'skill_id', 'job_id'
    ];
    
    public function job(){
		return $this->belongsTo( 'App\Jobs') ;
    }
 
   public function skill_list(){
		return $this->hasOne( 'App\SkillList') ;
	}
   
}
