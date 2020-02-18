<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	
	<meta charset="utf-8">
    <link href="/public/assets/images/rkb.ico" rel="shortcut icon">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Nugroho Aditya">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="/public/assets-miminium/css/bootstrap.min.css">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="/public/assets-miminium/css/plugins/font-awesome.min.css"/>
	<link href="/public/assets-miminium/css/style.css" rel="stylesheet">
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
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
                <a href="/rajawaliadmin" class="navbar-brand"> 
                 <b>Administrator</b>
                </a>

                <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span>{{Auth::guard('rajawali')->user()->name}}</span></li>
                   
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

                <li><a href="/rajawaliadmin"><span class="fa-home fa"></span> Dashboard</a></li>
                      <li><a href="{{url('/rajawaliadmin#/root/user/index')}}"><span class="fa fa-users"></span> User Client Demo</a></li>
                      <li><a href="{{url('/rajawaliadmin#/root/ib-partnership')}}"><span class="fa fa-registered"></span> IB (partnership)</a></li>
                <li><a href="{{url('/rajawaliadmin#/root/list-real-account/index')}}"><span class="fa fa-unlock"></span> Real Account</a></li>
                <li> <a href="{{url('/rajawaliadmin#/root/list-demo-account/index')}}"><span class="fa fa-lock"></span> Demo Account</a></li>
                <li><a href="{{url('/rajawaliadmin#/root/list-deposit/index')}}"><span class="fa fa-credit-card"></span> Deposit</a></li>
                <li><a href="{{url('/rajawaliadmin#/root/list-withdrawal/index')}}"><span class="fa fa-google-wallet"></span> Withdrawal</a></li>
                      <li><a href="{{url('/rajawaliadmin#/root/web-contact')}}"><span class="fa fa-phone"></span> Web Contact</a></li>
                      <li><a href="{{url('/rajawaliadmin#/root/newslatter')}}"><span class="fa fa-paper-plane"></span> Newslatter</a></li>
                <li><a href="{{url('/rajawaliadmin#/root/list-banner/index')}}"><span class="fa fa-film"></span> Web Banner</a></li>
                <li><a href="{{url('/rajawaliadmin#/root/files/index')}}"><span class="fa fa-file"></span> Files</a></li>
                <li><a href="{{url('/rajawaliadmin#/root/news/index')}}"><span class="fa fa-internet-explorer"></span> News</a></li>
                <li class="active ripple">
                      <a class="tree-toggle nav-header"><span class="fa fa-gears"></span> Setting 
                        <span class="fa right-arrow text-right fa-angle-right"></span>
                      <span class="ink animate" style="height: 226px; width: 226px; top: -87px; left: 1.5px;"></span></a>
                      <ul class="nav nav-list tree" style="display: none;">
                      
                      @if(Auth::guard('rajawali')->user()->role_id == 'admin')
                          <li><a href="{{url('/rajawaliadmin#/root/admin/index')}}">Web Admin</a></li>
                          <li><a href="{{url('/rajawaliadmin#/root/email/index')}}">Email Configuration</a></li>
                      @endif

                          <li><a href="{{url('/rajawaliadmin#/root/password')}}">Profile</a></li>
                      </ul>
                    </li>
                <li><a href="{{ route('Rajawali.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="fa fa-power-off"></span> Logout</a></li>
                    
    
                    
                    
                    
                  </ul>
                </div>
            </div>
          <!-- end: Left Menu -->

  		
          <!-- start: content -->
            <div id="content">
               
            @yield('content-admin')
            
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

                <li><a href="/rajawaliadmin"><span class="fa-home fa"></span> Dashboard</a></li>
                      <li><a href="{{url('/rajawaliadmin#/root/user/index')}}"><span class="fa fa-users"></span> User Client Demo</a></li>
                      <li><a href="{{url('/rajawaliadmin#/root/ib-partnership')}}"><span class="fa fa-registered"></span> IB (partnership)</a></li>
                <li><a href="{{url('/rajawaliadmin#/root/list-real-account/index')}}"><span class="fa fa-unlock"></span> Real Account</a></li>
                <li> <a href="{{url('/rajawaliadmin#/root/list-demo-account/index')}}"><span class="fa fa-lock"></span> Demo Account</a></li>
                <li><a href="{{url('/rajawaliadmin#/root/list-deposit/index')}}"><span class="fa fa-credit-card"></span> Deposit</a></li>
                <li><a href="{{url('/rajawaliadmin#/root/list-withdrawal/index')}}"><span class="fa fa-google-wallet"></span> Withdrawal</a></li>
                      <li><a href="{{url('/rajawaliadmin#/root/web-contact')}}"><span class="fa fa-phone"></span> Web Contact</a></li>
                      <li><a href="{{url('/rajawaliadmin#/root/newslatter')}}"><span class="fa fa-paper-plane"></span> Newslatter</a></li>
                <li><a href="{{url('/rajawaliadmin#/root/list-banner/index')}}"><span class="fa fa-film"></span> Web Banner</a></li>
                <li><a href="{{url('/rajawaliadmin#/root/files/index')}}"><span class="fa fa-file"></span> Files</a></li>
                <li><a href="{{url('/rajawaliadmin#/root/news/index')}}"><span class="fa fa-internet-explorer"></span> News</a></li>
                <li class="active ripple">
                      <a class="tree-toggle nav-header"><span class="fa fa-gears"></span> Setting 
                        <span class="fa right-arrow text-right fa-angle-right"></span>
                      <span class="ink animate" style="height: 226px; width: 226px; top: -87px; left: 1.5px;"></span></a>
                      <ul class="nav nav-list tree" style="display: none;">
                      
                      @if(Auth::guard('rajawali')->user()->role_id == 'admin')
                          <li><a href="{{url('/rajawaliadmin#/root/admin/index')}}">Web Admin</a></li>
                          <li><a href="{{url('/rajawaliadmin#/root/email/index')}}">Email Configuration</a></li>
                      @endif

                          <li><a href="{{url('/rajawaliadmin#/root/password')}}">Profile</a></li>
                      </ul>
                    </li>
                <li><a href="{{ route('Rajawali.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="fa fa-power-off"></span> Logout</a></li>
                    

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
    <!-- custom -->
     <script src="/public/assets-miminium/js/main.js"></script>
    <script src="{{ asset('public/js/app-002.js') }}"></script>
 
  </body>
</html>