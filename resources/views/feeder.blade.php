<html>
<head>
	<title>feed ruangan</title>
<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/sb-admin.css') }}" rel="stylesheet">
<link href="{{ URL::asset('css/plugins/morris.css') }}" rel="stylesheet">
</head>
<body style="background-color:white">
	now
	@if($now!=null)
	{{$now[0]->nama_kegiatan}}
	{{$now[0]->waktu_mulai_permohonan_peminjaman}}
	{{$now[0]->waktu_selesai_permohonan_peminjaman}}
	@else
	kosong
	@endif
	<br>
	next
	@if($next!=null)
	{{$next[0]->nama_kegiatan}}
	{{$next[0]->waktu_mulai_permohonan_peminjaman}}
	{{$next[0]->waktu_selesai_permohonan_peminjaman}}
	@else
	kosong
	@endif
</body>
</html>