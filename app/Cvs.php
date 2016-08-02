<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Helpers ;

class Cvs extends Model
{
    //
	protected $fillable = [
        'title', 'users_id', 'active', 'introduction'
    ];

    protected $with = ['jobs'];

	public function user(){
		return $this->belongsTo( 'App\User') ;
	}
	public function jobs(){
		$jobs = $this->belongsToMany( 'App\Jobs' )->withPivot('featured')->orderBy('featured', 'desc'); ;
		return $jobs;
	}    
}
