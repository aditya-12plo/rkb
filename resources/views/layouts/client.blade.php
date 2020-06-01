<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	
    <title>{{$title}}</title>
    <link href="/public/assets/images/rkb.ico" rel="shortcut icon">
	<meta charset="utf-8">
	<meta name="description" content="PT. Rajawali Kapital Berjangka">
	<meta name="author" content="Nugroho Aditya">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="/public/assets-miminium/css/bootstrap.min.css">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="/public/assets-miminium/css/plugins/font-awesome.min.css"/>
      <link href="/public/assets-miminium/css/style.css" rel="stylesheet">
      <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

      {{-- DataTables --}}
      <link rel="stylesheet" href="/public/assets-miminium/css/plugins/jquery.dataTables.css" type="text/css">
	<!-- end: Css -->

  </head>

 <body id="mimin" class="dashboard">
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="/{{Config::get('app.locale')}}/clients-area" class="navbar-brand"> 
                 <b>@if(Config::get('app.locale') == 'id') Rajawali @else Eagle @endif</b>
                </a>

                <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span>{{Auth::user()->name}}</span></li>
                   
              </ul>
 
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">

                <li><a href="/{{Config::get('app.locale')}}/clients-area"><span class="fa-home fa"></span> @if(Config::get('app.locale') == 'cn') 仪表板 @else Dashboard @endif</a></li>
                {{-- <li><a href="{{url('/clients-area#/list-real-account/index')}}"><span class="fa fa-unlock"></span> @if(Config::get('app.locale') == 'id') Akun Real @elseif(Config::get('app.locale') == 'cn') 真实账户 @else Real Account @endif</a></li> --}}
                <li><a href="{{url('/'. Config::get('app.locale').'/clients-area/list-real-account/index')}}"><span class="fa fa-unlock"></span> @if(Config::get('app.locale') == 'id') Akun Real @elseif(Config::get('app.locale') == 'cn') 真实账户 @else Real Account @endif</a></li>
                {{-- <li> <a href="{{url('/clients-area#/list-demo-account/index')}}"><span class="fa fa-lock"></span> @if(Config::get('app.locale') == 'id') Akun Demo @elseif(Config::get('app.locale') == 'cn') 模拟账户 @else Demo account @endif</a></li> --}}
                <li> <a href="{{url('/'. Config::get('app.locale').'/clients-area/list-demo-account/index')}}"><span class="fa fa-lock"></span> @if(Config::get('app.locale') == 'id') Akun Demo @elseif(Config::get('app.locale') == 'cn') 模拟账户 @else Demo account @endif</a></li>
                {{-- <li><a href="{{url('/clients-area#/list-deposit/index')}}"><span class="fa fa-credit-card"></span> @if(Config::get('app.locale') == 'cn') 存款 @else Deposit @endif
                </a></li> --}}
                <li><a href="{{url('/'. Config::get('app.locale').'/clients-area/list-deposit/index')}}"><span class="fa fa-credit-card"></span> @if(Config::get('app.locale') == 'cn') 存款 @else Deposit @endif
                </a></li>
                {{-- <li><a href="{{url('/clients-area#/list-withdrawal/index')}}"><span class="fa fa-google-wallet"></span>@if(Config::get('app.locale') == 'cn') 退出 @else Withdrawal @endif</a></li> --}}
                <li><a href="{{url('/'. Config::get('app.locale').'/clients-area/list-withdrawal/index')}}"><span class="fa fa-google-wallet"></span>@if(Config::get('app.locale') == 'cn') 退出 @else Withdrawal @endif</a></li>
                {{-- <li><a href="{{url('/clients-area#/profile/index')}}"><span class="fa fa-gears"></span>@if(Config::get('app.locale') == 'id') Pengaturan @elseif(Config::get('app.locale') == 'cn') 设定值 @else Settings @endif</a></li> --}}
                <li><a href="{{url('/'. Config::get('app.locale').'/clients-area/profile/index')}}"><span class="fa fa-gears"></span>@if(Config::get('app.locale') == 'id') Pengaturan @elseif(Config::get('app.locale') == 'cn') 设定值 @else Settings @endif</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="fa fa-power-off"></span>@if(Config::get('app.locale') == 'id')  Keluar @elseif(Config::get('app.locale') == 'cn') 出口 @else Exit @endif</a></li>
                    
    
                    
                    
                    
                  </ul>
                </div>
            </div>
          <!-- end: Left Menu -->

  		
          <!-- start: content -->
            <div id="content">
               
            @yield('content-client')
            
      		  </div>
          <!-- end: content -->


          
      </div>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

      <!-- start: Mobile -->
      <div id="mimin-mobile" class="reverse">
        <div class="mimin-mobile-menu-list">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                <ul class="nav nav-list">

                <li><a href="/clients-area"><span class="fa-home fa"></span> @if(Config::get('app.locale') == 'cn') 仪表板 @else Dashboard @endif</a></li>
                <li><a href="{{url('/clients-area#/list-real-account/index')}}"><span class="fa fa-unlock"></span> @if(Config::get('app.locale') == 'id') Akun Real @elseif(Config::get('app.locale') == 'cn') 真实账户 @else Real Account @endif</a></li>
                <li> <a href="{{url('/clients-area#/list-demo-account/index')}}"><span class="fa fa-lock"></span> @if(Config::get('app.locale') == 'id') Akun Demo @elseif(Config::get('app.locale') == 'cn') 模拟账户 @else Demo account @endif</a></li>
                <li><a href="{{url('/clients-area#/list-deposit/index')}}"><span class="fa fa-credit-card"></span> @if(Config::get('app.locale') == 'cn') 存款 @else Deposit @endif</a></li>
                <li><a href="{{url('/clients-area#/list-withdrawal/index')}}"><span class="fa fa-google-wallet"></span> @if(Config::get('app.locale') == 'cn') 退出 @else Withdrawal @endif</a></li>
                <li><a href="{{url('/clients-area#/profile/index')}}"><span class="fa fa-gears"></span> @if(Config::get('app.locale') == 'id') Pengaturan @elseif(Config::get('app.locale') == 'cn') 设定值 @else Settings @endif</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="fa fa-power-off"></span> @if(Config::get('app.locale') == 'id')  Keluar @elseif(Config::get('app.locale') == 'cn') 出口 @else Exit @endif</a></li>


                  </ul>
            </div>
        </div>       
      </div>
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
       <!-- end: Mobile -->

    <!-- start: Javascript -->
    <script src="/public/assets-miminium/js/jquery.min.js"></script>
    <script src="/public/assets-miminium/js/jquery.ui.min.js"></script>
    <script src="/public/assets-miminium/js/bootstrap.min.js"></script>
   
    
    <!-- plugins -->
    <script src="/public/assets-miminium/js/plugins/moment.min.js"></script> 
    <script src="/public/assets-miminium/js/plugins/jquery.nicescroll.js"></script>
    {{-- Datatables --}}
    <script src="/public/assets-miminium/js/plugins/jquery.datatables.min.js"></script>
    <!-- custom -->
     <script src="/public/assets-miminium/js/main.js"></script>
    <script src="{{ asset('public/js/app-003.js') }}"></script>
      <script>
        $(document).ready(function() {
        $('#realaccount_table').DataTable({
          ordering:false,
          searching:false,
          lengthChange: false,
        });
      });
      </script>
  </body>
</html>