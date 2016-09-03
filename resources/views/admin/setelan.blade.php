<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.adminHead')
    <script type="text/javascript">
        function ini(){
            document.getElementById("setelan").className="active";
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
                        <h1 class="page-header">Setelan</h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->

                <div class="row">
                    <div class="well">
                        <form name="interval" method="post" role="form" action="/admin/tambahinterval">
                            <h4>Tambah Interval Peminjaman</h4>
                            <table style="width:70%">
                                <tr>
                                    <th>
                                        Interval Hari
                                    </th>
                                    <th>
                                        Keterangan
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <input name="interval" type="number" class="form-control" required><br>
                                    </th>
                                    <th>
                                        <input name="keterangan" type="text" class="form-control" required><br>
                                    </th>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </form>
                        @if(Session::has('interval_ok'))
                        <span style="background-color:rgb(0,255,0);">{{Session::get('interval_ok')}}</span>
                        @endif
                    </div>
                    <div class="well">
                        <form name="password" method="post" role="form" action="/admin/gantipassword" onsubmit="return ceksama()">
                            <h4>Ganti Password</h4>
                            <hr>
                            <h4>Password Lama</h4>
                            <input name="passwordlama" type="password" style="width:60%; min-width:200px;" class="form-control" required><br>
                            <h4>Password Baru</h4>
                            <input name="passwordbaru1" type="password" style="width:60%; min-width:200px;" class="form-control" required><br>
                            <h4>Password Baru</h4>
                            <input name="passwordbaru2" type="password" style="width:60%; min-width:200px;"  class="form-control" required><br>
                            <button type="submit" class="btn btn-primary">Ganti</button>
                        </form>
                        <script type="text/javascript">
                            function ceksama(){
                                if(document.forms["password"]["passwordbaru1"].value==document.forms["password"]["passwordbaru2"].value){
                                    return true;
                                }else{
                                    alert('Password yang dimasukkan berbeda.')
                                    return false;
                                }
                                alert('huehuehue');
                            }
                        </script>
                        @if(Session::has('interval_ok'))
                        <span style="background-color:rgb(0,255,0);">{{Session::get('interval_ok')}}</span>
                        @endif
                    </div>
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
