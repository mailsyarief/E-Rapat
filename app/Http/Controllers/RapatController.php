<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use \DB;
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
            $Rapat_User->user_id = $request->notulen[$i];
            // $Rapat_User->rapat_id = $NewRapat->id;
            $Rapat_User->peserta_aktif = 1;
            $Rapat_User->save();
        }

        return redirect()->route('home');
    }


    public function notulensi($id){
        // $data = [
        //     $rapat = Rapat::find($id),
        //     $peserta = Rapat_User::where('rapat_id',$id)->get(),
        //     $notulensi = Rapat_User::where('peserta_aktif',1)->where('rapat_id',$id)->get(),
        // ];

        $data = [
            'rapat' => Rapat::find($id),
            'peserta' => DB::select('SELECT rapat_user.id, rapats.title, users.name, rapat_user.peserta_aktif FROM rapats, users, rapat_user WHERE rapat_user.user_id = users.id AND rapat_user.rapat_id = '.$id.' AND rapats.id = '.$id.''),
        ];

        return view('notulensi')->with('data', $data);
    }


    public function autosave(Request $request){
        $id = $request->input('rapat_id');
        $isi = $request->input('isi');
        $notul = Rapat::find($id);
        $notul->isi = $isi;
        $notul->save();
        $status = 'success';
        return response()->json($notul->isi);
    }
}
