<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/index');
});
//Login
Route::get('/login/admin', 'loginController@admin');
Route::post('/login/loga', 'loginController@log1');
Route::get('logout', 'loginController@logout');

//Admin
Route::get('/admin', function(){return redirect('admin/index');});
Route::get('/admin/index', 'adminController@index')->middleware('admin');
Route::get('/admin/accruangan', 'adminController@accRuangan')->middleware('admin');
Route::post('/admin/lihat', 'adminController@lihat')->middleware('admin');
Route::post('/admin/acc', 'adminController@acc')->middleware('admin');
Route::post('/admin/tolak', 'adminController@del')->middleware('admin');
Route::post('/admin/ubah/{time}','adminController@ubah')->middleware('admin');
Route::post('/admin/add', 'adminController@add')->middleware('admin');
Route::get('/admin/setelan', 'adminController@setting')->middleware('admin');
Route::get('/admin/editpeminjaman', 'adminController@editpeminjaman')->middleware('admin');
Route::get('/admin/suntingpeminjaman/{kodepeminjaman}', 'adminController@halamaneditpinjam')->middleware('admin');
Route::post('/admin/updatepeminjaman', 'adminController@updatepeminjaman')->middleware('admin');
Route::post('/admin/hapus', 'adminController@hapuspeminjaman')->middleware('admin');
Route::post('/admin/tambahruang', 'adminController@tambahruang')->middleware('admin');
Route::post('/admin/tambahinterval', 'adminController@tambahinterval')->middleware('admin');
Route::post('/admin/gantipassword', 'adminController@gantipassword')->middleware('admin');
Route::get('/admin/editinfo', 'adminController@editInfo')->middleware('admin');
Route::post('/admin/tambahpengumuman', 'adminController@tambahPengumuman')->middleware('admin');
Route::get('/admin/hapusInfo/{kodeinfo}', 'adminController@hapusInfo')->middleware('admin');

//umum
Route::get('/index', 'umumController@index');
Route::get('/agenda', 'umumController@agenda');
Route::get('/reservasi', 'umumController@reservasi');
Route::get('/reservasi/{ruangan}/{tanggal}', 'umumController@cekRuangan');
Route::get('/pinjam', 'umumController@pinjam');
Route::post('/isiPinjam', 'umumController@isiPinjam');
Route::get('/feeder/{ruang}', 'umumController@feeding');
Route::get('/feed/{ruang}','umumController@feed');
