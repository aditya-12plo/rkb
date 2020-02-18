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
                        <h3 align="center">Dana Terpisah Klien</h3>
                        <div class="line-centered-circolar"></div>
                        <p>
                        Segregated Account atau rekening terpisah adalah rekening yang kegunaannya ditujukan hanya untuk keperluan transaksi nasabah dan menyelesaikan kewajiban yang muncul atas permintaan transaksi dari nasabah. Penggunaan rekening terpisah diatur dan diawasi oleh Badan Pengawas Perdagangan Berjangka Komoditi (BAPPEBTI).
                        </p><p>
Dana nasabah di PT Rajawali Kapital sepenuhnya terpisah dengan rekening perusahaan sesuai dengan peraturan Bappebti (Badan Pengawas Perdagangan Berjangka Komoditi) dan diawasi / dikelola oleh Lembaga Kliring  (<a href="https://www.ich.co.id" target="_blank" style="color:#f18109;">Indonesia Clearing House</a>).
                        </p>
                        <p>
                        Berikut ini adalah rekening terpisah resmi yang dimiliki oleh PT Rajawali Kapital Berjangka :
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