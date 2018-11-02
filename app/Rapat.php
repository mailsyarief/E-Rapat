<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    //
    protected $fillable = [
      'title','tempat','waktu','level','tag',
      'lock','isi'
    ];

    public function Att(){
    	return $this->hasMany('App\Attachment', 'rapats_id', 'id');
    }

    public function User(){
    	return $this->belongsToMany('App\User')->withPivot('peserta_aktif');
    }

}
