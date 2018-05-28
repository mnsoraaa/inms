<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    //

    public function student()
    {
        return $this->belongsTo('App\User', 'studentID');
    }

    public function facultysv()
    {
        return $this->belongsTo('App\User', 'facultySVID');
    }
}
