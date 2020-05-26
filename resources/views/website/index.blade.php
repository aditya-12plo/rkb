@extends('layouts.website')
@section('content-website')
            <!--Box Slideshow-->
            @if($isMobile)
            <div class="box-slideshow" style="height:300px !important;margin-top: 20px;">
                <div class="owl-carousel slideshow">

                @foreach($banners as $b)
                <div class="item item1" style="height:400px !important;">
                <div class="background-img-mobile" style="background-image: url('/public/assets/images/banner/{{$b->images_name}}');top: 70px;">
                   
                    </div>
                    
                    <div class="container" style="padding-top:0% !important;">
                        <div class="row">
                            <div class="description" style="padding-left: 10px;"> 
                                @if( Config::get('app.locale') == 'en')
                                    <?php echo $b->description_en; ?>
                                @else
                                    <?php echo $b->description_id; ?>
                                @endif
                            </div>
                        </div>
                    </div>
                </div> 
                @endforeach

                </div>
            </div>
 
            @else 
            <div class="box-slideshow">
                <div class="owl-carousel slideshow">

                
                
                @foreach($banners as $b)
                <div class="item item1">
                    <div class="background-img" style="background-image: url('/public/assets/images/banner/{{$b->images_name}}');">
                   
                    </div>
                    <div class="container" style="padding-top:23% !important;">
                        <div class="row">
                            <div class="description" style="padding-left: 10px;"> 
                                @if( Config::get('app.locale') == 'en')
                                    <?php echo $b->description_en; ?>
                                @else
                                    <?php echo $b->description_id; ?>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
            @endif   


            <div class="box-general-desc">
                

                <section class="box-tranding container">
                    <div class="row">
                        <div class="col-md-12 box-header-tranding">
                            <h3 class="title">@if(Config::get('app.locale') == 'cn') 为什么要与真正的经纪人交易？@else Why Trade with <span>the truly broker ?  @endif</span></h3>
                            <div class="line-centered-circolar"></div>
                            <p>
                                @if(Config::get('app.locale') == 'id') Rajawali Kapital hadir sebagai perusahaan atau broker yang bertumpu pada 
                                tujuan untuk memberikan manfaat dan kontribusi bagi masyarakat.
                                Melalui proses peningkatan Literacy keuangan di seluruh lapisan masyarakat, 
                                akan mengubah dan membantu dalam <b>memberikan nilai tambah</b> yang bermanfaat bagi 
                                masyarakat luas dalam meraih dan meningkatkan kualitas keuangan yang lebih baik 
                                sampai dengan <b>mempersiapkan kehidupan di masa yang akan datang</b>  melalui 
                                penyelengaraan solusi jasa keuangan bersama kami. @elseif(Config::get('app.locale') == 'cn') Eagle Capital作为一家公司或经纪人存在，其宗旨是为社会提供利益和贡献。 通过提高社会各个阶层的金融素养的过程，它将改变并协助<b>提供增值</b>，这对更广泛的社区来说有利于更好地实现和改善金融质量，直到<b>为生活做准备 </b>是通过与我们一起提供金融服务解决方案来实现的。 @else Eagle Capital exists as a company or broker that relies on the aim of providing benefits and contributions to society. Through the process of increasing financial literacy at all levels of society, it will change and assist in <b> providing added value </b> that is beneficial to the wider community in achieving and improving financial quality better until <b> preparing for life in the future came </b> through holding a financial service solution with us. @endif
                            

                            </p>
                        </div>
                    </div>
                    
                    <div class="row box-body-services">

                        <div class="col-12"> 
                          
                        <div class="gdlr-core-zoom-on-hover">
                                <img src="{{asset('/public/assets/images/Why trade with truly broker 1a.jpg')}}" alt="PT. Rajawali Kapital Berjangka">
                            </div>
                        </div> 

                    </div> 
                </section>

                <section class="box-tranding container" style="padding-bottom:0% !important;">
                <div class="row">
                        <div class="col-md-12 box-header-tranding" style="margin-bottom:0% !important;">
                            <h3 class="title">@if(Config::get('app.locale') == 'cn') <span> 4个步骤</ span>开始交易<span> GOFX </ span> @else Start Trading <span>GOFX</span> in <span>4 Steps</span> @endif</h3>
                            <div class="line-centered-circolar"></div>
                        </div>
                    </div>
                </section>
                <section id="statistic" style="background-image: url('/public/assets/images/banner-start-trading.jpg');background-repeat: no-repeat;">
                    <div class="row m-0" style="padding-top:8%;">
                        <div class="col-md-3">
                            <div class="box-stats">
                                <img src="{{asset('/public/assets/images/icon/Registered.png')}}" style="max-height: 100px !important;" alt="Pendaftaran akun di rajawali berjangka" />
                                <h3>@if(Config::get('app.locale') == 'cn') 寄存器 @else Register @endif</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box-stats">
                                <img src="{{asset('/public/assets/images/icon/Verify.png')}}" style="max-height: 100px !important;" alt="verifikasi akun di rajawali berjangka" />
                                <h3>@if(Config::get('app.locale') == 'cn') 校验 @else Verify @endif</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box-stats">
                                <img src="{{asset('/public/assets/images/icon/Fund.png')}}" style="max-height: 100px !important;" alt="masukan dana ke akun di rajawali berjangka" />
                                <h3>@if(Config::get('app.locale') == 'cn') 基金 @else Fund @endif</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box-stats">
                                <img src="{{asset('/public/assets/images/icon/Trade.png')}}" style="max-height: 100px !important;" alt="trading denga akun di rajawali berjangka" />
                                <h3>@if(Config::get('app.locale') == 'cn') 贸易 @else Trade @endif</h3>
                            </div>
                        </div>
                    </div>
                </section>

            
            
                <section class="box-tranding container" style="padding-top:70px !important;">
                    <div class="row">
                        <div class="col-md-12 box-header-tranding" style="margin-bottom:0% !important;">
                            <h3 class="title">@if(Config::get('app.locale') == 'id')  Why Trade With <span> Rajawali Kapital </span> @elseif(Config::get('app.locale') == 'cn') 为什么要与<span>Eagle Capital</span>交易 @else Why Trade With <span> Eagle Capital </span> @endif</h3>
                            <div class="line-centered-circolar"></div>
                        </div>
                    </div>
                    <div class="row box-body-services mb-4">

                        <div class="col-12 col-md-4">
                            <div class="box-single-service">
                                <img src="{{asset('/public/assets/images/icon/Transaksi di Bursa.png')}}" alt="Transaksi langsung di bursa">
                                {{-- <h3>@if(Config::get('app.locale') == 'id') Transaksi langsung di bursa @elseif(Config::get('app.locale') == 'cn') 交易所直接交易 @else Direct transactions on exchange @endif</h3>
                                <p>@if(Config::get('app.locale') == 'id') Spot Forex Exchange Traded Pertama di Asia Tenggara. @elseif(Config::get('app.locale') == 'cn') 东南亚第一个外汇交易现货。 @else The First Forex Exchange Traded Spot in Southeast Asia. @endif</p> --}}
                                <h3>Transaksi langsung di bursa</h3>
                                <p>Spot Forex Exchange Traded Pertama di Asia Tenggara.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="box-single-service">
                                <img src="{{asset('/public/assets/images/icon/Global Access.png')}}" alt="Integrated global access">
                                {{-- <h3>@if(Config::get('app.locale') == 'cn') 集成的全球访问 @else Integrated global access @endif</h3>
                                <p>@if(Config::get('app.locale') == 'id') Likuiditas pasar yang tinggi, terkoneksi dengan interbank market. @elseif(Config::get('app.locale') == 'cn') 市场流动性高，与银行间市场有关。 @else High market liquidity, connected with the interbank market. @endif </p> --}}
                                <h3>Integrated global access</h3>
                                <p>Likuiditas pasar yang tinggi, terkoneksi dengan interbank market.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="box-single-service">
                                <img src="{{asset('/public/assets/images/icon/Keamanan Terbaik.png')}}" alt="Tingkat Keamanan Terbaik">
                                {{-- <h3>@if(Config::get('app.locale') == 'id') Tingkat Keamanan Terbaik @elseif(Config::get('app.locale') == 'cn') 最佳安全级别 @else The Best Security Level @endif</h3>
                                <p>@if(Config::get('app.locale') == 'id') Prosedur keamanan penyimpanan dana nasabah sepenuhnya di lembaga kliring. @elseif(Config::get('app.locale') == 'cn') 将客户资金全额存放在票据交换所的安全程序。 @else Security procedure for full deposit of customer funds at the clearing house. @endif</p> --}}
                                <h3>Tingkat Keamanan Terbaik </h3>
                                <p>Prosedur keamanan penyimpanan dana nasabah sepenuhnya di lembaga kliring. </p>
                            </div>
                        </div>

                    </div>
                </section>
                
                <section class="box-tranding container">
                    <div class="row">
                        <div class="col-md-12 box-header-tranding" style="margin-bottom:0% !important;">
                            <h3 class="title">@if(Config::get('app.locale') == 'cn') MT5是一个<span>强大的交易平台</span> @else MT5 is a <span>powerful trading platform</span> @endif</h3>
                            <div class="line-centered-circolar"></div>
                            
                        <div class="col-12">
                            <div class="gdlr-core-zoom-on-hover">
                                <img src="{{asset('/public/assets/images/MT5.jpg')}}" alt="PT. Rajawali Kapital Berjangka">
                            </div>
                            <p><b>@if(Config::get('app.locale') == 'cn') 通过优先平台进入全球市场 @else Access Global Markets Through Priority Platforms @endif</b></p>
                        </div> 

                        <p><b>@if(Config::get('app.locale') == 'cn') MT5通过最先进的交易，分析技术和服务，在同一平台上实现多合一交易 @else MT5 enables all-in-one trading on the same platform, with the state-of-the-art trading and analytical technologies and service @endif</b></p>
                        <p>@if(Config::get('app.locale') == 'id') Meta Trader 5 adalah sebuah platform multi aset yang menyediakan sistem trading yang berbeda dari versi sebelumnya dan memberikan fasilitas analisa teknikal lebih luas serta fasilitas Expert Advisor (EA) yang dapat ditambahkan dalam MT5. @elseif(Config::get('app.locale') == 'cn') Meta Trader 5是一个多资产平台，提供与以前版本不同的交易系统，并提供可以添加到MT5的更广泛的技术分析工具和EA交易工具。 @else Meta Trader 5 is a multi-asset platform that provides a trading system that is different from previous versions and provides a broader technical analysis facility and Expert Advisor (EA) facility that can be added to MT5. @endif</p>
                       
                    </div>
                    </div>
                    
                </section>
            

               
                
                <section class="box-tranding container">
                    <div class="row">
                        <div class="col-md-12 box-header-tranding" style="margin-bottom:0% !important;">
                            <h3 class="title">@if(Config::get('app.locale') == 'cn') 交易的好处<span> GOFX赢得美国</span> @else BENEFITS OF TRADING <span>GOFX WITS US</span> @endif</h3>
                            <div class="line-centered-circolar"></div>
                            
