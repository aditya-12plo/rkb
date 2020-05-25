<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{$title}}</title>
    <link href="/public/assets/images/rkb.ico" rel="shortcut icon">
    <meta charset="utf-8" />
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta property="og:locale" content="ID" />
    <meta content="noindex,nofollow" name="robots"/>
    <meta property="og:type" content="article" />

    <meta name="keywords" content="{{$keywords}}">
    <meta name="description" content="{{$description}}">
    <meta name="format-detection" content="telephone=no">
    <meta property="og:url" content="{{Request::url()}}">
    <meta property="og:title" content="{{$title}}">
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="368" />
    <meta property="og:site_name" content="{{$title}}">
    <meta property="og:image" content="{{$imageseo}}">
    <meta property="article:publisher" content="{{Request::url()}}" />
    <meta property="article:tag" content="{{$title}}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" href="{{asset('/public/main_dashboard/css/bootstrap.min.css')}}">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('/public/main_dashboard/css/jquery.mCustomScrollbar.min.css')}}">

    <!-- Font Awesome JS -->

    <link rel="stylesheet" href="{{asset('/public/main_dashboard/css/font-awesome-5.5.0/css/all.css')}}">

    <link href="{{asset('/public/main_dashboard/css/owl.theme.default.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/main_dashboard/css/owl.carousel.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('/public/main_dashboard/css/style.css')}}" />
	
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153521263-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153521263-1');
</script>

</head>

