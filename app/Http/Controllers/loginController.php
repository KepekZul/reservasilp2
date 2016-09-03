<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class loginController extends Controller
{
    public function admin(request $request){
        if($request->session()->has('username_admin')){
            return redirect('admin/index');
        }
    	return view('loginadmin');
    }
    public function dosen(request $request){
        if($request->session()->has('nidn_dosen')){
            return redirect('dosen/index');
        }
        return view('logindosen');
    }
    public function log1(request $request){
    	$berhasil= DB::select('call loginAdmin(?,?)', array($request['id'], $request['pass']));
    	if($berhasil[0]->pesan==1){
            $request->session()->put('username_admin',$request['id']);
            return redirect('admin/index');
    	}else{
    		session::flash('msg', 'Password atau Username tidak sesuai.');
            return redirect()->back();
    	}
    }
    public function log2(request $request){
        $berhasil= DB::select('call loginDosen(?,?)', array($request['id'], $request['pass']));
        if($berhasil[0]->Pesan==1){
            $request->session()->put('nidn_dosen', $request['id']);
            return redirect('dosen/index');
        }else{
            session::flash('msg', 'Password atau NIDN tidak sesuai.');
            return redirect()->back();
        }
    }
    public function logout(request $request){
        $request->session()->flush();
        return redirect('/index');
    }
}