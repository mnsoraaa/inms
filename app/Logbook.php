<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    //
    public $timestamps = false;
	
	    public function student()
    {
        return $this->belongsTo('App\User', 'studentID');
    }
	
		public function facultysv()
    {
        return $this->belongsTo('App\User', 'studentID');
    }
}
?>