<body>
        @include('errors.alert') 
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
	
	
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="/">
                    <h3 class="logo"><img src="{{asset('/public/assets/images/rajawali-kapital-berjangka-logo-biru.png')}}" alt="PT. Rajawali Kapital Berjangka - RKB" />@if(Config::get('app.locale') == 'id') Rajawali @else Eagle @endif</h3>
                </a>
                <i class="fas fa-times"></i>
            </div>
            
            <div class="box-sign-up">
                <a href="{{url('/clients-area')}}">Login Client</a>
            </div>
            <div class="box-list">
                <a href="/" @if($menuName == 'indexWeb') class="active" @endif>
                 <p class="sub-title">Beranda</p>
                </a>
            </div>
            <div class="box-list" style="padding-bottom:15px;">
                <p class="sub-title" style="padding: 0px 30px !important;">AKUN
				<a href="javascript:void(0);" class="icon" onclick="menuAccount()">
					<i class="fa fa-caret-down"></i>
				  </a></p>
                <ul class="list-unstyled components" id="mymenuAccount" style="display: none;"> 
                    <li @if($menuName == 'akunIndividuPerusahaanWeb') class="active" @endif>
                        <a href="{{url('/akun-individu')}}"> Akun Individu</a>
                    </li>
                    <li @if($menuName == 'akunInstitusiPerusahaanWeb') class="active" @endif>
                        <a href="{{url('/akun-institusi')}}"> Akun Institusi</a>
                    </li>
                </ul>
            </div>
            <div class="box-list" style="padding-bottom:10px;">
                <p class="sub-title" style="padding: 0px 30px !important;">PRODUK GOFX 
				<a href="javascript:void(0);" class="icon" onclick="menuProduct()">
					<i class="fa fa-caret-down"></i>
				  </a>
				</p>
                <ul class="list-unstyled components" id="mymenuProduct" style="display: none;"> 
                    <li @if($menuName == 'gofxGoldPerusahaanWeb') class="active" @endif><a href="{{url('/gofx/gold')}}"> Gold</a></li>
                    <li @if($menuName == 'gofxOilPerusahaanWeb') class="active" @endif><a href="{{url('/gofx/oil')}}"> Oil</a></li>
                    <li @if($menuName == 'gofxForexPerusahaanWeb') class="active" @endif><a href="{{url('/gofx/forex')}}"> Forex</a></li>
                </ul>
            </div>
            <div class="box-list">
                <a href="{{url('/teknologi')}}" @if($menuName == 'technologyPerusahaanWeb') class="active" @endif>
                 <p class="sub-title">Teknologi</p>
                </a>
            </div>
            <div class="box-list">
                 <p class="sub-title">Berita <a href="javascript:void(0);" class="icon" onclick="menuNews()">
						<i class="fa fa-caret-down"></i>
					  </a></p>
				<ul class="list-unstyled components" id="mymenuNews" style="display: none;"> 
                    <li @if($menuName == 'econimiccalender') class="active" @endif><a href="{{url('/kalender-ekonomi')}}"> Kalender Ekonomi</a></li>
                    <li @if($menuName == 'newsForexFactory') class="active" @endif><a href="{{url('/berita-ekonomi')}}"> Berita</a></li>
                </ul>
            </div>
            <div class="box-list">
                <a href="{{url('/partnership')}}" @if($menuName == 'partnershipPerusahaanWeb') class="active" @endif>
                 <p class="sub-title">Partnership</p>
                </a>
            </div>
            <div class="box-list">
                <p class="sub-title" style="padding: 0px 30px !important;">TENTANG KAMI
				 <a href="javascript:void(0);" class="icon" onclick="menuAboutUs()">
					<i class="fa fa-caret-down"></i>
				  </a></p>
                <ul class="list-unstyled components" id="mymenuAboutUs" style="display: none;"> 
                    <li @if($menuName == 'profilPerusahaanWeb') class="active" @endif>
                        <a href="{{url('/profil-perusahaan')}}"> Profil Perusahaan</a>
                    </li>
                    <li @if($menuName == 'danaPerusahaanWeb') class="active" @endif>
                        <a href="{{url('/dana-terpisah-perusahaan')}}"> Dana Terpisah</a>
                    </li>
                </ul>
            </div>
            <div class="box-list" style="padding-bottom:10px;padding-top:10px;">
                <p class="sub-title" style="padding: 0px 30px !important;">Language
				<a href="javascript:void(0);" class="icon" onclick="menuLanguage()">
					<i class="fa fa-caret-down"></i>
				  </a>
				</p>
                <ul class="list-unstyled components" id="mymenuLanguage" style="display: none;"> 
                    <li><a href="{{url('/en')}}"> English</a></li>
                    <li><a href="{{url('/id')}}"> Indonesia</a></li>
                    <li><a href="{{url('/cn')}}"> China</a></li>
                </ul>
            </div>
            <div class="box-list">
                <a href="{{url('/hubungi-kami')}}" @if($menuName == 'hubungiKamiWeb') class="active" @endif>
                 <p class="sub-title">Hubungi Kami</p>
                </a>
            </div>
 

        </nav>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid top-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                </button>
            </div>

            <!-- Generate Crypto Value Dinamicaly -->
            @if($isMobile)
            <div class="box-languag1" style="right: 0% !important;">
                 <a href="daftar-akun-demo"><p class="md-trigger box-lang" data-modal="modal-demo" style="color:white;margin: 35px 0px 0 40px !important;">AKUN DEMO</p></a>
            </div>
            <div class="box-language">
                <a href="daftar-akun-real"> <p class="md-trigger box-lang" data-modal="modal-real" style="color:white;"> AKUN REAL</p></a>
            </div>
            @else
             <div id="root">
            </div> 
            <div class="box-languag1">
                 <a href="daftar-akun-demo"><p class="md-trigger box-lang" data-modal="modal-demo"><span class="txt-lg">AKUN DEMO</span></p></a>
            </div>
            <div class="box-language">
                <a href="/daftar-akun-real"><p class="md-trigger box-lang" data-modal="modal-real"><span class="txt-lg">AKUN REAL</span></p></a>
            </div>
            @endif 
        </nav>
	
        <!-- Page Content  -->
        <div id="content">
            
            @yield('content-website')
             


            <section class="box-prices" style="padding:0 !important;">

