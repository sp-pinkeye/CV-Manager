<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    //
    protected $table = 'qualification';

    protected $fillable = [
        'subject', 'level', 'grade', 'user_id', 'education_id'
    ];
    public function education(){
        return $this->belongsTo( 'App\Education') ;
    }

}
