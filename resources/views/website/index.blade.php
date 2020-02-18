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
                            <h3 class="title">Why Trade with <span>the truly broker ?</span></h3>
                            <div class="line-centered-circolar"></div>
                            <p>
                            Rajawali Kapital hadir sebagai perusahaan atau broker yang bertumpu pada 
                            tujuan untuk memberikan manfaat dan kontribusi bagi masyarakat.
                            Melalui proses peningkatan Literacy keuangan di seluruh lapisan masyarakat, 
                            akan mengubah dan membantu dalam <b>memberikan nilai tambah</b> yang bermanfaat bagi 
                            masyarakat luas dalam meraih dan meningkatkan kualitas keuangan yang lebih baik 
                            sampai dengan <b>mempersiapkan kehidupan di masa yang akan datang</b>  melalui 
                            penyelengaraan solusi jasa keuangan bersama kami.

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
                            <h3 class="title">Start Trading <span>GOFX</span> in <span>4 Steps</span></h3>
                            <div class="line-centered-circolar"></div>
                        </div>
                    </div>
                </section>
                <section id="statistic" style="background-image: url('/public/assets/images/banner-start-trading.jpg');background-repeat: no-repeat;">
                    <div class="row m-0" style="padding-top:8%;">
                        <div class="col-md-3">
                            <div class="box-stats">
                                <img src="{{asset('/public/assets/images/icon/Registered.png')}}" style="max-height: 100px !important;" alt="Pendaftaran akun di rajawali berjangka" />
                                <h3>Register</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box-stats">
                                <img src="{{asset('/public/assets/images/icon/Verify.png')}}" style="max-height: 100px !important;" alt="verifikasi akun di rajawali berjangka" />
                                <h3>Verify</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box-stats">
                                <img src="{{asset('/public/assets/images/icon/Fund.png')}}" style="max-height: 100px !important;" alt="masukan dana ke akun di rajawali berjangka" />
                                <h3>Fund</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="box-stats">
                                <img src="{{asset('/public/assets/images/icon/Trade.png')}}" style="max-height: 100px !important;" alt="trading denga akun di rajawali berjangka" />
                                <h3>Trade</h3>
                            </div>
                        </div>
                    </div>
                </section>

            
            
                <section class="box-tranding container" style="padding-top:70px !important;">
                    <div class="row">
                        <div class="col-md-12 box-header-tranding" style="margin-bottom:0% !important;">
                            <h3 class="title">Why Trade With <span> Rajawali Kapital</span></h3>
                            <div class="line-centered-circolar"></div>
                        </div>
                    </div>
                    <div class="row box-body-services mb-4">

                        <div class="col-12 col-md-4">
                            <div class="box-single-service">
                                <img src="{{asset('/public/assets/images/icon/Transaksi di Bursa.png')}}" alt="Transaksi langsung di bursa">
                                <h3>Transaksi langsung di bursa</h3>
                                <p>Spot Forex Exchange Traded Pertama di Asia Tenggara.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="box-single-service">
                                <img src="{{asset('/public/assets/images/icon/Global Access.png')}}" alt="Integrated global access">
                                <h3>Integrated global access</h3>
                                <p>Likuiditas pasar yang tinggi, terkoneksi dengan interbank market. </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="box-single-service">
                                <img src="{{asset('/public/assets/images/icon/Keamanan Terbaik.png')}}" alt="Tingkat Keamanan Terbaik">
                                <h3>Tingkat Keamanan Terbaik</h3>
                                <p>Prosedur keamanan penyimpanan dana nasabah sepenuhnya di lembaga kliring.</p>
                            </div>
                        </div>

                    </div>
                </section>
                
                <section class="box-tranding container">
                    <div class="row">
                        <div class="col-md-12 box-header-tranding" style="margin-bottom:0% !important;">
                            <h3 class="title">MT5 is a <span>powerful trading platform</span></h3>
                            <div class="line-centered-circolar"></div>
                            
                        <div class="col-12">
                            <div class="gdlr-core-zoom-on-hover">
                                <img src="{{asset('/public/assets/images/MT5.jpg')}}" alt="PT. Rajawali Kapital Berjangka">
                            </div>
                            <p><b>Access Global Markets Through Priority Platforms</b></p>
                        </div> 

                        <p><b>MT5 enables all-in-one trading on the same platform, with the state-of-the-art
trading and analytical technologies and service</b></p>
                        <p>Meta Trader 5 adalah sebuah platform multi aset yang menyediakan sistem trading yang berbeda dari versi sebelumnya dan memberikan fasilitas analisa teknikal lebih luas serta fasilitas Expert Advisor (EA) yang dapat ditambahkan dalam MT5.</p>
                       
                    </div>
                    </div>
                    
                </section>
            

               
                
                <section class="box-tranding container">
                    <div class="row">
                        <div class="col-md-12 box-header-tranding" style="margin-bottom:0% !important;">
                            <h3 class="title">BENEFITS OF TRADING <span>GOFX WITS US</span></h3>
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
                                <h4>Legal dan Terpercaya</h4>
                                <p>Broker resmi di Indonesia yang hanya menawarkan transaksi pada produk produk Bursa</p>
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
                                <h4>Transaksi langsung di bursa</h4>
                                <p>Spot Forex Exchange Traded Pertama di Asia Tenggara</p>
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
                                <h4>Tingkat Keamanan Terbaik</h4>
                                <p>Prosedur keamanan penyimpanan dana nasabah sepenuhnya di lembaga kliring.</p>
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
                                <h4>No Requote</h4>
                                <p>Trading lebih cepat tanpa requote, karena transaksi anda terjadi langsung di Bursa</p>
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
                                <h4>Likuiditas Tinggi</h4>
                                <p>Likuiditas pasar yang tinggi, karena terkoneksi dengan interbank market</p>
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
                                <h4>Technology yang Inovatif</h4>
                                <p>Trading di GOFX dengan menggunakan platform canggih MT5</p>
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