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
            <a href="/{{Config::get('app.locale')}}/">
                    <h3 class="logo"><img src="{{asset('/public/assets/images/rajawali-kapital-berjangka-logo-biru.png')}}" alt="PT. Rajawali Kapital Berjangka - RKB" />@if(Config::get('app.locale') == 'id') Rajawali @else Eagle @endif</h3>
                </a>
                <i class="fas fa-times"></i>
            </div>
            
            <div class="box-sign-up">
                <a href="{{url('/clients-area')}}">@if(Config::get('app.locale') == 'cn') 登录客户端 @else Login Client @endif</a>
            </div>
            <div class="box-list">
                <a href="/{{Config::get('app.locale')}}/" @if($menuName == 'indexWeb') class="active" @endif>
                 <p class="sub-title">@if(Config::get('app.locale') == 'id')Beranda @elseif(Config::get('app.locale') == 'cn') 家 @else Home @endif</p>
                </a>
            </div>
            <div class="box-list" style="padding-bottom:15px;">
                <p class="sub-title" style="padding: 0px 30px !important;">@if(Config::get('app.locale') == 'id')Akun @elseif(Config::get('app.locale') == 'cn') 帐户 @else Account @endif
				<a href="javascript:void(0);" class="icon" onclick="menuAccount()">
					<i class="fa fa-caret-down"></i>
				  </a></p>
                <ul class="list-unstyled components" id="mymenuAccount" style="display: none;"> 
                    <li @if($menuName == 'akunIndividuPerusahaanWeb') class="active" @endif>
                            <a href="@if(Config::get('app.locale') == 'id') {{url('/'. Config::get('app.locale').'/akun-individu')}} @else {{url('/'. Config::get('app.locale').'/personal-account')}} @endif">
                            @if(Config::get('app.locale') == 'id')Akun Individu @elseif(Config::get('app.locale') == 'cn') 个人账户 @else Individual Account @endif</a>
                    </li>
                    <li @if($menuName == 'akunInstitusiPerusahaanWeb') class="active" @endif>
                            <a href="@if(Config::get('app.locale') == 'id') {{url('/'. Config::get('app.locale').'/akun-institusi')}} @else {{url('/'. Config::get('app.locale').'/institutional-account')}} @endif">
                            @if(Config::get('app.locale') == 'id')Akun Institusi @elseif(Config::get('app.locale') == 'cn') 机构账户 @else Institutional Account @endif</a>
                    </li>
                </ul>
            </div>
            <div class="box-list" style="padding-bottom:10px;">
                <p class="sub-title" style="padding: 0px 30px !important;">@if(Config::get('app.locale') == 'id')Produk GOFX @elseif(Config::get('app.locale') == 'cn') GOFX产品 @else GOFX products @endif 
				<a href="javascript:void(0);" class="icon" onclick="menuProduct()">
					<i class="fa fa-caret-down"></i>
				  </a>
				</p>
                <ul class="list-unstyled components" id="mymenuProduct" style="display: none;"> 
                    <li @if($menuName == 'gofxGoldPerusahaanWeb') class="active" @endif><a href="{{url('/'. Config::get('app.locale').'/gofx/gold')}}"> @if(Config::get('app.locale')=='cn') 金 @else Gold @endif</a></li>
                    <li @if($menuName == 'gofxOilPerusahaanWeb') class="active" @endif><a href="{{url('/'. Config::get('app.locale').'/gofx/oil')}}"> @if(Config::get('app.locale')=='cn') 油 @else Oil @endif</a></li>
                    <li @if($menuName == 'gofxForexPerusahaanWeb') class="active" @endif><a href="{{url('/'. Config::get('app.locale').'/gofx/forex')}}">@if(Config::get('app.locale')=='cn') 外汇交易 @else Forex @endif </a></li>
                </ul>
            </div>
            <div class="box-list">
                    <a href="@if(Config::get('app.locale') == 'id') {{url('/'. Config::get('app.locale').'/teknologi')}} @else {{url('/'. Config::get('app.locale').'/technology')}} @endif" @if($menuName == 'technologyPerusahaanWeb') class="active" @endif>
                 <p class="sub-title">@if(Config::get('app.locale') == 'id')Teknologi @elseif(Config::get('app.locale') == 'cn') 技术 @else Technology @endif </p>
                </a>
            </div>
            <div class="box-list">
                 <p class="sub-title">@if(Config::get('app.locale') == 'id')Berita @elseif(Config::get('app.locale') == 'cn') 新闻 @else News @endif <a href="javascript:void(0);" class="icon" onclick="menuNews()">
						<i class="fa fa-caret-down"></i>
					  </a></p>
				<ul class="list-unstyled components" id="mymenuNews" style="display: none;"> 
                    <li @if($menuName == 'econimiccalender') class="active" @endif>
                        <a href="@if(Config::get('app.locale') == 'id') {{url('/'. Config::get('app.locale').'/kalender-ekonomi')}} @else {{url('/'. Config::get('app.locale').'/economic-calendar')}} @endif">
                        @if(Config::get('app.locale') == 'id')Kalender Ekonomi @elseif(Config::get('app.locale') == 'cn') 经济日历 @else Economic Calendar @endif </a></li>
                    <li @if($menuName == 'newsForexFactory') class="active" @endif>
                        <a href="@if(Config::get('app.locale') == 'id') {{url('/'. Config::get('app.locale').'/berita-ekonomi')}} @else {{url('/'. Config::get('app.locale').'/economic-news')}} @endif">
                        @if(Config::get('app.locale') == 'id')Berita @elseif(Config::get('app.locale') == 'cn') 新闻 @else News @endif </a></li>
                </ul>
            </div>
            <div class="box-list">
                <a href="{{url('/'. Config::get('app.locale').'/partnership')}}" @if($menuName == 'partnershipPerusahaanWeb') class="active" @endif>
                 <p class="sub-title">@if(Config::get('app.locale')=='cn') 合伙 @else Partnership @endif </p>
                </a>
            </div>
            <div class="box-list">
                <p class="sub-title" style="padding: 0px 30px !important;">@if(Config::get('app.locale') == 'id')TENTANG KAMI @elseif(Config::get('app.locale') == 'cn') 关于我们 @else About Us @endif 
				 <a href="javascript:void(0);" class="icon" onclick="menuAboutUs()">
					<i class="fa fa-caret-down"></i>
				  </a></p>
                <ul class="list-unstyled components" id="mymenuAboutUs" style="display: none;"> 
                    <li @if($menuName == 'profilPerusahaanWeb') class="active" @endif>
                            <a href="@if(Config::get('app.locale') == 'id') {{url('/'. Config::get('app.locale').'/profil-perusahaan')}} @else {{url('/'. Config::get('app.locale').'/company-profile')}} @endif">
                            @if(Config::get('app.locale') == 'id')Profil Perusahaan @elseif(Config::get('app.locale') == 'cn') 公司简介 @else Company Profile @endif </a>
                    </li>
                    <li @if($menuName == 'danaPerusahaanWeb') class="active" @endif>
                            <a href="@if(Config::get('app.locale') == 'id') {{url('/'. Config::get('app.locale').'/dana-terpisah-perusahaan')}} @else {{url('/'. Config::get('app.locale').'/separate-company-funds')}} @endif">
                            @if(Config::get('app.locale') == 'id')Dana Terpisah @elseif(Config::get('app.locale') == 'cn') 分开的资金 @else Separate Funds @endif  </a>
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
                    
					@foreach (config('app.locales') as $localeKey => $locale)
                    @if ($localeKey != app()->getLocale())
                        <li><a class="dropdown-item" href="{{ route('locale.switch', $localeKey) }}">
                            {{ $locale }}
                        </a></li>
                    @endif
                    @endforeach			
                   
                </ul>
            </div>
            <div class="box-list">
                   <a href="@if(Config::get('app.locale') == 'id') {{url('/'. Config::get('app.locale').'/hubungi-kami')}} @else {{url('/'. Config::get('app.locale').'/contact-us')}} @endif" @if($menuName == 'hubungiKamiWeb') class="active" @endif>
                 <p class="sub-title">@if(Config::get('app.locale') == 'id')Hubungi Kami @elseif(Config::get('app.locale') == 'cn') 联系我们 @else Contact Us @endif </p>
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
                 <a href="@if(Config::get('app.locale') == 'id'){{url('/'. Config::get('app.locale').'/daftar-akun-demo')}} @else {{url('/'. Config::get('app.locale').'/register-demo-account')}} @endif">
                    <p class="md-trigger box-lang" data-modal="modal-demo" style="color:white;margin: 35px 0px 0 40px !important;">@if(Config::get('app.locale') == 'id')AKUN DEMO @elseif(Config::get('app.locale') == 'cn') 模拟账户 @else DEMO ACCOUNT @endif </p></a>
            </div>
            <div class="box-language">
                <a href="@if(Config::get('app.locale') == 'id') {{url('/'. Config::get('app.locale').'/daftar-akun-real')}} @else {{url('/'. Config::get('app.locale').'/register-real-account')}} @endif">
                 <p class="md-trigger box-lang" data-modal="modal-real" style="color:white;">@if(Config::get('app.locale') == 'id')AKUN REAL @elseif(Config::get('app.locale') == 'cn') 真实账户 @else REAL ACCOUNT @endif</p></a>
            </div>
            @else
             <div id="root">
            </div> 
            <div class="box-languag1">
                <a href="@if(Config::get('app.locale') == 'id'){{url('/'. Config::get('app.locale').'/daftar-akun-demo')}} @else {{url('/'. Config::get('app.locale').'/register-demo-account')}} @endif">
                <p class="md-trigger box-lang" data-modal="modal-demo"><span class="txt-lg">@if(Config::get('app.locale') == 'id')AKUN DEMO @elseif(Config::get('app.locale') == 'cn') 模拟账户 @else DEMO ACCOUNT @endif</span></p></a>
            </div>
            <div class="box-language">
                <a href="@if(Config::get('app.locale') == 'id') {{url('/'. Config::get('app.locale').'/daftar-akun-real')}} @else {{url('/'. Config::get('app.locale').'/register-real-account')}} @endif">
                <p class="md-trigger box-lang" data-modal="modal-real"><span class="txt-lg">@if(Config::get('app.locale') == 'id')AKUN REAL @elseif(Config::get('app.locale') == 'cn') 真实账户 @else REAL ACCOUNT @endif</span></p></a>
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
            <h3 class="title">@if(Config::get('app.locale') == 'id')Tipe <span>Akun @elseif(Config::get('app.locale') == 'cn')<span>帐户 </span>类型 @else Account <span>Type @endif </span></h3>
            <div class="line-centered-circolar"></div>
            <p>
                @if(Config::get('app.locale') == 'id')Kini Anda dapat memilih tipe akun sesuai dengan karakter trading anda. @elseif(Config::get('app.locale') == 'cn') 现在，您可以根据自己的交易特征选择帐户类型。 @else Now you can choose the type of account according to your trading character. @endif 
            </p>
        </div>
    </div>

    <div class="row box-body-price" style="margin-bottom: 10px;">

        <div class="col-lg-4">
            <div class="box-price">
                <h3 class="title"> @if(Config::get('app.locale') == 'id') GOFX AKUN DEMO @elseif(Config::get('app.locale') == 'cn') GOFX演示帐户 @else GOFX DEMO ACCOUNT @endif</h3>
                <div class="box-pack-price">
                    <h3>
                        FREE
                    </h3>
                </div>
                <div class="box-list-step">
                    <ul>
                        <li style="background: #f18109;">Tidak ada deposit </li>
                        <li>-</li>
                        <li>-</li>
                        <li>-</li>
                        <li>Meta Trader 5</li>
                    </ul>
                </div>
                <a href="@if(Config::get('app.locale') == 'id'){{url('/'. Config::get('app.locale').'/daftar-akun-demo')}} @else {{url('/'. Config::get('app.locale').'/register-demo-account')}} @endif">
                <button class="btn btn-more" type="button">@if(Config::get('app.locale') == 'id') Daftar @elseif(Config::get('app.locale') == 'cn') 寄存器 @else Register @endif </button></a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box-price">
                <h3 class="title">@if(Config::get('app.locale') == 'id') GOFX AKUN MINI @elseif(Config::get('app.locale') == 'cn') GOFX迷你账户 @else GOFX MINI ACCOUNT @endif</h3>
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
                <a href="@if(Config::get('app.locale') == 'id') {{url('/'. Config::get('app.locale').'/daftar-akun-real')}} @else {{url('/'. Config::get('app.locale').'/register-real-account')}} @endif">
                <button class="btn btn-more" type="button">@if(Config::get('app.locale') == 'id') Daftar @elseif(Config::get('app.locale') == 'cn') 寄存器 @else Register @endif</button></a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box-price">
                <h3 class="title">@if(Config::get('app.locale') == 'id') GOFX AKUN MIKRO @elseif(Config::get('app.locale') == 'cn') GOFX微型帐户 @else GOFX MICRO ACCOUNT @endif </h3>
                <div class="box-pack-price">
                    <h3>
                        500 Ribu 
                    </h3>
                </div>
                <div class="box-list-step">
                    <ul>
                        <li style="background: #f18109;">Initial Deposit </li>
                        <li>Fee Micro </li>
                        <li>1 Lot Micro</li>
                        <li>Floating rate</li>
                        <li>Meta Trader 5</li>
                    </ul>
                </div>
                <a href="@if(Config::get('app.locale') == 'id') {{url('/'. Config::get('app.locale').'/daftar-akun-real')}} @else {{url('/'. Config::get('app.locale').'/register-real-account')}} @endif">
                <button class="btn btn-more" type="button">@if(Config::get('app.locale') == 'id') Daftar @elseif(Config::get('app.locale') == 'cn') 寄存器 @else Register @endif</button></a>
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
                                <h4 class="title">@if(Config::get('app.locale') == 'id') Mau trading di GOFX ? @elseif(Config::get('app.locale') == 'cn') 想在GOFX上交易吗？ @else Want to trade on GOFX ? @endif</h4>
                                <p>@if(Config::get('app.locale') == 'id') biar trading lebih percaya diri, yuk klik tombol dibawah ini @elseif(Config::get('app.locale') == 'cn') 为了使交易更有信心，让我们点击下面的按钮 @else so that trading is more confident, let's click the button below @endif </p>
                                <a href="@if(Config::get('app.locale') == 'id'){{url('/'. Config::get('app.locale').'/daftar-akun-demo')}} @else {{url('/'. Config::get('app.locale').'/register-demo-account')}} @endif">
                                <button class="md-trigger box-lang btn btn-more" type="button">@if(Config::get('app.locale') == 'id')AKUN DEMO @elseif(Config::get('app.locale') == 'cn') 模拟账户 @else Demo Account @endif</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            
            <section class="box-company-services">
            <div class="container">
                    <div class="row m-0">
                        <div class="col-md-12 box-header-service">
                            <h3 class="title">@if(Config::get('app.locale') == 'id') Broker <span>Resmi @elseif(Config::get('app.locale') == 'cn') GOFX迷你账户 @else GOFX MINI ACCOUNT @endif </span></h3>
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
                                <h3>@if(Config::get('app.locale') == 'id') Pemberitahuan Resiko @elseif(Config::get('app.locale') == 'cn') 风险通知 @else Risk Notification @endif</h3>
                                <p>
                                        @if(Config::get('app.locale') == 'id') Semua produk finansial yang ditransaksikan dalam sistem margin mempunyai resiko tinggi
                                        terhadap dana Anda. Produk finansial ini tidak diperuntukkan bagi semua investor dan Anda
                                        bisa saja kehilangan dana lebih dari deposit awal Anda. Pastikan bahwa Anda benar-benar
                                        mengerti resikonya, dan mintalah nasihat independen jika diperlukan. @elseif(Config::get('app.locale') == 'cn') 在保证金系统中交易的所有金融产品均具有高风险
                                        对您的资金。 此金融产品并不适合所有投资者，您也可以
                                        可能会损失比您的初始存款更多的资金。 确保你真的是
                                        了解风险，并在需要时寻求独立的建议。 @else All financial products traded in the margin system have a high risk
                                        towards your funds. This financial product is not intended for all investors and you
                                        may lose more funds than your initial deposit. Make sure that you really are
                                        understand the risks, and seek independent advice if needed. @endif
                                </p>
                                <p>
                                        @if(Config::get('app.locale') == 'id') Mengingat transaksi ini adalah High Risk dan High Return, Calon nasabah diwajibkan melakukan Simulasi Transaksi (Demo Account) terlebih dahulu dan mempelajari Peraturan Transaksi (Trading Rules) sebelum melakukan transaksi. @elseif(Config::get('app.locale') == 'cn') 考虑到此交易是高风险和高回报的，因此，潜在客户必须先进行交易模拟（演示帐户），并在进行交易之前研究交易规则（交易规则）。 @else Considering that this transaction is High Risk and High Return, prospective customers are required to do a Transaction Simulation (Demo Account) first and study the Transaction Rules (Trading Rules) before making a transaction. @endif

                                    
                                </p>
                            </div>
                            <div class="col-lg-3">
                                <h3>
                                    @if(Config::get('app.locale') == 'id') Legalitas @elseif(Config::get('app.locale') == 'cn') 合法性 @else Legality @endif
                                </h3>

                                <div class="footer-post">
                                    <h4>
                                            @if(Config::get('app.locale') == 'id') Badan Pengawas Perdagangan Berjangka Komoditi @elseif(Config::get('app.locale') == 'cn') 商品期货交易监管局 @else Commodity Futures Trading Regulatory Agency @endif
                                    </h4> 
                                    <span>1/BAPPEBTI/2019</span>
                                </div>
 
                                <div class="footer-post">
                                    <h4>
                                            @if(Config::get('app.locale') == 'id') Bursa Komoditi dan Derivatif Indonesia @elseif(Config::get('app.locale') == 'cn') 印尼商品及衍生品交易所 @else Indonesian Commodity and Derivatives Exchange @endif
                                    </h4> 
                                    <span>No. 000/SPKB/ICDX/Dir/</span>
                                </div>
 
                                <div class="footer-post">
                                    <h4>
                                            @if(Config::get('app.locale') == 'cn') 印尼票据交换所 @else Indonesia Clearing House @endif

                                        
                                    </h4> 
                                    <span>No. 000/SPKK/ICH-RKB/V/</span>
                                </div>
 
                            </div>
                            <div class="col-lg-3 links">
                                <h3>
                                    @if(Config::get('app.locale') == 'cn') 有用的链接 @else Useful Links @endif
                                </h3>
                                <ul>
                                    <li>
                                    <a href="{{url('/'. Config::get('app.locale').'/')}}">
                                    @if(Config::get('app.locale') == 'id') Beranda @elseif(Config::get('app.locale') == 'cn') 家 @else Home @endif</a>
                                    </li>

                                    <li>
                                    <a href="@if(Config::get('app.locale') == 'id'){{url('/'. Config::get('app.locale').'/profil-perusahaan')}}  @else {{url('/'. Config::get('app.locale').'/company-profile')}} @endif">
                                    @if(Config::get('app.locale') == 'id') Profil Perusahaan @elseif(Config::get('app.locale') == 'cn') 公司简介 @else Company Profile @endif</a>
                                    </li>

                                    <li>
                                        <a href="@if(Config::get('app.locale') == 'id') {{url('/'. Config::get('app.locale').'/akun-individu')}} @else {{url('/'. Config::get('app.locale').'/personal-account')}}  @endif">
                                        @if(Config::get('app.locale') == 'id') Akun Individu @elseif(Config::get('app.locale') == 'cn') 个人账户 @else Individual Account @endif</a>
                                    </li>

                                    <li>
                                        <a href="@if(Config::get('app.locale') == 'id') {{url('/'. Config::get('app.locale').'/akun-institusi')}} @else {{url('/'. Config::get('app.locale').'/institutional-account')}} @endif">
                                        @if(Config::get('app.locale') == 'id') Akun Institusi @elseif(Config::get('app.locale') == 'cn') 机构账户 @else Institutional Account @endif</a>
                                    </li>

                                    <li>
                                        <a href="@if(Config::get('app.locale') == 'id') {{url('/'. Config::get('app.locale').'/kebijakan-privasi')}} @else {{url('/'. Config::get('app.locale').'/privacy-policy')}} @endif">
                                        @if(Config::get('app.locale') == 'id') Kebijakan Privasi @elseif(Config::get('app.locale') == 'cn') 隐私政策 @else Privacy policy @endif</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3">
                                <h3>@if(Config::get('app.locale') == 'cn') 通讯 @else Newsletter @endif </h3>
                                <div class="newsletter-bx">
                                    <form method="post" action="/newslater">
                                    {{ csrf_field() }}
                                        <div class="input-group">
                                            <input name="email" class="form-control" placeholder="@if(Config::get('app.locale') == 'id') Masukan Email @elseif(Config::get('app.locale') == 'cn') 输入电子邮件 @else Enter email @endif" type="email" required>
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
                                            <h3>@if(Config::get('app.locale') == 'id') Alamat @elseif(Config::get('app.locale') == 'cn') 地址 @else Address @endif </h3>
                                            <p>Ruko Kopo Plaza Blok B no 24 
                                            <br>jl. peta (lingkar selatan)
                                             <br>@if(Config::get('app.locale') == 'id') Kota Bandung,@elseif(Config::get('app.locale') == 'cn') 万隆市 @else Bandung City,@endif<br>@if(Config::get('app.locale') == 'id') Jawa Barat @elseif(Config::get('app.locale') == 'cn') 西爪哇 @else West Java @endif</p>
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
                                            <h3>@if(Config::get('app.locale') == 'id') Nomor Telepon @elseif(Config::get('app.locale') == 'cn') 电话号码 @else Phone number @endif</h3>
                                            <p>+62 222 0585 060
                                            </p>
                                                <p>@if(Config::get('app.locale') == 'cn') 传真+62 222 0582 219 @else Fax +62 222 0582 219 @endif</p>
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
                                            <h3>@if(Config::get('app.locale') == 'cn') 电子邮件 @else Email @endif</h3>
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
                            ©{{ now()->year }} @if(Config::get('app.locale') == 'id') PT. Rajawali Kapital Berjangka @else Eagle Capital Futures Ltd @endif - ALL RIGHTS RESERVED
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