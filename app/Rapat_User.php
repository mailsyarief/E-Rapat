<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapat_User extends Model
{
    //
    protected $table = 'rapat_user';

    protected $fillable = [
    	'user_id','rapat_id','peserta_aktif'
    ];
}
