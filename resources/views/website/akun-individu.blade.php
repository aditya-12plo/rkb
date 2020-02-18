@extends('layouts.website')
@section('content-website')


<div class="feed-content blog" style="padding-top:20px !important;">
                @if($isMobile)
                <div class="box-single-img" style="background-image: url('/public/assets/images/Banner akun individu 1.jpg');background-size: 100% !important;background-repeat: no-repeat !important;background-position: center !important;margin-top: 55px;height: 200px;margin-bottom: 0px !important;">
                @else
                <div class="box-single-img" style="background-image: url('/public/assets/images/Banner akun individu 1.jpg');background-size: 100% !important;background-repeat: no-repeat !important;background-position: center !important;margin-bottom: 0px !important;margin-top: 70px;">
                @endif            
                <div class="gr-back"></div>

            </div>
            <div class="container box-about">
                <div class="row box-exchange" style="padding-top:70px !important;padding-bottom:0% !important;">
 
                    <div class="col-md-12 box-desc-about">
                        <h3 align="center">Akun Individu / Retail</h3>
                        <div class="line-centered-circolar"></div>
                        <p>
                        Rajawali Kapital menyediakan fasilitas online trading di pasar valuta asing dan derivatif lainnya yang transaksinya langsung terjadi di dalam Bursa. Bagi Investor atau nasabah yang sudah terbiasa bertransaksi dengan teknologi trading online, maka Rajawali Kapital akan menjadi partner yang tepat untuk bertransaksi produk-produk <a href="http://gofx.co.id/" style="color:#f18109;" target="_blank">GOFX</a> (Gold, Oil, Forex).
                        </p><p>
                        Di Rajawali Kapital, kami berkomitmen untuk membantu nasabah individu atau retail untuk mencapai tujuan transaksi serta investasinya, dengan berbagai layanan.
                    </p>
                    <p>
                    Kami memberikan layanan platform trading yang dirancang kusus untuk memberikan berbagai kemudahan bagi semua kalangan investor dan trader dalam melakukan transaksi produk-produk  <a href="http://gofx.co.id/" style="color:#f18109;" target="_blank">GOFX</a>. Satu-satunya produk berjangka komoditi yang transaksinya langsung terjadi di dalam BURSA.
                    </p>
                    </div>

                </div> 

                 
                <div class="row box-body-services mb-4">

                <div class="col-12 col-md-6">
                    <div class="box-single-service">
                        <h3>Yuk, Buka Akun</h3>
                        <p><button class="md-trigger box-lang btn btn-more" data-modal="modal-demo" type="button">AKUN DEMO</button></p>
                        <p><button class="md-trigger box-lang btn btn-more" data-modal="modal-real" type="button" style="background-color:#2e3192;">AKUN REAL</button></p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="box-single-service">
                        <h3>Butuh Bantuan ?</h3>
                        <p>Telepon :  +6222 2058 5060</p>
                        <p>Email : INFO@RAJAWALIKAPITAL.CO.ID</p>
                    </div>
                </div>

                </div>

                        
</div>

@endsection