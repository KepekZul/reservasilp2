<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.userHead')
    <script type="text/javascript">
    function validasi(){
        var Tanggal = document.forms["formpinjam"]["tglmulai"].value;
        var date = new Date();
        var tahun = date.getFullYear();
        var bulan = date.getMonth()+1;
        if(bulan<10) bulan='0'+bulan;
        var hari = date.getDate();
        if(hari<10)hari='0'+hari;
        date = tahun+'-'+bulan+'-'+hari;
        if(Tanggal<date){
            alert("Tanggal yang anda pilih telah lewat.")
            return false;
        }
        if(document.forms["formpinjam"]["wktmulai"].value>document.forms["formpinjam"]["wktselesai"].value){
            alert("Waktu mulai dan waktu selesai kegiatan invalid.");
            return false;
        }
        return true;
    }
    </script>
    <script type="text/javascript">
    function autocom(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange=function(){
            if(xhttp.readyState==4 && xhttp.status==200){
                console.log('tes2');
                $all = JSON.parse(xhttp.responseText);
                $data = $all['data'][0];
                console.log($all);
                document.forms["formpinjam"]["telp"].value=$data['nomor_telepon_pemohon'];
                document.forms["formpinjam"]["email"].value=$data['email_pemohon'];
            }
        };
        xhttp.open("get", "/pemohon/"+document.getElementById("nama").value, true);
        xhttp.send();
    }
    </script>
</head>

<body>
    @include('layouts.userNavbar')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Form Reservasi Lab</h1>
            </div>
        </div>
        <span id="valid"></span>
        @if(Session::has('msg'))
            <span style="background-color:red; color:white;">
                {{Session::get('msg')}}
            </span>
        @endif
        <div class="well">
            <form role="form" onsubmit="return validasi()" name="formpinjam" action="isiPinjam" method="POST">
                <h4>Nama Lengkap:</h4>
                <div class="form-group">
                    <input type="text" id="nama" name="nama" class="form-control" autocomplete="false" onchange="autocom();" required>
                </div>
                <h4>No. Telepon:</h4>
                <div class="form-group">
                    <input type="text" id="telp" name="telp" class="form-control" required>
                </div>
                <h4>Email:</h4>
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <h4>Nama Kegiatan:</h4>
                <div class="form-group">
                    <input type="text" name="keg" class="form-control" autocomplete="false" required>
                </div>
                <h4>Tanggal Mulai Kegiatan:</h4>
                <div class="form-group">
                    <input type="date" name="tglmulai" class="form-control" required>
                </div>
                <h4>Waktu Mulai Kegiatan:</h4>
                <div class="form-group">
                    <input type="time" name="wktmulai" class="form-control" required>
                </div>
                <h4>Waktu Selesai Kegiatan:</h4>
                <div class="form-group">
                    <input type="time" name="wktselesai" class="form-control" required>
                </div>
                <h4>Badan Pelaksana Kegiatan:</h4>
                <div class="form-group">
                    <input type="text" name="badan" class="form-control" autocomplete="false" required>
                </div>
                <input type="hidden" name="ruang" value="Laboratorium Pemrograman 2">
                <h4>Rutinitas:</h4>
                <div class="form-group">
                    <select name="rutin" class="form-control">
                        @foreach($rutinitas as $rutin)
                        <option value="{{$rutin->frekwensi_rutinitas}}">{{$rutin->keterangan_rutinitas}}</option>
                        @endforeach
                    </select>
                </div>
                <h4>Kali Peminjaman:</h4>
                <div class="form-group">
                    <input type="text" name="kali" class="form-control" required>
                </div>
            <button type="submit" name="pinjam" class="btn btn-primary">Pinjam</button>
            </form>
        </div>


        <hr>

        <!-- Footer -->
        @include('layouts.footer')


    </div>
    <!-- /.container -->
    <script type="text/javascript">
    </script>
    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
