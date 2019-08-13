<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    protected $uploads = "/images/";

    protected $fillable = ['file'];

    public function user(){
        return $this->hasOne('App\User');
    }

    
    public function post(){
        return $this->hasOne('App\Post');
    }


    public function getFileAttribute($value){
        return $this->uploads . $value;
    }

}
