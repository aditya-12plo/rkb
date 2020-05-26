@extends('layouts.website')
@section('content-website')

<div class="feed-content blog" style="padding-top:20px !important;">
                @if($isMobile)
                <div class="box-single-img" style="background-image: url('/public/assets/images/rekening-terpisah.jpg');background-size: 100% !important;background-repeat: no-repeat !important;background-position: center !important;margin-top: 55px;height: 200px;margin-bottom: 0px !important;">
                @else
                <div class="box-single-img" style="background-image: url('/public/assets/images/rekening-terpisah.jpg');background-size: 100% !important;background-repeat: no-repeat !important;background-position: center !important;margin-bottom: 0px !important;margin-top: 70px;">
                @endif            
                <div class="gr-back"></div>
            </div>
            <div class="container box-about">
                <div class="row box-exchange">
 
                    <div class="col-md-12 box-desc-about">
                        <h3 align="center">@if(Config::get('app.locale') == 'id') Dana Terpisah Klien @elseif(Config::get('app.locale') == 'cn') 客户自备资金 @else Client Separate Funds @endif</h3>
                        <div class="line-centered-circolar"></div>
                        <p>
                        @if(Config::get('app.locale') == 'id') Segregated Account atau rekening terpisah adalah rekening yang kegunaannya ditujukan hanya untuk keperluan transaksi nasabah dan menyelesaikan kewajiban yang muncul atas permintaan transaksi dari nasabah. Penggunaan rekening terpisah diatur dan diawasi oleh Badan Pengawas Perdagangan Berjangka Komoditi (BAPPEBTI). @elseif(Config::get('app.locale') == 'cn') 独立账户是仅用于满足客户交易需求并解决客户在交易请求时产生的义务的账户。 商品期货交易监管机构（BAPPEBTI）对单独帐户的使用进行监管。@else Separate Account is an account whose use is intended only for the needs of customer transactions and resolve obligations that arise at the request of a transaction from the customer. The use of separate accounts is regulated and monitored by the Commodity Futures Trading Regulatory Agency (BAPPEBTI). @endif
                        </p><p>
                        @if(Config::get('app.locale') == 'id') Dana nasabah di PT Rajawali Kapital sepenuhnya terpisah dengan rekening perusahaan sesuai dengan peraturan Bappebti (Badan Pengawas Perdagangan Berjangka Komoditi) dan diawasi / dikelola oleh Lembaga Kliring  (<a href="https://www.ich.co.id" target="_blank" style="color:#f18109;">Indonesia Clearing House</a>). @elseif(Config::get('app.locale') == 'cn') Eagle Capital Futures Ltd的客户资金根据Bappebti（商品期货交易管理机构）的规定与公司的帐户完全分开，并由票据交换所（<a href="https://www.ich.co.id" target="_blank" style="color:#f18109;">印度尼西亚票据交换所</a>）进行监督/管理。@else Customer funds at Eagle Capital Futures Ltd are fully separated from company accounts in accordance with Bappebti (Commodity Futures Trading Regulatory Agency) regulations and supervised / managed by the Clearing House (<a href = "https://www.ich.co.id" target = " _blank "style ="color:#f18109;"> Indonesia Clearing House </a>). @endif
                        </p>
                        <p>
                        @if(Config::get('app.locale') == 'id') Berikut ini adalah rekening terpisah resmi yang dimiliki oleh PT Rajawali Kapital Berjangka : @elseif(Config::get('app.locale') == 'cn') 以下是Eagle Capital Futures Ltd拥有的官方单独帐户 : @else The following are the official separate accounts owned by Eagle Capital Futures Ltd : @endif
<br>
Bank Mandiri (IDR)
<br>
Account Number : 130-0021-00333-3
<br>
Cab Asia Afrika
<br>
Swiftcode : BMRIIDJA
<br>
a.n PT Rajawali Kapital Berjangka
                        </p>
                    </div>

                </div>
 
            </div>

</div>
@endsection