@extends('layouts.website')
@section('content-website')
 
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="about" style="padding-top:40px !important;">
            <div class="container box-about">
                <div class="row box-exchange">
 
                    <div class="col-md-12 box-desc-about">
                    <h3 class="title" style="text-align:center !important;"><span>Partnership</span></h3>
                    <div class="line-centered-circolar"></div>
                        <p>
                        <b>Kunci untuk kemitraan IB adalah terhubung dengan real broker yang luar biasa seperti kami</b>
                        </p>
                        <p>
                        Sebagai salah satu real broker tepercaya di Indonesia, Rajawali Kapital memberikan peluang pertnership bagi seluruh nasabah dan  anda yang ingin mendapatkan penghasilan tambahan dari networking anda yang anda ajak untuk bertransaksi melalui kami. 
                        </p>
                        <p>
                        Anda dan seluruh nasabah Rajawali Kapital berkesempatan menjadi partner kami dengan menjadi Introduction Broker (IB)
                        
                        </p>
                        <p>Jangan lewatkan kesempatan ini untuk ikut serta dalam Program Kemitraan dengan kami. Anda dapat memperoleh penghasilan tambahan tanpa batas. Kami memberikan program kemitraan terbaik serta berbagai benefit eksklusif khusus untuk Anda</p>
                        <p style="text-align:center !important;">
                        BENEFIT ANDA MENJADI INTRODUCTION BROKER (IB)
                        <br>
                        
                        <ol>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">Real IB yang transaksinya langsung di dalam bursa</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">Skema komisi yang menarik</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">Penghasilan sepanjang masa ( Selama Masa Transaksi Nasabah )</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">Dukungan penuh  dari team kami sertai administrasi yang transparan</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">Dan masih banyak lagi</li>
                        </ol>
                        </p>
                        
                    <h3 class="title" style="text-align:center !important;"><span>Daftar Sekarang</span></h3>
<div id="login" class="register-form d-flex flex-row justify-content-center align-items-center" style="padding: 0 !important;"> 
<div class="box-info-reg col-12 col-lg-6 align-self-center">
                    <form name="partnership" action="/partnership" method="POST">
                {{ csrf_field() }}

                    <div class="login-main-form">

                         <input id="name" class="input-stl" name="name" placeholder="Nama Lengkap" type="text" required="">
                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <p class="error" style="color:#FFBABA;"><strong> {{ $errors->first('name') }} </strong></p>
                                        </span>
                        @endif
                        <input id="phoneNumber" class="input-stl"  onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" minlength="5" maxlength="15" autocomplete="off" name="phoneNumber" placeholder="Telepon" type="text" required="">
                        @if ($errors->has('phoneNumber'))
                                        <span class="help-block">
                                            <p class="error" style="color:#FFBABA;"><strong> {{ $errors->first('phoneNumber') }} </strong></p>
                                        </span>
                        @endif
                        <input id="email" class="input-stl" name="email" placeholder="Email" type="email" required="">
                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <p class="error" style="color:#FFBABA;"><strong> {{ $errors->first('email') }} </strong></p>
                                        </span>
                        @endif
 
                        <div class="login-more row">
                            <div id="login-remember-me">
							
                                <div class="form-group col-lg-12">
                                    <div class="g-recaptcha" data-sitekey="6LcINMUUAAAAAHXcr3nmpIdfh6hTVeffsmkiblSy"></div>
                                </div>
							</div>
                            <div class="login-more-forgot register-policy">
                                <input type="checkbox" class="e-cb-input policy" id="terms_and_conditions" value="1" name="terms_and_conditions" required="">
                                <label class="policy-terms" id="policyLabel" for="terms_and_conditions">
                                Saya telah membaca dan setuju <a href="/kebijakan-privasi" style="color:#eab016;" target="_blank">kebijakan privasi</a>
                                </label>
                            </div>
                        </div>
                        <div class="login-btn-wrapp">
                            <button automation-id="login-sts-btn-sign-in" class="">Daftar</button>
                        </div>
                    </div>
                </form>
</div>
</div>

                    </div>

                </div> 
 
 
            </div>
</div>
@endsection