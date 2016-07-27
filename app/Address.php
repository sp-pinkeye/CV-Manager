<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	protected $table = 'address' ;
	protected $fillable = [
        'address1', 'address2','address3','city','state','postcode','country','user_id',  'education_id'
    ];

    public function user(){
        return $this->belongsTo( 'App\User') ;
    }
    public function education(){
        return $this->belongsTo( 'App\Education') ;
    }
}