<div class="container">
    <div class="row">
        <div class="col-md-12 box-header-price">
            <h3 class="title">Tipe  <span>Akun</span></h3>
            <div class="line-centered-circolar"></div>
            <p>
              Kini Anda dapat memilih tipe akun sesuai dengan karakter trading anda.
            </p>
        </div>
    </div>

    <div class="row box-body-price" style="margin-bottom: 10px;">

        <div class="col-lg-4">
            <div class="box-price">
                <h3 class="title">GOFX AKUN DEMO</h3>
                <div class="box-pack-price">
                    <h3>
                        FREE
                    </h3>
                </div>
                <div class="box-list-step">
                    <ul>
                        <li style="background: #f18109;">Tidak ada deposit</li>
                        <li>-</li>
                        <li>-</li>
                        <li>-</li>
                        <li>Meta Trader 5</li>
                    </ul>
                </div>
                <a href="/daftar-akun-demo"><button class="btn btn-more" type="button">Daftar</button></a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box-price">
                <h3 class="title">GOFX AKUN MINI</h3>
                <div class="box-pack-price">
                    <h3>
                        5 Juta
                    </h3>
                </div>
                <div class="box-list-step">
                    <ul>
                        <li style="background: #f18109;">Initial Deposit</li>
                        <li>Fee Mini</li>
                        <li>1 Lot Mini</li>
                        <li>Floating rate</li>
                        <li>Meta Trader 5</li>
                    </ul>
                </div>
                <a href="/daftar-akun-real"><button class="btn btn-more" type="button">Daftar</button></a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box-price">
                <h3 class="title">GOFX AKUN MICRO</h3>
                <div class="box-pack-price">
                    <h3>
                        500 Ribu
                    </h3>
                </div>
                <div class="box-list-step">
                    <ul>
                        <li style="background: #f18109;">Initial Deposit</li>
                        <li>Fee Micro</li>
                        <li>1 Lot Micro</li>
                        <li>Floating rate</li>
                        <li>Meta Trader 5</li>
                    </ul>
                </div>
                <a href="/daftar-akun-real"><button class="btn btn-more" type="button">Daftar</button></a>
            </div>
        </div>

    </div>
</div>
</section>


            <section id="infosite">
                <div class="back-img"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 p-0">
                            <div class="box-yellow">
                                <h4 class="title">Mau trading di GOFX ?</h4>
                                <p>biar trading lebih percaya diri, yuk klik tombol dibawah ini</p>
                                <a href="/daftar-akun-demo"><button class="md-trigger box-lang btn btn-more" type="button">AKUN DEMO</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            
            <section class="box-company-services">
            <div class="container">
                    <div class="row m-0">
                        <div class="col-md-12 box-header-service">
                            <h3 class="title">Broker <span>Resmi</span></h3>
                            <div class="line-centered-circolar"></div>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-md-12">
                            <div class="owl-carousel owl-theme multi-carousel">
                                <div class="item">
                                    <div class="project-thumb">
                                        <a href="https://www.icdx.co.id/" target="_blank">
                                        <img src="{{url('public/assets/images/icdx.png')}}" alt="Indonesia commodity and derivative exchange" />
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="project-thumb">
                                        <a href="https://www.ich.co.id" target="_blank">
                                        <img src="{{url('public/assets/images/ich.png')}}" alt="indonesia clearing house" />
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="project-thumb">
                                        <a href="http://bappebti.go.id/" target="_blank">
                                        <img src="{{url('public/assets/images/bappebti-new.png')}}" alt="Badan Pengawas Perdagangan Berjangka Komoditi" />
                                        </a>
                                        
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="project-thumb">
                                        <a href="http://gofx.co.id/" target="_blank">
                                        <img src="{{url('public/assets/images/gofx.png')}}" alt="Gold Oil Forex" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>

			 <footer>
                    <div class="back-img"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                                <h3>Pemberitahuan Resiko</h3>
                                <p>
