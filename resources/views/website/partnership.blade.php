@extends('layouts.website')
@section('content-website')
 
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="about" style="padding-top:40px !important;">
            <div class="container box-about">
                <div class="row box-exchange">
 
                    <div class="col-md-12 box-desc-about">
                    <h3 class="title" style="text-align:center !important;"><span>@if(Config::get('app.locale') == 'cn') 合伙 @else Partnership @endif  </span></h3>
                    <div class="line-centered-circolar"></div>
                        <p>
                        <b>@if(Config::get('app.locale') == 'id') Kunci untuk kemitraan IB adalah terhubung dengan real broker yang luar biasa seperti kami @elseif(Config::get('app.locale') == 'cn') IB合作的关键是与像我们这样的杰出真实经纪人建立联系 @else The key to an IB partnership is to connect with exceptional real brokers like us @endif </b>
                        </p>
                        <p>
                        @if(Config::get('app.locale') == 'id') Sebagai salah satu real broker tepercaya di Indonesia, Rajawali Kapital memberikan peluang pertnership bagi seluruh nasabah dan  anda yang ingin mendapatkan penghasilan tambahan dari networking anda yang anda ajak untuk bertransaksi melalui kami.  @elseif(Config::get('app.locale') == 'cn') 作为印度尼西亚值得信赖的真实经纪人之一，Eagle Capital @else As one of the trusted real brokers in Indonesia, Eagle Capital provides a partnership opportunity for all customers and those of you who want to earn extra income from your networking that you invite to transact through us. @endif 
                        </p>
                        <p>
                        @if(Config::get('app.locale') == 'id') Anda dan seluruh nasabah Rajawali Kapital berkesempatan menjadi partner kami dengan menjadi Introduction Broker (IB) @elseif(Config::get('app.locale') == 'cn') 您和所有Eagle Capital客户都有机会通过成为介绍经纪人（IB）成为我们的合作伙伴 @else You and all Eagle Capital customers have the opportunity to become our partners by becoming an Introduction Broker (IB) @endif  
                        </p>
                        <p>
                            @if(Config::get('app.locale') == 'id') Jangan lewatkan kesempatan ini untuk ikut serta dalam Program Kemitraan dengan kami. Anda dapat memperoleh penghasilan tambahan tanpa batas. Kami memberikan program kemitraan terbaik serta berbagai benefit eksklusif khusus untuk Anda @elseif(Config::get('app.locale') == 'cn') 不要错过这次与我们一起参加合作伙伴计划的机会。 您可以无限制地赚取额外收入。 我们为您提供最佳的合作伙伴计划和各种独家优惠 @else Don't miss this opportunity to participate in the Partnership Program with us. You can earn extra income without limits. We provide the best partnership programs and various exclusive benefits specifically for you @endif </p>
                        <p style="text-align:center !important;">
                            @if(Config::get('app.locale') == 'id') BENEFIT ANDA MENJADI INTRODUCTION BROKER (IB) @elseif(Config::get('app.locale') == 'cn') 您的利益成为介绍经纪人（IB） @else YOUR BENEFITS BECOME INTRODUCTION BROKERS (IB) @endif 
                        <br>
                        
                        <ol>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Real IB yang transaksinya langsung di dalam bursa @elseif(Config::get('app.locale') == 'cn') 交易直接在交易所上的真实IB @else Real IB whose transactions are directly on the exchange @endif </li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Skema komisi yang menarik @elseif(Config::get('app.locale') == 'cn') 有趣的佣金计划 @else Interesting commission scheme @endif</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Penghasilan sepanjang masa ( Selama Masa Transaksi Nasabah ) @elseif(Config::get('app.locale') == 'cn') 终生收入（在客户交易期间） @else Lifetime income (During Customer Transaction Period) @endif </li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Dukungan penuh  dari team kami sertai administrasi yang transparan @elseif(Config::get('app.locale') == 'cn') 我们团队的全力支持和透明的管理 @else Full support from our team and transparent administration @endif </li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Dan masih banyak lagi @elseif(Config::get('app.locale') == 'cn') 以及更多 @else And much more @endif </li>
                        </ol>
                        </p>
                        
                    <h3 class="title" style="text-align:center !important;"><span>@if(Config::get('app.locale') == 'id') Daftar Sekarang @elseif(Config::get('app.locale') == 'cn') 立即注册 @else Sign up now @endif</span></h3>
<div id="login" class="register-form d-flex flex-row justify-content-center align-items-center" style="padding: 0 !important;"> 
<div class="box-info-reg col-12 col-lg-6 align-self-center">
                    <form name="partnership" action="/{{Config::get('app.locale')}}/partnership" method="POST">
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

                    </div>

                </div> 
 
 
            </div>
</div>
@endsection