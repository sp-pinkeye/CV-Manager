<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Helpers ;

class Cvs extends Model
{
    //
	protected $fillable = [
        'title', 'users_id', 'active'
    ];

	public function user(){
		return $this->belongsTo( 'App\User') ;
	}
	public function jobs(){
		$jobs = $this->hasMany( 'App\Jobs' ) ;
		return $jobs;	
	}    
}
