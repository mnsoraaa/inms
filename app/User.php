<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roleName(){

        if($this->position == 1){
            return 'jjim';
        }elseif($this->position == 2){
            return 'coordinator';
        }elseif($this->position == 3){
            return 'facultysv';
        }elseif($this->position == 4){
            return 'industrialsv';
        }elseif($this->position == 5){
            return 'student';
        }
    }

    public function isJJIM(){
        return $this->position == 1;
    }

    public function isCoordinator(){
        return $this->position == 2;
    }

    public function isFacultySV(){
        return $this->position == 3;
    }

    public function isIndustrialSV(){
        return $this->position == 4;
    }

    public function isStudent(){
        return $this->position == 5;
    }

    public function userPosition(){
        return $this->position;
    }
}
