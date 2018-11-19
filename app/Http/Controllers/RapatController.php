<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;
use \DB;
use Carbon\Carbon;
use App\Rapat;
use App\User;
use App\Rapat_User;
use App\Attachment;
use App\Notification;
use App\Notifications\Message;

class RapatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('notification');
    }

    public function buat_rapat(){
        $user = User::all();
        $rapat_saya = Rapat::where('creator_id',Auth::id())->get();
        return view('rapat.buat-rapat')->with('user', $user)->with('rapat_saya', $rapat_saya);
    }    

    public function edit_rapat($id){
        $data = [
            'user' => User::all(),
            'rapat' => Rapat::find($id),
            'notulen' => DB::select('SELECT DISTINCT rapat_user.peserta_aktif FROM rapat_user, rapats WHERE rapat_user.user_id ='. Auth::id() .' AND rapat_user.rapat_id ='.$id.''),            
        ];
        $peserta = DB::select('SELECT rapat_user.user_id FROM rapats, users, rapat_user WHERE rapat_user.user_id = users.id AND rapat_user.rapat_id = '.$id.' AND rapats.id = '.$id.'');
        $arr = [];
        foreach($peserta as $row)
        {
            $arr[] = (array) $row;
        }
        // dd($arr);        
        return view('rapat.edit-rapat')->with('data', $data)->with('ikutserta', $arr);
    }    


    public function create(Request $request){
        //d($request);
        
    	$len_peserta = count($request->peserta);
    	$len_notulen = count($request->notulen);
        // $len_file = count($request->filename);

        if (array_intersect($request->peserta,$request->notulen)) {
            return redirect()->back()->with("error","Maaf, mohon pisahkan peserta dan notulen");
        }

        if(Auth::user()->role = 0){
            if(!in_array(Auth::id(), $request->peserta) AND !in_array(Auth::id(), $request->notulen)){
                return redirect()->back()->with("error","Maaf, pembuat rapat harus ada pada rapat");
            }            
        }

        DB::beginTransaction();
        try {

            $NewRapat = new Rapat;
            $NewRapat->title = $request->title;
            $NewRapat->level = $request->level;
            $NewRapat->waktu = $request->waktu;
            $NewRapat->tempat = $request->tempat;
            $NewRapat->isprivate = $request->isprivate;
            $NewRapat->tag = $request->tags;
            $NewRapat->lock = 0;
            $NewRapat->creator_id = Auth::id();
            $NewRapat->save();

            $request['rapat_id'] = $NewRapat->id;
            
            for ($i=0; $i < $len_peserta ; $i++) { 
                $Rapat_User = new Rapat_User;
                $Rapat_User->user_id = $request->peserta[$i];
                $Rapat_User->rapat_id = $NewRapat->id;
                $Rapat_User->peserta_aktif = 0;
                $Rapat_User->save();
            }

            for ($i=0; $i < $len_peserta ; $i++) { 
                $peserta = User::find($request->peserta[$i]);
                $peserta->notify(new Message($request->all()));
            }

            for ($i=0; $i < $len_notulen ; $i++){
                $notulen = new Rapat_User;
                $notulen->user_id = $request->notulen[$i];
                $notulen->rapat_id = $NewRapat->id;
                $notulen->peserta_aktif = 1;
                $notulen->save();            
            }

            for ($i=0; $i < $len_notulen ; $i++) { 
                $peserta = User::find($request->notulen[$i]);
                $peserta->notify(new Message($request->all()));
            }

            if($request->hasfile('filename')){
                foreach($request->file('filename') as $file){
                    $att = new Attachment;
                    $att->rapats_id = $NewRapat->id;

                    $name = microtime(true).'.'.$file->getClientOriginalName();
                    $file->move(public_path().'/attachment/', $name);  

                    $att->at_title = $name;
                    $att->at_path = "-";
                    $att->save();
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();           
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
            'notulen' => DB::select('SELECT DISTINCT rapat_user.peserta_aktif FROM rapat_user, rapats WHERE rapat_user.user_id ='. Auth::id() .' AND rapat_user.rapat_id ='.$id.''),            
            'peserta' => DB::select('SELECT rapat_user.id, rapats.title, users.name, rapat_user.peserta_aktif FROM rapats, users, rapat_user WHERE rapat_user.user_id = users.id AND rapat_user.rapat_id = '.$id.' AND rapats.id = '.$id.'')
        ];
        // dd($data);
        return view('rapat.notulensi')->with('data', $data);
    }


    public function att_download($id){
        $file_name = Attachment::find($id)->at_title;
        $file_path = public_path('attachment/'.$file_name);
        
        return response()->download($file_path);
    }

    public function get_template($id){
    
        $data = [
            'rapat' => Rapat::find($id),
            'notulen' => DB::select('SELECT DISTINCT rapat_user.peserta_aktif FROM rapat_user, rapats WHERE rapat_user.user_id ='. Auth::id() .' AND rapat_user.rapat_id ='.$id.''),            
            'peserta' => DB::select('SELECT rapat_user.id, rapats.title, users.name, rapat_user.peserta_aktif FROM rapats, users, rapat_user WHERE rapat_user.user_id = users.id AND rapat_user.rapat_id = '.$id.' AND rapats.id = '.$id.'')
        ];        

        return response()->json($data);
    }

    public function autosave(Request $request){

        DB::beginTransaction();
        try {
            $id = $request->input('rapat_id');
            $isi = $request->input('isi');
            $notul = Rapat::find($id);
            $notul->isi = $isi;
            $notul->save();
            $status = 'success';
            
            DB::commit();         

            return response()->json($status);
        } catch (Exception $e) {
            DB::rollback();
        }

    }

    public function show($id, $notif_id){
        $rapat = Rapat::find($id);
        $notif = Notification::find($notif_id);
        $notif->read_at = Carbon::now();
        $notif->save();
        return view('rapat.show')->with('rapat', $rapat);
    }

    public function manualsave(Request $request){
        // dd($request);
        DB::beginTransaction();
        try {
            $id = $request->input('rapat_id');
            $isi = $request->input('isi');


            $notul = Rapat::find($id);
            $notul->isi = $isi;
            $notul->save();

            DB::commit();         

            return redirect()->back();

        } catch (Exception $e) {
            DB::rollback();
        }

    }

    public function delete(Request $request){
        

        DB::beginTransaction();
        try {
        
            $delete_rapat = Rapat::find($request->rapat_id);
            $att = Attachment::where('rapats_id', $request->rapat_id)->get();
            // dd($att);
            if($att != NULL){
                foreach ($att as $file) {
                    $file_title = $file->at_title;
                    $file_path = public_path('attachment/'.$file_title);
                    unlink($file_path);
                }
            }
        
            $delete_rapat->delete();
            
            DB::commit();         
            
            return redirect()->back()->with("error","Rapat terhapus");            

        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function cari(){        
        // dd($data->rapat);
        $flag = 0;
        return view('rapat.cari-rapat')->with('flag', $flag);
    }

    public function search(Request $req)
    {       
        $datax = Auth::user();
        $cari = $req->dicari;

        $data = DB::select('SELECT * FROM rapats 
                WHERE rapats.isi LIKE "%'.$cari.'%" 
                OR rapats.tag LIKE "%'.$cari.'%"
                OR rapats.title LIKE "%'.$cari.'%" AND rapats.isprivate = 0
                ORDER BY title ASC
                ');

        $flag = 1;

        return view('rapat.cari-rapat')->with('data',$data)->with('flag', $flag);
    }

    public function cetak_rapat($id){
        $data = [
            'rapat' => Rapat::find($id),
            'notulen' => DB::select('SELECT DISTINCT rapat_user.peserta_aktif FROM rapat_user, rapats WHERE rapat_user.user_id ='. Auth::id() .' AND rapat_user.rapat_id ='.$id.''),            
            'peserta' => DB::select('SELECT rapat_user.id, rapats.title, users.name, rapat_user.peserta_aktif FROM rapats, users, rapat_user WHERE rapat_user.user_id = users.id AND rapat_user.rapat_id = '.$id.' AND rapats.id = '.$id.'')
        ];        
        // return $rapat;
        return view('rapat.cetak-rapat')->with('data', $data);
    }    

}

// select title, tempat, waktu, level, tag, isi from `rapats` where rapats.isi LIKE "%bro%";