Semua produk finansial yang ditransaksikan dalam sistem margin mempunyai resiko tinggi
terhadap dana Anda. Produk finansial ini tidak diperuntukkan bagi semua investor dan Anda
bisa saja kehilangan dana lebih dari deposit awal Anda. Pastikan bahwa Anda benar-benar
mengerti resikonya, dan mintalah nasihat independen jika diperlukan.
                                </p>
                                <p>Mengingat transaksi ini adalah High Risk dan High Return, Calon nasabah diwajibkan melakukan Simulasi Transaksi (Demo Account) terlebih dahulu dan mempelajari Peraturan Transaksi (Trading Rules) sebelum melakukan transaksi.</p>
                            </div>
                            <div class="col-lg-3">
                                <h3>Legalitas</h3>

                                <div class="footer-post">
                                    <h4>Badan Pengawas Perdagangan Berjangka Komoditi</h4> 
                                    <span>1/BAPPEBTI/2019</span>
                                </div>
 
                                <div class="footer-post">
                                    <h4>Bursa Komoditi dan Derivatif Indonesia</h4> 
                                    <span>No. 000/SPKB/ICDX/Dir/</span>
                                </div>
 
                                <div class="footer-post">
                                    <h4>Indonesia Clearing House</h4> 
                                    <span>No. 000/SPKK/ICH-RKB/V/</span>
                                </div>
 
                            </div>
                            <div class="col-lg-3 links">
                                <h3>Useful Links</h3>
                                <ul>
                                    <li><a href="{{url('/')}}">Beranda</a></li>
                                    <li><a href="{{url('/profil-perusahaan')}}">Profil Perusahaan</a></li>
                                    <li><a href="{{url('/akun-individu')}}">Akun Individu</a></li>
                                    <li><a href="{{url('/akun-institusi')}}">Akun Institusi</a></li>
                                    <li><a href="{{url('/kebijakan-privasi')}}">Kebijakan Privasi</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <h3>Newsletter</h3>
                                <div class="newsletter-bx">
                                    <form method="post" action="/newslater">
                                    {{ csrf_field() }}
                                        <div class="input-group">
                                            <input name="email" class="form-control" placeholder="Masukan Email" type="email" required>
                                            <span class="input-group-btn">
                                                <button type="submit" class="site-button"><i class="far fa-paper-plane"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>

                               <div class="social">
                                    
                               <ul>
                                        <li><a href="https://www.facebook.com/profile.php?id=100044373526634" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://twitter.com/RajawaliKapital" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://www.instagram.com/official.rkb/?hl=en" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="https://www.youtube.com/channel/UCzGli3EZAR4GmT1SK0XDRYA?view_as=subscriber" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <div class="row row-box-info">
                            <div class="col-md-4 block-info">
                                <div class="box-info-footer">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="col-md-8 p-0">
                                            <h3>Alamat</h3>
                                            <p>Ruko Kopo Plaza Blok B no 24 
                                            <br>jl. peta (lingkar selatan)
                                             <br>Kota Bandung, <br> Jawa Barat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 block-info">
                                <div class="box-info-footer">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <i class="fas fa-mobile-alt"></i>
                                        </div>
                                        <div class="col-md-8 p-0">
                                            <h3>Nomor Telepon</h3>
                                            <p>+62 222 0585 060
                                            </p>
                                                <p>Fax +62 222 0582 219</p>
                                                <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
 

                            <div class="col-md-4 block-info">
                                <div class="box-info-footer">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <i class="fas fa-at"></i>
                                        </div>
                                        <div class="col-md-8 p-0">
                                            <h3>Email</h3>
                                            <p>info@rajawalikapital.co.id <br>
                                            <br><br><br>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-copyright">
                        <p class="copy">
                            ©{{ now()->year }} PT. Rajawali Kapital Berjangka - ALL RIGHTS RESERVED
                        </p>
                    </div>
                </footer>
      
	</div>
	
    <!--Button Slide Top-->
    <div id="back-to-top">
        <a class="top arrow" href="#top">
            <i class="fa fa-angle-up"></i>
            <span>TOP</span>
        </a>
    </div>


    <div class="md-overlay"></div><!-- the overlay element -->
	
	
	
    <script src="{{asset('/public/main_dashboard/js/jquery-3.3.1.min.js')}}"></script>
 

    <script src="{{asset('/public/main_dashboard/js/owncarousel/owl.carousel.js')}}"></script>
    <!-- Popper.JS -->
    <script src="{{asset('/public/main_dashboard/js/popper.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('/public/main_dashboard/js/bootstrap.min.js')}}"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="{{asset('/public/main_dashboard/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <script src="{{asset('/public/main_dashboard/js/portfolio/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('/public/main_dashboard/js/portfolio/imagesloaded.pkgd.min.js')}}"></script>
    <!--Modal Language Form-->

    <script src="{{asset('/public/main_dashboard/js/modal/classie.js')}}"></script>
    <script src="{{asset('/public/main_dashboard/js/modal/modalEffects.js')}}"></script>
    

    <!-- waypoint -->
    <script src="{{asset('/public/main_dashboard/js/jquery.waypoints.min.js')}}"></script>

    <script src="{{asset('/public/main_dashboard/js/main.js')}}"></script>
    <script src="{{asset('/public/main_dashboard/js/api-gofx.js')}}"></script>
	
	 
    <script>

        $(function () {
            "use strict";

            $(window).scroll(function () {
                if ($(this).scrollTop() > 0) {
                    waypoint.enable();
                }
            });
            

        }) 
    </script>

    
<script>
        $(document).ready(function ($) {
            "use strict";

            $(".contact-adress").addClass("active");

            $(".contact-adress svg").on("click", function () {
                $(".contact-adress").removeClass("active");
            });
        });
    </script>
@if($menuName == 'hubungiKamiWeb')
    <script type="text/javascript">
        /********************************************
        GOOGLE MAPS
        ********************************************/

        // using a DROP animation. Clicking on the marker will toggle
        // the animation between a BOUNCE animation and no animation.
        $(document).ready(function ($) {
            "use strict"; 
            var mapPosition = new google.maps.LatLng(-6.933326, 107.589807);
            var markerPosition = new google.maps.LatLng(-6.933326, 107.589807);
            //var image = 'assets/images/marker.png';
            var image = {
                url: "/public/assets/images/marker.png", // url
                scaledSize: new google.maps.Size(70, 91), // size
            };
            var marker;
            var map;

            initialize();

            function initialize() {
                var styleArray = [
                    {
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#212121"
                            }
                        ]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#757575"
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "color": "#212121"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#757575"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.country",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#9e9e9e"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.land_parcel",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.locality",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#bdbdbd"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#757575"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#181818"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#616161"
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "color": "#1b1b1b"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#2c2c2c"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#8a8a8a"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#373737"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#3c3c3c"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway.controlled_access",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#4e4e4e"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#616161"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#757575"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#3d3d3d"
                            }
                        ]
                    }
                ];
                var mapOptions = {
                    zoom: 12,
                    styles: styleArray,
                    center: mapPosition
                };

                map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

                marker = new google.maps.Marker({
                    map: map,
                    draggable: true,

                    animation: google.maps.Animation.DROP,
                    icon: image,
                    position: markerPosition,
                    scaledSize: new google.maps.Size(50, 50), // size
                });
                google.maps.event.addListener(marker, 'click', toggleBounce);
            }

            function toggleBounce() {

                if (marker.getAnimation() != null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }

            google.maps.event.addDomListener(window, 'load', initialize);

        });
    </script>
@endif
</body>
</html>