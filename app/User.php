<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DateTime;
use Carbon\Carbon;
use Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }


    public function photo(){
        return $this->belongsTo('App\Photo');
    }


    /*
    public function setPasswordAttribute($value){

       
        $this->attributes['password'] = Hash::make($value);
    }  */

    /*
    public function getCreatedAtAttribute($value){
        $new_value = DateTime::createFromFormat('Y-m-d H:i:s', $value);
         return date_format($new_value, 'g:ia \o\n l jS F Y');
    }

    public function getUpdatedAtAttribute($value){
        $new_value = DateTime::createFromFormat('Y-m-d H:i:s', $value);
         return date_format($new_value, 'g:ia \o\n l jS F Y');
    }  */
}
