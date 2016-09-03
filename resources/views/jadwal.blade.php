<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   @include('layouts.userHead')
   <script type="text/javascript">
   function cekRuang(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange=function(){
            if(xhttp.readyState==4 && xhttp.status==200){
                $all = JSON.parse(xhttp.responseText);
                var cont = Object.keys($all["kegiatan"]).length;
                if(cont>0){
                    $isiHtml="";
                    for(i=0; i<cont; i++){
                        $mulai=$all["kegiatan"][i]["waktu_mulai"];
                        $selesai=$all["kegiatan"][i]["waktu_selesai"];
                        $kegiatan=$all["kegiatan"][i]["nama_kegiatan"];
                        $isiHtml=$isiHtml+"<tr><td>"+$mulai+" - "+$selesai+"</td><td>"+$kegiatan+"</tr>";
                    }
                    document.getElementById("daftar").innerHTML=$isiHtml;
                }else{
                    document.getElementById("daftar").innerHTML="<tr><td>-</td><td>-</td></tr>";
                }
            }
        };
        xhttp.open("get", "/reservasi/Laboratorium%20Pemrograman%202/"+document.getElementById("tanggal").value, true);
        xhttp.send();
    }
   </script>
</head>

<body>
    @include('layouts.userNavbar')
    <!-- Page Content -->
    <div class="container">
        <a href="/pinjam" class="btn btn-primary btn-large">Reservation Form</a>
        <hr>
         <div class="row">
            <div class="col-lg-5">
            <!-- Blog Search Well -->
                <div class="well">
                    <h4>Pick for daily event</h4>
                    <div class="input-group" style="width:80%;" onchange="cekRuang()">
                        <input name="tanggal" id="tanggal" type="date" class="form-control" style="min-width:250px; width:100%;" autocomplete="false">
                    </div>
                    <!-- /.input-group -->
                </div>
            </div>
            <div class="col-lg-7">
            <!-- Blog Search Well -->
                <div class="well">
                <h3>Daily Schedule</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Event</th>
                            </tr>
                        </thead>
                        <tbody id="daftar">
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-8">
                <h3>Routine Schedule This Week</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Event</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody id="daftar">
                            @if($jadwal!==null)
                                @foreach($jadwal as $list)
                                <tr>
                                    <td>{{$list->day}}</td>
                                    <td>{{$list->mulai}} - {{$list->selesai}}</td>
                                    <td>{{$list->event}}</td>
                                    <td>Every {{$list->Note}} days<td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            
        <hr>
        <!-- Footer -->
        @include('layouts.footer')


    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
