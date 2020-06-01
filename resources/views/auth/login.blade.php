@extends('layouts.website')
@section('content-website')

 <script src='https://www.google.com/recaptcha/api.js'></script>
<div id="login" class="register-form d-flex flex-row justify-content-center align-items-center">
            <div class="box-info-reg col-12 col-lg-6 align-self-center">
                <div class="sign-up-info mobile-off">
                    <div class="sign-info-page">
                       <h3>@if(Config::get('app.locale') == 'id') Transaksi Gold, Oil, & Forex yang transaksinya real ada di bursa, ya cuma di <font style="color:#f18109 !important;">GOFX</font> @elseif(Config::get('app.locale') == 'cn') 仅在<font style="color:#f18109 !important;">GOFX</font>上可以在交易所进行真实交易的黄金，石油和外汇交易 @else Gold, Oil, & Forex transactions that have real transactions on the exchange, only in <font style="color:#f18109 !important;">GOFX</font> @endif</h3>

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
                                <p> @if(Config::get('app.locale') == 'id') Dana Anda disimpan dengan aman di lembaga kliring. @elseif(Config::get('app.locale') == 'cn') 您的资金安全地存放在交换所中。 @else Your funds are deposited safely at the clearing house. @endif</p>
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

                <div class="title-form"><h3 class="reg-title">@if(Config::get('app.locale') == 'cn') 登录客户区 @else Login Client Area @endif</h3></div>

                <form name="login" action="{{ route('login.request') }}" method="POST">
                {{ csrf_field() }}

                    <div class="login-main-form">

                            <input id="email" class="input-stl" autocomplete="off" name="email" placeholder="@if(Config::get('app.locale') == 'cn') 电子邮件 @else Email @endif" type="text" required="">
                            @error('email')
                                <span class="help-block">
                                    <p class="error" style="color:#FFBABA;"><strong> {{ $message }} </strong></p>
                                </span>
                            @enderror

                            <input id="password" class="input-stl" autocomplete="off" name="password" placeholder="@if(Config::get('app.locale') == 'cn') 密码 @else Password @endif" type="password" required="">
                                @error('password')
                                <span class="help-block">
                                    <p class="error" style="color:#FFBABA;"><strong> {{ $message }} </strong></p>
                                </span>
                                @enderror
 
                        <div class="login-btn-wrapp">
                            <button automation-id="login-sts-btn-sign-in" class="">@if(Config::get('app.locale') == 'id')Masuk @elseif(Config::get('app.locale') == 'cn') 登录 @else Login @endif</button>
                        </div>
                        <div class="login-more row">
                              <div id="login-remember-me">
                                    <a href="/clients-area/password/reset">@if(Config::get('app.locale') == 'id') Lupa Password ?  @elseif(Config::get('app.locale') == 'cn') 忘记密码了？ @else Forgot password ? @endif</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection