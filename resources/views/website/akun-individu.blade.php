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
                        <h3 align="center">@if(Config::get('app.locale') == 'id') Akun Individu / Retail @elseif(Config::get('app.locale') == 'cn') 个人/零售账户 @else Individual / Retail accounts @endif</h3>
                        <div class="line-centered-circolar"></div>
                        <p>
                            @if(Config::get('app.locale') == 'id')Rajawali Kapital menyediakan fasilitas online trading di pasar valuta asing dan derivatif lainnya yang transaksinya langsung terjadi di dalam Bursa. Bagi Investor atau nasabah yang sudah terbiasa bertransaksi dengan teknologi trading online, maka Rajawali Kapital akan menjadi partner yang tepat untuk bertransaksi produk-produk <a href="http://gofx.co.id/" style="color:#f18109;" target="_blank">GOFX</a> (Gold, Oil, Forex). @elseif(Config::get('app.locale') == 'cn')  Eagle Capital在外汇市场和其他直接在交易所进行交易的衍生工具中提供在线交易功能。 对于习惯于使用在线交易技术进行交易的投资者或客户，Eagle Capital将是交易<a href="http://gofx.co.id/" style="color:#f18109;" target="_blank">GOFX</a>（黄金，石油，外汇）产品的合适合作伙伴。 @else  Eagle Capital provides online trading facilities in the foreign exchange market and other derivatives whose transactions occur directly in the Exchange. For investors or customers who are used to trading with online trading technology, Eagle Capital will be the right partner to trade <a href="http://gofx.co.id/" style="color:#f18109;" target="_blank">GOFX</a> (Gold, Oil, Forex) products.@endif
                       
                        </p>
                        <p>
                                @if(Config::get('app.locale') == 'id')  Di Rajawali Kapital, kami berkomitmen untuk membantu nasabah individu atau retail untuk mencapai tujuan transaksi serta investasinya, dengan berbagai layanan. @elseif(Config::get('app.locale') == 'cn') 在Eagle Capital，我们致力于通过各种服务帮助个人或零售客户实现交易和投资目标。@else At Eagle Capital, we are committed to helping individual or retail customers achieve their transaction and investment goals, with a variety of services. @endif
                       
                        </p>
                        <p>
                                @if(Config::get('app.locale') == 'id') Kami memberikan layanan platform trading yang dirancang khusus untuk memberikan berbagai kemudahan bagi semua kalangan investor dan trader dalam melakukan transaksi produk-produk  <a href="http://gofx.co.id/" style="color:#f18109;" target="_blank">GOFX</a>. Satu-satunya produk berjangka komoditi yang transaksinya langsung terjadi di dalam BURSA. @elseif(Config::get('app.locale') == 'cn') 我们提供专门设计的交易平台服务，以便为所有投资者和交易者在<a href="http://gofx.co.id/" style="color:#f18109;" target="_blank">GOFX</a>产品上进行交易提供各种便利。 交易直接在交换中发生的唯一商品期货产品。@else We provide trading platform services specifically designed to provide various facilities for all investors and traders in conducting transactions on <a href="http://gofx.co.id/" style="color:#f18109;" target="_blank">GOFX</a> products. The only commodity futures product which transactions occur directly in EXCHANGE. @endif
                        </p>
                        </div>

                </div> 

                 
                <div class="row box-body-services mb-4">

                <div class="col-12 col-md-6">
                    <div class="box-single-service">
                        <h3>@if(Config::get('app.locale') == 'id') Yuk, Buka Akun @elseif(Config::get('app.locale') == 'cn') 来吧，开一个账户 @else Come on, Open an Account @endif</h3>
                        <p><button class="md-trigger box-lang btn btn-more" data-modal="modal-demo" type="button">@if(Config::get('app.locale') == 'id')AKUN DEMO @elseif(Config::get('app.locale') == 'cn') 模拟账户 @else DEMO ACCOUNT @endif</button></p>
                        <p><button class="md-trigger box-lang btn btn-more" data-modal="modal-real" type="button" style="background-color:#2e3192;">@if(Config::get('app.locale') == 'id')AKUN REAL @elseif(Config::get('app.locale') == 'cn') 真实账户 @else REAL ACCOUNT @endif</button></p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="box-single-service">
                        <h3>@if(Config::get('app.locale') == 'id') Butuh Bantuan ? @elseif(Config::get('app.locale') == 'cn') 需要帮忙 ？ @else Need Help ? @endif</h3>
                        <p>@if(Config::get('app.locale') == 'id') Telepon @elseif(Config::get('app.locale') == 'cn') 电话 @else Phone @endif :  +6222 2058 5060</p>
                        <p>@if(Config::get('app.locale') == 'cn') 电子邮件 @else Email @endif : INFO@RAJAWALIKAPITAL.CO.ID</p>
                    </div>
                </div>

                </div>

                        
</div>

@endsection