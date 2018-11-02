<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rapat;
use App\User;
use Auth;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$data = Auth::user();
        // dd($data->rapat);
    	return view('home')->with('data',$data->rapat);
    }

    public function buat_rapat(){
        $user = User::all();
    	return view('buat-rapat')->with('user', $user);
    }    
}
