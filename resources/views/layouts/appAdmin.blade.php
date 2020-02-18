<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>PT. Rajawali Kapital Berjangka</title>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" href="/public/main_dashboard/css/bootstrap.min.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="/public/main_dashboard/css/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->

    <link rel="stylesheet" href="/public/main_dashboard/css/font-awesome-5.5.0/css/all.css">

    <link href="/public/main_dashboard/css/owl.theme.default.css" rel="stylesheet" />
    <link href="/public/main_dashboard/css/owl.carousel.css" rel="stylesheet" />

    <link rel="stylesheet" href="/public/main_dashboard/css/style.css" />
</head>
<body class="login-body">
@include('sweetalert::alert')
    <!--Preload-->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
            </div>
        </div>
    </div>
         
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="content-logo-lgi">
                <a href="/">
                    <h3 class="logo"><img src="/public/assets/images/rajawali-kapital-berjangka-logo-biru.png" alt="PT. Rajawali Kapital Berjangka - RKB" /><span>Rajawali</span></h3>
                </a>
            </div>
            <div class="container-fluid"> 
             
            </div>
        </nav>
        <!-- Page Content  -->

        <div id="login" class="d-flex flex-row justify-content-center align-items-center">
            <div class="box-login col-3 col-lg-3 align-self-center">
                <div class="auth-bg">
                    <span class="r"></span>
                    <span class="r s"></span>
                    <span class="r s"></span>
                    <span class="r"></span>
                </div>


                @include('errors.alert') 
                @yield('content-admin')
                 
            </div>
        </div>

    </div>
            
        

 <script src="/public/main_dashboard/js/jquery-3.3.1.min.js"></script>
 <script src="/public/main_dashboard/js/owncarousel/owl.carousel.js"></script>
 <script src="/public/main_dashboard/js/modal/classie.js"></script>
 <script src="/public/main_dashboard/js/modal/modalEffects.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
 
<script> 
function callAlert (message) {
		swal(message);
	}
</script>
 <script>
        $(window).on('load', function () {
            //$("#loading").delay(2000).fadeOut(500);
            $("#loading").delay(1000).fadeOut(800);
        })
    </script>
</body>
</html>
