<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	protected $primaryKey = 'id';

    public $incrementing = false;
    
    protected $table = 'notifications';

    protected $fillable = [
    	'read_at'
    ];}
