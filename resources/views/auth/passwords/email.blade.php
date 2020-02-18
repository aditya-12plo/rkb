@extends('layouts.website')
@section('content-website')


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

                <div class="title-form"><h3 class="reg-title">Lupa Password</h3></div>

                <form class="form-signin" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                    <div class="login-main-form">
 
                        <input id="email" class="input-stl" name="email" placeholder="Email" type="email" required="">
                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <p class="error" style="color:#FFBABA;"><strong> {{ $errors->first('email') }} </strong></p>
                                        </span>
                        @endif
  
                        <div class="login-btn-wrapp">
                            <button automation-id="login-sts-btn-sign-in" class="">Kirim</button>
                        </div>
                        <div class="login-more row">
                              <div id="login-remember-me">
                                    <a href="/clients-area/login">Login </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

 
@endsection