<section id="portfolio" class="editor-content" style="margin-bottom:0% !important;margin-top:0% !important;">
    <div class="container">

        <div class="row portfolio" style="margin-bottom:0% !important;">
            <div class="col-md-6 col-lg-4 portfolio-item cat1 cat5">
                <div class="portfolio-block">
                    <img src="{{asset('/public/assets/images/Legal-dan-terpercaya.jpg')}}" alt="">
                        <div class="portfolio-overlay">
                            <div class="portfolio-btn-action">
                                <a href="/">
                                    <span class="lnr lnr-link"></span>
                                </a>
                                <a href="{{asset('/public/assets/images/Legal-dan-terpercaya.jpg')}}" class="popup-img">
                                    <span class="lnr lnr-frame-expand"></span>
                                </a>
                            </div>
                            <div class="portfolio-desc">
                                <h4>@if(Config::get('app.locale') == 'id') Legal dan Terpercaya @elseif(Config::get('app.locale') == 'cn') 合法可靠 @else Legal and Reliable @endif</h4>
                                <p>@if(Config::get('app.locale') == 'id') Broker resmi di Indonesia yang hanya menawarkan transaksi pada produk produk Bursa @elseif(Config::get('app.locale') == 'cn') 印度尼西亚的官方经纪人，仅提供有关Exchange产品的交易 @else An official broker in Indonesia that only offers transactions on Exchange products @endif</p>
                            </div>
                        </div>
                    </div> <!-- END portfolio-single-->
            </div> <!--  END col-md-4-->
            
            <div class="col-md-6 col-lg-4 portfolio-item cat1 cat5">
                <div class="portfolio-block">
                    <img src="{{asset('/public/assets/images/Transaksi-di-Bursa.jpg')}}" alt="">
                        <div class="portfolio-overlay">
                            <div class="portfolio-btn-action">
                                <a href="/">
                                    <span class="lnr lnr-link"></span>
                                </a>
                                <a href="{{asset('/public/assets/images/Transaksi-di-Bursa.jpg')}}" class="popup-img">
                                    <span class="lnr lnr-frame-expand"></span>
                                </a>
                            </div>
                            <div class="portfolio-desc">
                                <h4>@if(Config::get('app.locale') == 'id') Transaksi langsung di bursa @elseif(Config::get('app.locale') == 'cn') 交易所直接交易 @else Direct transactions on the exchange @endif</h4>
                                <p>@if(Config::get('app.locale') == 'id') Spot Forex Exchange Traded Pertama di Asia Tenggara @elseif(Config::get('app.locale') == 'cn') 东南亚第一个外汇交易现货 @else The First Forex Exchange Traded Spot in Southeast Asia @endif</p>
                            </div>
                        </div>
                    </div> <!-- END portfolio-single-->
            </div> <!--  END col-md-4-->
            
            <div class="col-md-6 col-lg-4 portfolio-item cat1 cat5">
                <div class="portfolio-block">
                    <img src="{{asset('/public/assets/images/Keamanan.jpg')}}" alt="">
                        <div class="portfolio-overlay">
                            <div class="portfolio-btn-action">
                                <a href="/">
                                    <span class="lnr lnr-link"></span>
                                </a>
                                <a href="{{asset('/public/assets/images/Keamanan.jpg')}}" class="popup-img">
                                    <span class="lnr lnr-frame-expand"></span>
                                </a>
                            </div>
                            <div class="portfolio-desc">
                                <h4>@if(Config::get('app.locale') == 'id') Tingkat Keamanan Terbaik @elseif(Config::get('app.locale') == 'cn') 最佳安全级别 @else The Best Security Level @endif</h4>
                                <p>@if(Config::get('app.locale') == 'id') Prosedur keamanan penyimpanan dana nasabah sepenuhnya di lembaga kliring. @elseif(Config::get('app.locale') == 'cn') 将客户资金全额存放在票据交换所的安全程序。 @else Security procedure for full deposit of customer funds at the clearing house. @endif</p>
                            </div>
                        </div>
                    </div> <!-- END portfolio-single-->
            </div> <!--  END col-md-4-->
            
            <div class="col-md-6 col-lg-4 portfolio-item cat1 cat5">
                <div class="portfolio-block">
                    <img src="{{asset('/public/assets/images/No-Requote.jpg')}}" alt="">
                        <div class="portfolio-overlay">
                            <div class="portfolio-btn-action">
                                <a href="/">
                                    <span class="lnr lnr-link"></span>
                                </a>
                                <a href="{{asset('/public/assets/images/No-Requote.jpg')}}" class="popup-img">
                                    <span class="lnr lnr-frame-expand"></span>
                                </a>
                            </div>
                            <div class="portfolio-desc">
                                <h4>@if(Config::get('app.locale') == 'cn') 没有重新报价 @else No Requote @endif</h4>
                                <p>@if(Config::get('app.locale') == 'id') Trading lebih cepat tanpa requote, karena transaksi anda terjadi langsung di Bursa @elseif(Config::get('app.locale') == 'cn') 无需重新报价，交易速度更快，因为您的交易直接在交易所进行 @else Trade faster without requotes, because your transactions occur directly on the Exchange @endif</p>
                            </div>
                        </div>
                    </div> <!-- END portfolio-single-->
            </div> <!--  END col-md-4-->
            
            <div class="col-md-6 col-lg-4 portfolio-item cat1 cat5">
                <div class="portfolio-block">
                    <img src="{{asset('/public/assets/images/Liquidity.jpg')}}" alt="">
                        <div class="portfolio-overlay">
                            <div class="portfolio-btn-action">
                                <a href="/">
                                    <span class="lnr lnr-link"></span>
                                </a>
                                <a href="{{asset('/public/assets/images/Liquidity.jpg')}}" class="popup-img">
                                    <span class="lnr lnr-frame-expand"></span>
                                </a>
                            </div>
                            <div class="portfolio-desc">
                                <h4>@if(Config::get('app.locale') == 'id') Likuiditas Tinggi @elseif(Config::get('app.locale') == 'cn') 高流动性 @else High Liquidity @endif</h4>
                                <p>@if(Config::get('app.locale') == 'id') Likuiditas pasar yang tinggi, karena terkoneksi dengan interbank market @elseif(Config::get('app.locale') == 'cn') 高市场流动性，因为它与银行间市场有关 @else High market liquidity, because it is connected with the interbank market @endif
                                        </p>
                            </div>
                        </div>
                    </div> <!-- END portfolio-single-->
            </div> <!--  END col-md-4--> 

            <div class="col-md-6 col-lg-4 portfolio-item cat1 cat5">
                <div class="portfolio-block">
                    <img src="{{asset('/public/assets/images/technology.jpg')}}" alt="">
                        <div class="portfolio-overlay">
                            <div class="portfolio-btn-action">
                                <a href="/">
                                    <span class="lnr lnr-link"></span>
                                </a>
                                <a href="{{asset('/public/assets/images/technology.jpg')}}" class="popup-img">
                                    <span class="lnr lnr-frame-expand"></span>
                                </a>
                            </div>
                            <div class="portfolio-desc">
                                <h4>@if(Config::get('app.locale') == 'id') Teknologi yang Inovatif @elseif(Config::get('app.locale') == 'cn') 创新技术 @else Innovative Technology @endif</h4>
                                <p>@if(Config::get('app.locale') == 'id') Trading di GOFX dengan menggunakan platform canggih MT5 @elseif(Config::get('app.locale') == 'cn') 使用先进的MT5平台在GOFX上进行交易 @else Trade on GOFX using the advanced MT5 platform @endif</p>
                            </div>
                        </div>
                    </div> <!-- END portfolio-single-->
            </div> <!--  END col-md-4-->

        </div> <!--  END col-md-4-->

    </div>
</section>
                            

                        </div>
                    </div>
                    
                </section>

            </div>

@endsection