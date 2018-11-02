<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \DB;
use App\Rapat;
use App\User;
use App\Rapat_User;
use App\Attachment;

class RapatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function buat_rapat(){
        $user = User::all();
        return view('rapat.buat-rapat')->with('user', $user);
    }    

    public function create(Request $request){
        // dd($request);
    	$len_peserta = count($request->peserta);
    	$len_notulen = count($request->notulen);
        // $len_file = count($request->filename);

        if (array_intersect($request->peserta,$request->notulen)) {
            return redirect()->back()->with("error","Maaf, mohon pisahkan peserta dan notulen");
        }

        DB::beginTransaction();
        try {

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

            for ($i=0; $i < $len_notulen ; $i++){
                $notulen = new Rapat_User;
                $notulen->user_id = $request->notulen[$i];
                $notulen->rapat_id = $NewRapat->id;
                $notulen->peserta_aktif = 1;
                $notulen->save();            
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
            'notulen' => DB::select('SELECT rapat_user.peserta_aktif FROM rapat_user, rapats WHERE rapat_user.user_id ='. Auth::id() .' AND rapat_user.rapat_id ='.$id.''),            
            'peserta' => DB::select('SELECT rapat_user.id, rapats.title, users.name, rapat_user.peserta_aktif FROM rapats, users, rapat_user WHERE rapat_user.user_id = users.id AND rapat_user.rapat_id = '.$id.' AND rapats.id = '.$id.''),
        ];
        // dd($data);
        return view('rapat.notulensi')->with('data', $data);
    }


    public function att_download($id){
        $file_name = Attachment::find($id)->at_title;
        $file_path = public_path('attachment/'.$file_name);
        
        return response()->download($file_path);
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

    public function delete($id){

        DB::beginTransaction();
        try {
        
            $delete_rapat = Rapat::find($id);
            $att = Attachment::where('rapats_id', $id)->get();
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
}
