@extends('layouts.email')
@section('content-email')
<tr>
  <td class="bg_dark email-section" style="text-align:center;background:#fff !important;">
    <div class="heading-section heading-section-white">
    <span class="subheading" style="color:#0B0909 !important;">Dear</span>
    <h2 style="color:#0B0909 !important;">{{$user->name}}</h2>
    </div>
  </td>
</tr>
          <!-- end tr -->

<tr>
  <td valign="middle" class="hero bg_white">
    
    <p style="color:#0B0909 !important;text-align:left;padding-left:2%;padding-right:2%;">
           Terima kasih telah membuka Akun Demo GOFX di <a href="https://rajawalikapital.co.id/" target="_blank">www.rajawalikapital.co.id</a><div class="">
    </p>
  
    <p style="color:#0B0909 !important;text-align:left;padding-left:2%;padding-right:2%;">
    Berikut adalah email username dan password client area Anda :
    </p>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td valign="top" width="50%" style="padding-top:0px;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td class="text-services" style="width: 20%;">
                            <p style="color:#0B0909 !important;text-align:left;">
                            <b>Email</b>
                            </p>
                            </td>
                            <td class="text-services" style="width: 1%;">
                            <p style="color:#0B0909 !important;text-align:left;">
                            <b>:</b>
                            </p>
                            </td>
                            <td class="text-services">
                            <p style="color:#0B0909 !important;text-align:left;">
                            <b>{{$user->email}}</b>
                            </p>
                            </td>
                          </tr><tr>
                            <td class="text-services">
                            <p style="color:#0B0909 !important;text-align:left;">
                            <b>Password</b>
                            </p>
                            </td>
                            <td class="text-services">
                            <p style="color:#0B0909 !important;text-align:left;">
                            <b>:</b>
                            </p>
                            </td>
                            <td class="text-services">
                            <p style="color:#0B0909 !important;text-align:left;">
                            <b>{{$user->password_first}}</b>
                            </p>
                            </td>
                          </tr>
                        </table>
  </td>
</tr>
          <!-- end tr -->


          <tr>
  <td valign="middle" class="hero bg_white">
                    <tr>
                      <td valign="top" width="50%" style="padding-top:0px;">
                      <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                         
                         <tr>
               <td class="bg_white email-section" style="padding:1em !important;">
                 <div class="heading-section" style="text-align: center;">
                   <p style="color:#0B0909 !important;text-align:left;">Berikut username dan Password AKUN DEMO GOFX Meta Trader 5 anda :</p>
                 </div>
                 <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                   <tr>
                     <td valign="top" width="50%" style="padding-top:0px;">
                       <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                         <tr>
                           <td class="text-services" style="width: 20%;">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>Username</b>
                           </p>
                           </td>
                           <td class="text-services" style="width: 1%;">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>:</b>
                           </p>
                           </td>
                           <td class="text-services">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>{{$account->username}}</b>
                           </p>
                           </td>
                         </tr><tr>
                           <td class="text-services">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>Password</b>
                           </p>
                           </td>
                           <td class="text-services">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>:</b>
                           </p>
                           </td>
                           <td class="text-services">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>{{$account->password}}</b>
                           </p>
                           </td>
                         </tr>
                       </table>
  </td>
</tr>
          <!-- end tr -->


<tr>
  <td valign="middle" class="hero bg_white">
    
    <p style="color:#0B0909 !important;text-align:left;padding-left:2%;padding-right:2%;">
    Untuk mengunduh platform trading GOFX, silahkan klik gambar dibawah ini.
    </p>
  </td>
</tr>
          <!-- end tr -->


<tr>
  <td valign="middle" class="hero bg_white">
  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
      <tr>
         <td class="bg_white email-section" style="width:33%;">
         <p style="color:#0B0909 !important;text-align:center;padding-left:2%;padding-right:2%;">
         <a href="https://download.mql5.com/cdn/web/14021/mt5/icdx5setup.exe" target="_blank">
         <img src="{{url('/public/assets/images/GOFX-laptop.png')}}" width="100%">
         On Windows</a>
         </p>
        </td>
         <td class="bg_white email-section" style="width:34%;">
         <p style="color:#0B0909 !important;text-align:center;padding-left:2%;padding-right:2%;">
         <a href="https://play.google.com/store/apps/details?id=net.metaquotes.metatrader5" target="_blank">
         <img src="{{url('/public/assets/images/GOFX-MT5-on-Appstore.png')}}" width="100%" height="50%">
         On Apps Store
         </a>
         </p>
        </td>
         <td class="bg_white email-section" style="width:33%;">
         <p style="color:#0B0909 !important;text-align:center;padding-left:2%;padding-right:2%;">
         <a href="https://apps.apple.com/us/app/metatrader-5/id413251709" target="_blank">
         <img src="{{url('/public/assets/images/GOFX-on-Playstore.png')}}" width="100%" height="50%">
         On Playstore
         </a>
         </p></td>
      </tr>
      <tr>
        <td class="bg_white email-section" colspan="3">
        <p style="color:#0B0909 !important;text-align:center;padding-left:2%;padding-right:2%;">
        <a href="https://rajawalikapital.co.id/clients-area/login" target="_blank">
         <img src="{{url('/public/assets/images/Client Area 3.png')}}" width="100%">
         </a>
        </p>
        </td>
      </tr>
  </table>
  </td>
</tr>
          <!-- end tr -->
@endsection