<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';

    protected $fillable = [
        'establishment', 'start', 'end'
    ];

    protected $dates = ['start', 'end'];

    public function user(){
        return $this->belongsTo( 'App\User') ;
    }
    public function address(){
        return $this->hasOne( 'App\Address') ;
    }

    //
    public function qualifications()
    {
       return $this->hasMany('App\Qualification') ;

    }
}
