@extends('layouts.website')
@section('content-website')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeOh_Qw6A5V_xZ9LIrU3ipWoTL827SwUg&v=3.exp" type="text/javascript"></script>
 <script src='https://www.google.com/recaptcha/api.js'></script>

<div class="contact" style="padding-top:20px !important;">
<div class="contact-map">
                @if($isMobile)
                    <div class="contact-adress" style="width: 100% !important;">
                @else
                    <div class="contact-adress" style="width: 30% !important;">
                @endif
                    <p>
                    Ruko Kopo Plaza Blok B no 24
                    </p>
                    <p>jl. peta (lingkar selatan) <br>@if(Config::get('app.locale') == 'id') Kota Bandung @elseif(Config::get('app.locale') == 'cn') 万隆市 @else Bandung City @endif,<br>@if(Config::get('app.locale') == 'id') Jawa Barat @elseif(Config::get('app.locale') == 'cn') 西爪哇 @else West Java @endif</p>
                    <p><span>@if(Config::get('app.locale') == 'cn') 电话： @else Phone: @endif </span> +6222 2058 5060</p>
                    <p><span>@if(Config::get('app.locale') == 'cn') 电子邮件： @else Email: @endif  </span> info@rajawalikapital.co.id  </p>
 
                </div>
                <div class="google-maps">
                    <!--Google Maps-->
                    <div id="map_container">
                        <div id="map_canvas">

                        </div>
                    </div>
                </div>
            </div>

    <div class="container box-about">
        <div class="row box-exchange"> 
        <div class="container box-content-info">
                <div class="row contact-title" style="margin-right: 0% !important;margin-left: -0% !important;">
                    <div class="col-md-12 box-header-clients">
                        <h3 class="title">@if(Config::get('app.locale') == 'id')  Kirim Pesan @elseif(Config::get('app.locale') == 'cn') 发信息 @else Send Message @endif </h3>
                        <div class="line-centered-circolar"></div>
                    </div>
                </div>
                <div class="row" style="margin-right: 0%;margin-left: 0% !important;">
                    <div class="col-md-12">
                        <form role="form" method="POST" action="/{{Config::get('app.locale')}}/hubungi-kami">
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="input1">@if(Config::get('app.locale') == 'id') Nama * @elseif(Config::get('app.locale') == 'cn') 名称 * @else Name * @endif </label>
                                    <input type="text" name="contact_name" placeholder="e.g. Jhon Smith" class="form-control" id="name" required>
                                    @if ($errors->has('contact_name'))
                                        <span class="help-block">
                                            <p class="error" style="color:#FFBABA;"><strong> {{ $errors->first('contact_name') }} </strong></p>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="input1">@if(Config::get('app.locale') == 'id') Nama Perusahaan @elseif(Config::get('app.locale') == 'cn') 公司名 @else Company name @endif </label>
                                    <input type="text" name="contact_company" placeholder="e.g. Angu Studio" class="form-control" id="company">
                                    @if ($errors->has('contact_company'))
                                        <span class="help-block">
                                            <p class="error" style="color:#FFBABA;"><strong> {{ $errors->first('contact_company') }} </strong></p>
                                        </span>
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-lg-6">
                                    <label for="input2">@if(Config::get('app.locale') == 'cn') 电邮*  @else Email * @endif</label>
                                    <input type="email" name="contact_email" placeholder="e.g. mail@example.com" class="form-control" id="email" required>
                                    @if ($errors->has('contact_email'))
                                        <span class="help-block">
                                            <p class="error" style="color:#FFBABA;"><strong> {{ $errors->first('contact_email') }} </strong></p>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="input3">@if(Config::get('app.locale') == 'id') Telepon @elseif(Config::get('app.locale') == 'cn') 电话号码 @else Phone Number @endif  </label>
                                    <input type="text" name="contact_phone" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" minlength="5" maxlength="15" placeholder="622112323456" class="form-control" id="phone" required>
                                    @if ($errors->has('contact_phone'))
                                        <span class="help-block">
                                            <p class="error" style="color:#FFBABA;"><strong> {{ $errors->first('contact_phone') }} </strong></p>
                                        </span>
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-lg-12">
                                    <label for="input4">@if(Config::get('app.locale') == 'id') Pesan @elseif(Config::get('app.locale') == 'cn') 信息 @else Message @endif</label>
                                    <textarea name="contact_message" class="form-control" rows="6" cols="10" id="message" required></textarea>
                                    @if ($errors->has('contact_message'))
                                        <span class="help-block">
                                            <p class="error" style="color:#FFBABA;"><strong> {{ $errors->first('contact_message') }} </strong></p>
                                        </span>
                                    @endif
                                </div>							
                                <div class="clearfix"></div>
                                <div class="form-group col-lg-12">
                                    <div class="g-recaptcha" data-sitekey="6LcINMUUAAAAAHXcr3nmpIdfh6hTVeffsmkiblSy"></div>
                                </div>
                                <div class="form-group btn-send col-lg-12">
                                    <input type="hidden" name="save" value="contact">
                                    <button type="submit" class="btn btn-more bt-contact-submit">@if(Config::get('app.locale') == 'id') Kirim @elseif(Config::get('app.locale') == 'cn') 发送s @else Send @endif </button>
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