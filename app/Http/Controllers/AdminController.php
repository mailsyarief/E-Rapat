<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

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
        $this->middleware('notification');
    }

    public function kelola_akun(){
    	$data = [
    		'user' => User::all()
    	];
    	return view('admin.kelola-akun')->with('data', $data);
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
            $user->jabatan = $request->jabatan;
            $user->role = $request->role;
            
            if($request->password){
                $pass = Hash::make($request->password);
                $user->password = $pass;
            } 

            $user->save();

            DB::commit(); 
            
        } catch (Exception $e) {
            DB::rollback();
        }


        return redirect()->back();
    }    

    
}
