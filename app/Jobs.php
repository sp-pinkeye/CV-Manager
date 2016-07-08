<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon ;

class Jobs extends Model
{
    //
      protected $fillable = [
        'company', 'summary', 'description', 'start', 'end', 'user_id', 'cvs_id', 'order'
    ];
    
    //protected $dates = ['created_at', 'updated_at', 'start', 'end'];
    public function cvs(){
		return $this->belongsTo( 'App\Cvs') ;
    }
    	
    public function skills()
    {
    		$skills = $this->hasMany('App\Skills') ;
    		
        return $skills ;
    }
    
    // Date formats
    public function setStartAttribute($value){
    	$start =  Carbon::parse( $value );
		return $start->format( 'Y-m-d H:i:s');
    }
    public function getStartAttribute($value){
    	$start =  Carbon::parse( $value );
		return $start->format( 'd-m-Y');

    }

    public function setEndAttribute($value){
    	$end =  Carbon::parse( $value );
		return $end->format( 'Y-m-d H:i:s');

    }
    public function getEndAttribute($value){
    	$end =  Carbon::parse( $value );
		return $end->format( 'd-m-Y');
    }

}