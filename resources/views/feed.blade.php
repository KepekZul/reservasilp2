<!DOCTYPE html>
<html lang="en">
<head>
    <title>LP2 Info Board</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/slider.css') }}">
    <script src="{{ URL::asset('js/time.js')}}"></script>
    <link rel="icon" href="../img/lp2.png">
</head>

<body>

    <!-- Page Content -->
    <div id="container" style="margin-top:5%;">
        <h2><img src="/img/lp2.png" alt="if" style="height:80px; margin:auto;"></h2>
        <h2><strong id="ruang" style="font-family: 'Arimo', sans-serif; font-size:42px;">{{$ruang}}</strong></h2>
        <br>
        <br>
        @if(count($now)>0)
        <div id="bek" style="width:80%; background-color:rgb(230,0,0); display:block; overflow:hidden; margin-left:10%; border-radius:10px;">
        @else
        <div id="bek" style="width:80%; background-color:rgb(0,255,0); display:block; overflow:hidden; margin-left:10%; border-radius:10px;">
        @endif
            @if(count($now)>0)
            <div id="kotakbesar1" class="isi" style="background-color:rgb(230,0,0); width:50%; height:30%; float:left; display:block; overflow:hidden;">
            @else
            <div id="kotakbesar1" class="isi" style="background-color:rgb(0,255,0); width:50%; height:30%; float:left; display:block; overflow:hidden;">
            @endif
                <h1 id="kotakkiri" style="text-align:center; font-size:42px; font-family: 'Arimo', sans-serif; margin-top:calc(15% - 36px)">
                    @if(count($now)<1)
                    LP2 Sedang Tidak Digunakan
                    @else
                    LP2 Sedang Digunakan Kegiatan
                    @endif
                </h1>
            </div>
            @if(count($now)<1)
            <div id="kotakbesar2" class="isi" style="background-color:white; width:calc(50% - 10px); height:30%; float:right; border: 5px solid rgb(0,255,0)">
            @else
            <div id="kotakbesar2" class="isi" style="background-color:white; width:calc(50% - 10px); height:30%; float:right; border: 5px solid rgb(230,0,0)">
            @endif
                <h1 style="font-family: 'Arimo', sans-serif; font-size:42px;"><marquee id="kegSekarang" direction="left" height="100%" scrollamount="3">
                    @if(count($now)<1)
                    Tidak ada kegiatan
                    @else
                    {{$now[0]->nama_kegiatan}}
                    @endif
                    </marquee>
                </h1>
                <h1 id="wktSekarang" style="text-align:center; color:black;">
                    @if(count($now)<1)
                    --:--:--
                    @else
                    {{$now[0]->waktu_mulai_permohonan_peminjaman}} - 
                    {{$now[0]->waktu_selesai_permohonan_peminjaman}}
                    @endif
                </h1>
            </div>
        </div>
        <br>
        <div style="margin-left:10%; float:left">
            <h3 id="nama" style="font-family: 'Arimo', sans-serif; font-size:36px;">
                @if(count($next)>0)
                Selanjutnya: {{$next[0]->nama_kegiatan}}<br>
                Waktu: {{$next[0]->waktu_mulai_permohonan_peminjaman}} - 
                {{$next[0]->waktu_selesai_permohonan_peminjaman}}
                @else
                Selanjutnya: Tidak ada kegiatan.<br>
                Waktu: --:--:--
                @endif
            </h3>
        </div>    
        <div id="jam" style="margin-right:10%; float:right; font-family: 'Arimo', sans-serif; font-size:120px;">
            @if($jam[0]->jam>9)
            {{$jam[0]->jam}}
            @else
            0{{$jam[0]->jam}}
            @endif
            :
            @if($menit[0]->menit>9)
            {{$menit[0]->menit}}
            @else
            0{{$menit[0]->menit}}
            @endif
        </div>
        <!-- Footer -->
    </div>
    <!-- /.container -->
    <script>
        window.onload = function(){
                        setInterval(function(){
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange=function(){
                                if(xhttp.readyState==4 && xhttp.status==200){
                                    $all = JSON.parse(xhttp.responseText);
                                    $now = $all['now'][0];
                                    $next = $all['next'][0];
                                    $jam = $all['jam'][0];
                                    $menit = $all['menit'][0];
                                    console.log($now);
                                    if($now){
                                        document.getElementById("bek").style.backgroundColor="rgb(230,0,0)";
                                        document.getElementById("kotakbesar2").style.borderColor="rgb(230,0,0)";
                                        document.getElementById("kotakkiri").innerHTML="LP2 Sedang Digunakan Kegiatan";
                                        document.getElementById("kegSekarang").innerHTML=$now['nama_kegiatan'];
                                        document.getElementById("wktSekarang").innerHTML=$now['waktu_mulai_permohonan_peminjaman']+" - "+$now['waktu_selesai_permohonan_peminjaman'];
                                        document.getElementById("kotakbesar1").style.backgroundColor="rgb(230,0,0)";
                                    }else{
                                        document.getElementById("bek").style.backgroundColor="rgb(0,255,0)";
                                        document.getElementById("kotakbesar2").style.borderColor="rgb(0,255,0)";
                                        document.getElementById("kotakkiri").innerHTML="LP2 Sedang Tidak Digunakan";
                                        document.getElementById("kegSekarang").innerHTML="Tidak ada kegiatan.";
                                        document.getElementById("wktSekarang").innerHTML="--:--:--";
                                        document.getElementById("kotakbesar1").style.backgroundColor="rgb(0,255,0)";
                                    }
                                    if($next){
                                        document.getElementById("nama").innerHTML="Selanjutnya: "+$next['nama_kegiatan']+"<br>Waktu: "+$next["waktu_mulai_permohonan_peminjaman"]+" - "+$next["waktu_selesai_permohonan_peminjaman"];
                                    }else{
                                        document.getElementById("nama").innerHTML="Selanjutnya: Tidak ada kegiatan.<br>Waktu: --:--:--";
                                    }
                                    if($jam['jam']<10){
                                        $jam['jam']='0'+$jam['jam'];
                                    }
                                    if($menit['menit']<10){
                                        $menit['menit']='0'+$menit['menit'];
                                    }
                                    document.getElementById('jam').innerHTML=$jam['jam']+":"+$menit['menit'];
                                }
                            };
                            xhttp.open("get", "/feeder/"+document.getElementById("ruang").innerHTML, true);
                            xhttp.send();
                        }, 5000);}
    </script>

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/slider.js') }}"></script>
    
</body>

</html>
