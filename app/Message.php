<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    public $timestamps = false;
    
    public function sender()
    {
        return $this->belongsTo('App\User', 'senderID');
    }

    public function receiver()
    {
        return $this->belongsTo('App\User', 'receiverID');
    }
}
