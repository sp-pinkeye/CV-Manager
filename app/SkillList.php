<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillList extends Model
{
    //
    protected $table = 'skill_list';
        
     protected $fillable = [
        'name', 'version','user_id', 'experience'
    ];

  	public function user(){
		return $this->belongsTo( 'App\Users') ;
    }
  	public function skill(){
		return $this->belongsTo( 'App\Skills') ;
    }
}
