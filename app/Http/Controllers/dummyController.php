<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class dummyController extends Controller
{
    public function fetch(){
    	$data = DB::select('select kode_permohonan from daftar_permohonan');
    	return print_r($data);
    }
}