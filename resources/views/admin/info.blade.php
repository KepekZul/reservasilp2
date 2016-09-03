<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.adminHead')
        <script type="text/javascript">
            function ini(){
                document.getElementById("info").className="active";
            }
        </script>
    </head>
<body onload="ini()">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            @include('layouts.adminNavbar')
        </nav>

        <div id="page-wrapper" style="height:100vh;">

            <div class="container-fluid" style="height:100%">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Info Center LP2</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Pengumuman</th>
                                        <th style="text-align:center;">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($daftar_info as $info)
                                    <tr>
                                        <td>{{$info->info_info}}</td>
                                        <td style="text-align:center;"><a href="/admin/hapusInfo/{{$info->no_info}}" class="fa fa-times fa-2x" style="color:red;"></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6">
                        <div class="well">
                        <form name="tambahpengumuman" method="post" role="form" action="/admin/tambahpengumuman">
                            <h4>Tambah Pengumuman Baru</h4>
                            <table style="width:70%">
                                <tr>
                                    <th>
                                        Pengumuman
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <input name="pengumuman" type="text" class="form-control" required><br>
                                    </th>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                    </div>
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