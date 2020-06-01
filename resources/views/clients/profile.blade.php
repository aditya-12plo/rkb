<style>

</style>
@extends('layouts.client')

@section('content-client')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft" style="text-align:center; font-size:3em; ">@if(Config::get('app.locale') == 'id') Data Profil @elseif(Config::get('app.locale') == 'cn') 个人资料数据 @else Profile Data @endif</h3>
            </div>
        </div>
    </div>

     <div class="col-md-12 padding-5">
         <div class="col-md-6">
             <div class="panel box-v1">
                 <div class="panel-heading bg-white border-none">
                     <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                         <h4><span class="icon-user icons icon text-right"></span></h4>
                        </div>
                    </div> 
                    <div class="panel-body text-center">
                        <h1 style="color: rgb(241, 129, 9) !important;"><a href="/{{Config::get('app.locale')}}/clients-area/profile/detail-contact" class="">@if(Config::get('app.locale') == 'id') Detail Kontak @elseif(Config::get('app.locale') == 'cn') 联系方式 @else Contact Details @endif</a></h1> 
                        <p>@if(Config::get('app.locale') == 'id') Halaman ini untuk merubah detail Kontak anda.  @elseif(Config::get('app.locale') == 'cn') 该页面用于更改您的联系方式。 @else This page is to change your contact details. @endif</p> <hr>
                    </div>
                </div>
            </div> 
            <div class="col-md-6">
                <div class="panel box-v1">
                    <div class="panel-heading bg-white border-none">
                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                            <h4><span class="icon-user icons icon text-right"></span></h4>
                        </div>
                    </div> 
                    <div class="panel-body text-center">
                        <h1 style="color: rgb(241, 129, 9) !important;">
                            <a href="/{{Config::get('app.locale')}}/clients-area/profile/change-password" class="">@if(Config::get('app.locale') == 'id') Rubah Password @elseif(Config::get('app.locale') == 'cn') 更改密码 @else Change Password @endif</a></h1> 
                            <p>@if(Config::get('app.locale') == 'id') Halaman ini untuk merubah password masuk ke client area.  @elseif(Config::get('app.locale') == 'cn') 该页面用于更改进入客户区的密码。 @else This page is used to change the password for entering the client area. @endif</p> <hr>
                        </div>
                    </div>
                </div>
            </div>

@endsection