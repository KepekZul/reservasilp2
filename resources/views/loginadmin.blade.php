<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.loginHead')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            @include('layouts.userNavbar')
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <!--<div class="container center_div">-->
    <div class="container center_div">
        <div class="row text-center">
        <form action="loga" method="post">
            <div style="float:relative; min-width:180px; margin-top:auto; margin-bottom:auto; margin-left:auto; margin-right:auto;">
                <div class="thumbnail">
                    <img style="width:60%;height:60%" src="../img/user.png" alt="">
                    <div class="caption">
                        <h3>LOGIN</h3>
                        <input type="text" name="id" id="id" class="form-control" placeholder="ID" required autofocus>
                        <br>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required>
                        <p>
                            <input type="submit" class="btn btn-primary" value="Login"></input>
                        </p>
                    </div>
                </div>
            </div>
        </form>
        @if(Session::has('msg'))
            <span style="background-color:red; color:white;">
                {{Session::get('msg')}}
            </span>
        @endif
        </div>
        
    </div>
    <div class="container center_div">
        @include('layouts.footer')
    </div>
    
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
