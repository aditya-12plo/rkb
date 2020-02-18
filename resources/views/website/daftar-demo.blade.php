@extends('layouts.website')
@section('content-website')

 <script src='https://www.google.com/recaptcha/api.js'></script>
<div id="login" class="register-form d-flex flex-row justify-content-center align-items-center">
            <div class="box-info-reg col-12 col-lg-6 align-self-center">
                <div class="sign-up-info mobile-off">
                    <div class="sign-info-page">
                       <h3>Transaksi Gold, Oil, & Forex yang transaksinya real ada di bursa, ya cuma di <font style="color:#f18109 !important;">GOFX</font></h3>

                        <ul class="seperator">
                            <li>
                                <img src="/public/assets/images/news.png" alt="" />
                                <p>Kami disahkan oleh regulator di Indonesia.</p>
                            </li>
                            <li>
                                <img src="/public/assets/images/user.png" alt="" />
                                <p>Kami menghargai dan menghormati privasi Anda.</p>
                            </li>
                            <li>
                                <img src="/public/assets/images/privacy.png" alt="" />
                                <p> Dana Anda disimpan dengan aman di lembaga kliring.</p>
                            </li>
                        </ul>

                    </div>

                    <div class="risk-disclaimer seperator">
                    <div class="component-1">
                                <div class="title-right-component">
                                    <h3>Butuh Bantuan ?</h3>
                                </div>
                                <div class="body-right-component">
                                <p>Telepon : +62 222 0585 060</p>
                                <p>Fax : +62 222 0582 219</p>
                                <p>Email : INFO@RAJAWALIKAPITAL.CO.ID</p>
                                </div>
                            </div>
                    </div>
                   
                </div>
            </div>
            @if($isMobile)
            <div class="box-login registration col-12 col-lg-4 align-self-center" style="background:none !important;">
            @else
            <div class="box-login registration col-12 col-lg-4 align-self-center">
            @endif

                <div class="title-form"><h3 class="reg-title">Daftar Akun Demo</h3></div>

                <form name="daftar-akun-demo" action="/daftar-akun-demo" method="POST">
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
                              <div id="login-remember-me">
                                <input type="checkbox" class="e-cb-input terms" id="cb1" name="newslater_register" value="1">
                                <label class="terms-cond" id="termsLabel" for="cb1">
                                Saya setuju untuk menerima berita dan email promosi dari Rajawali Kapital Berjangka
                                </label>
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
@endsection