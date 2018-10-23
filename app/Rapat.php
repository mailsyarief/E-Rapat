<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    //
    protected $fillable = [
      'title','tempat','waktu','level','tag',
      'lock',
    ];

    public function Att(){
    	return $this->hasMany('App\Attachment', 'id');
    }

    public function User(){
    	return $this->belongsToMany('App\User');
    }

}