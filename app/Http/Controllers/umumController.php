<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class umumController extends Controller
{
    public function index(){
        $pengumuman = DB::select('select info_info from info_center;');
    	return view('index', ['pengumuman' => $pengumuman]);
    }
    public function reservasi(){
        $jadwal = DB::select('SELECT DAYNAME(tanggal_mulai_permohonan_peminjaman) AS "day", waktu_mulai_permohonan_peminjaman AS "mulai", waktu_selesai_permohonan_peminjaman AS "selesai", nama_kegiatan AS "event", rutinitas_peminjaman AS "Note" FROM daftar_permohonan WHERE status_permohonan="Disetujui" AND kali_peminjaman>1 AND kode_permohonan IN (SELECT kode_permohonan FROM waktu_kegiatan WHERE tanggal_kegiatan >= CURDATE() AND tanggal_kegiatan <= ADDDATE(CURDATE(),INTERVAL 7 DAY) )ORDER BY DAYOFWEEK(tanggal_mulai_permohonan_peminjaman) ASC');
    	return view('jadwal', ['jadwal'=>$jadwal]);
    }
    public function pinjam(){
    	$ruangan=DB::select('select * from ruangan');
    	$rutinitas=DB::select('select * from rutinitas');
    	return view('formpinjam', ['ruangan'=>$ruangan,'rutinitas'=>$rutinitas]);
    }
    public function isiPinjam(Request $request){
    	DB::select('call isiPemohon(?,?,?)', array($request['nama'], $request['telp'], $request['email']));
        $pengisian = DB::select('call isiPermohonan(?,?,?, ?,?,?, ?,?,?)', array($request['nama'],$request['keg'], $request['tglmulai'], $request['wktmulai'], $request['wktselesai'], $request['badan'], $request['ruang'], $request['rutin'], $request['kali']));
        if($pengisian[0]->pesan==1){
            session::flash('msg', 'Permohonan telah diterima tunggu persetujuan dari bagian tata usaha. Kode permohonan anda '.$pengisian[0]->Kode_Pemesanan);
            return redirect()->back();
        }else{
            session::flash('msg', 'Permohonan tidak dapat diterima karena pada saat bersamaan telah ada kegiatan lain');
            return redirect()->back();
        }
    }
    function autocom($nama){
        $data = DB::select('select * from pemohon where nama_pemohon = ?', array($nama));
        return response()->json(['data'=>$data]);
    }
    function cekRuangan($ruangan, $tanggal){
        $kegiatan = DB::select('call lihatKegiatan(?,?)', array($ruangan, $tanggal));
        return response()->json(['kegiatan'=>$kegiatan]);
    }
    function feed($ruang){
        $now = DB::select('call lihatKegiatanSekarang(?)', array($ruang));
        $next = DB::select('call lihatKegiatanBerikut(?)', array($ruang));
        $jam = DB::select('SELECT HOUR(CURTIME()) AS "jam";');
        $menit = DB::select('SELECT MINUTE(CURTIME()) AS "menit";');
        return view('feed', ['now'=>$now, 'next'=>$next, 'ruang'=>$ruang, 'jam'=>$jam, 'menit'=>$menit]);
    }
    function feeding($ruang){
        $now = DB::select('call lihatKegiatanSekarang(?)', array($ruang));
        $next = DB::select('call lihatKegiatanBerikut(?)', array($ruang));
        $jam = DB::select('SELECT HOUR(CURTIME()) AS "jam";');
        $menit = DB::select('SELECT MINUTE(CURTIME()) AS "menit";');
        return response()->json(['now'=>$now, 'next'=>$next, 'ruang'=>$ruang, 'jam'=>$jam, 'menit'=>$menit]);
    }
}