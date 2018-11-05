<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rapat;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
Use \DB;

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

    public function rapat_saya(){
        $rapat = Rapat::where('creator_id', Auth::id())->get();
        // $data = Auth::user();
        // $rapat_saya = $data->rapat->where('creator_id',Auth::id());
        return view('home')->with('data',$rapat);
    }

    public function update_akun(Request $request){
        // dd($request);
        
        DB::beginTransaction();
        try {

            $id = $request->id;
            $user = User::find($id);
            $user->name = $request->username;
            $user->nik = $request->nik; 
            $user->email = $request->email; 
            $user->nik = $request->nik;
            
            if($request->password){
                $pass = Hash::make($request->password);
                $user->password = $pass;
            } 

            if($request->jabatan){
                $user->jabatan = $request->jabatan;
            }

            if($request->role){
                $user->role = $request->role;
            }

            $user->save();

            DB::commit(); 
            
        } catch (Exception $e) {
            DB::rollback();
        }


        return redirect()->back();
    }    
            
}
