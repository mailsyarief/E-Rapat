<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rapat;
use App\User;
use App\Rapat_User;

class RapatController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request){
    	// dd($request);

    	$len_peserta = count($request->peserta);
    	$len_notulen = count($request->notulen);

    	$NewRapat = new Rapat;
    	$NewRapat->title = $request->title;
    	$NewRapat->level = $request->level;
    	$NewRapat->waktu = $request->waktu;
    	$NewRapat->tempat = $request->tempat;
    	$NewRapat->tag = $request->tags;
        $NewRapat->lock = 0;
        $NewRapat->save();

        for ($i=0; $i < $len_peserta ; $i++) { 
            $Rapat_User = new Rapat_User;
            $Rapat_User->user_id = $request->peserta[$i];
            $Rapat_User->rapat_id = $NewRapat->id;
            $Rapat_User->peserta_aktif = 0;
            $Rapat_User->save();
        }

        for ($i=0; $i < $len_notulen ; $i++) { 
            $Rapat_User = new Rapat_User;
            $Rapat_User->user_id = $request->notulen[$i];
            $Rapat_User->rapat_id = $NewRapat->id;
            $Rapat_User->peserta_aktif = 1;
            $Rapat_User->save();
        }

        return redirect()->url('/');
    }
}
