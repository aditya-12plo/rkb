@extends('layouts.website')
@section('content-website')

 <script src='https://www.google.com/recaptcha/api.js'></script>
<div id="login" class="register-form d-flex flex-row justify-content-center align-items-center">
            <div class="box-info-reg col-12 col-lg-6 align-self-center">
                <div class="sign-up-info mobile-off">
                    <div class="sign-info-page">
                       <h3>@if(Config::get('app.locale') == 'id') Transaksi Gold, Oil, & Forex yang transaksinya real ada di bursa, ya cuma di <font style="color:#f18109 !important;">GOFX</font> @elseif(Config::get('app.locale') == 'cn') 仅在<font style="color:#f18109 !important;">GOFX</font>上具有真实交易的黄金，石油和外汇交易 @else Gold, Oil & Forex transactions that have real transactions on the exchange, only on <font style="color:#f18109 !important;">GOFX</font> @endif</h3>

                        <ul class="seperator">
                            <li>
                                <img src="/public/assets/images/news.png" alt="" />
                                <p>@if(Config::get('app.locale') == 'id') Kami disahkan oleh regulator di Indonesia. @elseif(Config::get('app.locale') == 'cn') 我们已获得印度尼西亚监管机构的授权。 @else We are authorized by regulators in Indonesia. @endif</p>
                            </li>
                            <li>
                                <img src="/public/assets/images/user.png" alt="" />
                                <p>@if(Config::get('app.locale') == 'id') Kami menghargai dan menghormati privasi Anda. @elseif(Config::get('app.locale') == 'cn') 我们尊重并尊重您的隐私。 @else We respect and respect your privacy. @endif</p>
                            </li>
                            <li>
                                <img src="/public/assets/images/privacy.png" alt="" />
                                <p>@if(Config::get('app.locale') == 'id') Dana Anda disimpan dengan aman di lembaga kliring. @elseif(Config::get('app.locale') == 'cn') 您的资金安全地存放在交换所中。 @else Your funds are deposited safely at the clearing house. @endif</p>
                            </li>
                        </ul>

                    </div>

                    <div class="risk-disclaimer seperator">
                    <div class="component-1">
                                <div class="title-right-component">
                                    <h3>@if(Config::get('app.locale') == 'id') Butuh Bantuan ? @elseif(Config::get('app.locale') == 'cn') 需要帮忙 ？ @else Need Help ? @endif</h3>
                                </div>
                                <div class="body-right-component">
                                    <p>@if(Config::get('app.locale') == 'id') Telepon @elseif(Config::get('app.locale') == 'cn') 电话 @else Phone @endif :  +6222 2058 5060</p>
                                    <p>@if(Config::get('app.locale') == 'cn') 传真: +62 222 0582 219 @else Fax : +62 222 0582 219 @endif</p>
                                    <p>@if(Config::get('app.locale') == 'cn') 电子邮件 @else Email @endif : INFO@RAJAWALIKAPITAL.CO.ID</p>
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

                <div class="title-form"><h3 class="reg-title">@if(Config::get('app.locale') == 'id') Daftar Akun Demo @elseif(Config::get('app.locale') == 'cn') 注册模拟账户 @else Register a Demo Account @endif</h3></div>

                <form name="daftar-akun-demo" action="/daftar-akun-demo" method="POST">
                {{ csrf_field() }}

                    <div class="login-main-form">

                         <input id="name" class="input-stl" name="name" placeholder="@if(Config::get('app.locale') == 'id') Nama Lengkap @elseif(Config::get('app.locale') == 'cn') 全名 @else Full name @endif" type="text" required="">
                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <p class="error" style="color:#FFBABA;"><strong> {{ $errors->first('name') }} </strong></p>
                                        </span>
                        @endif
                        <input id="phoneNumber" class="input-stl"  onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" minlength="5" maxlength="15" autocomplete="off" name="phoneNumber" placeholder="@if(Config::get('app.locale') == 'id') Telepon @elseif(Config::get('app.locale') == 'cn') 电话号码 @else Phone Number @endif" type="text" required="">
                        @if ($errors->has('phoneNumber'))
                                        <span class="help-block">
                                            <p class="error" style="color:#FFBABA;"><strong> {{ $errors->first('phoneNumber') }} </strong></p>
                                        </span>
                        @endif
                        <input id="email" class="input-stl" name="email" placeholder="@if(Config::get('app.locale') == 'cn') 电子邮件 @else Email @endif" type="email" required="">
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
                                        @if(Config::get('app.locale') == 'id') Saya setuju untuk menerima berita dan email promosi dari Rajawali Kapital Berjangka @elseif(Config::get('app.locale') == 'cn') 我同意从Eagle Capital Futures Ltd接收新闻和促销电子邮件 @else I agree to receive news and promotional emails from Eagle Capital Futures Ltd @endif
                                </label>
                            </div>
                            <div class="login-more-forgot register-policy">
                                <input type="checkbox" class="e-cb-input policy" id="terms_and_conditions" value="1" name="terms_and_conditions" required="">
                                <label class="policy-terms" id="policyLabel" for="terms_and_conditions">
                                    @if(Config::get('app.locale') == 'id') Saya telah membaca dan setuju <a href="{{url('/'. Config::get('app.locale').'/kebijakan-privasi')}}" style="color:#eab016;" target="_blank">kebijakan privasi</a> 
                                    {{-- text turun --}}
                                    {{-- @elseif(Config::get('app.locale') == 'cn') 我已阅读并同意 <a href="/privacy-policy" style="color:#eab016;" target="_blank">隐私政策</a> --}}
                                    @else I have read and agree <a href="{{url('/'. Config::get('app.locale').'/privacy-policy')}}" style="color:#eab016;" target="_blank">Privacy policy</a> 
                                    @endif
                                
                                </label>
                            </div>
                        </div>
                        <div class="login-btn-wrapp">
                            <button automation-id="login-sts-btn-sign-in" class="">@if(Config::get('app.locale') == 'id') Daftar @elseif(Config::get('app.locale') == 'cn') 寄存器 @else Register @endif</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection