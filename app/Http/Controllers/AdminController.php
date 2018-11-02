<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use \DB;
use App\Rapat;
use App\User;
use App\Rapat_User;
use App\Attachment;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function kelola_akun(){
    	$data = [
    		'user' => User::all()
    	];
    	return view('admin.kelola-akun')->with('data', $data);
    }
}
