<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.adminHead')
    <script type="text/javascript">
        function ini(){
            document.getElementById("editpinjam").className="active";
        }
    </script>
</head>

<body onload="ini()">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            @include('layouts.adminNavbar')
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid" style="height:100%">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Peminjaman Lab</h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->

                <div class="row">
                    <div class="well">
            <form role="form" action="/admin/updatepeminjaman" method="POST">
                <h4>Nama Lengkap:</h4>
                <div class="form-group">
                    <input type="text" name="nama" class="form-control" autocomplete="false" value="{{$pemohon[0]->nama_pemohon}}" disabled>
                </div>
                <h4>No. Telepon:</h4>
                <div class="form-group">
                    <input type="text" name="telp" class="form-control" value="{{$pemohon[0]->nomor_telepon_pemohon}}" disabled>
                </div>
                <h4>Email:</h4>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" value="{{$pemohon[0]->email_pemohon}}" disabled>
                </div>
                <h4>Nama Kegiatan:</h4>
                <div class="form-group">
                    <input type="text" name="keg" class="form-control" value="{{$data[0]->nama_kegiatan}}">
                </div>
                <h4>Tanggal Mulai Kegiatan:</h4>
                <div class="form-group">
                    <input type="date" name="tglmulai" class="form-control" value="{{$data[0]->tanggal_mulai_permohonan_peminjaman}}">
                </div>
                <h4>Waktu Mulai Kegiatan:</h4>
                <div class="form-group">
                    <input type="time" name="wktmulai" class="form-control" value="{{$data[0]->waktu_mulai_permohonan_peminjaman}}">
                </div>
                <h4>Waktu Selesai Kegiatan:</h4>
                <div class="form-group">
                    <input type="time" name="wktselesai" class="form-control" value="{{$data[0]->waktu_selesai_permohonan_peminjaman}}">
                </div>
                <h4>Badan Pelaksana Kegiatan:</h4>
                <div class="form-group">
                    <input type="text" name="badan" class="form-control" value="{{$data[0]->badan_pelaksana_kegiatan}}" disabled>
                </div>
                <input type="hidden" name="ruang" value="{{$data[0]->nama_ruangan}}">
                <h4>Rutinitas:</h4>
                <div class="form-group">
                    <select name="rutin" class="form-control" value="{{$data[0]->rutinitas_peminjaman}}">
                        @foreach($rutinitas as $rutin)
                        @if($rutin->frekwensi_rutinitas===$data[0]->rutinitas_peminjaman)
                        @then
                        <option value="{{$rutin->frekwensi_rutinitas}}" selected="selected">{{$rutin->keterangan_rutinitas}}</option>
                        @else
                        <option value="{{$rutin->frekwensi_rutinitas}}">{{$rutin->keterangan_rutinitas}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <h4>Kali Peminjaman:</h4>
                <div class="form-group">
                    <input type="text" name="kali" class="form-control" value="{{$data[0]->kali_peminjaman}}">
                </div>
                <input type="hidden" name="kode_peminjaman" value="{{$data[0]->kode_permohonan}}">
                <button type="submit" name="pinjam" class="btn btn-primary">Sunting</button>
            </form>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ URL::asset('js/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/morris/morris-data.js') }}"></script>

</body>

</html>
