<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    //
    protected $table = 'qualification';

    protected $fillable = [
        'subject', 'level', 'grade'
    ];
    public function education(){
        return $this->belongsTo( 'App\Education') ;
    }

}
