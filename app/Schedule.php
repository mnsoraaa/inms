<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    public $timestamps = false;

    public function facultysv()
    {
        return $this->belongsTo('App\User', 'facultySVID');
    }
}
