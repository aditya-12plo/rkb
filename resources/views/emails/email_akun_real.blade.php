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
  <p style="color:#0B0909 !important;text-align:left;padding-left:2%;padding-right:2%;"> Terima kasih telah membuka Akun Real di <b>PT Rajawali Kapital Berjangka</b>. Untuk bisa segera bertransaksi, anda
diharuskan melakukan registrasi terlebih dahulu melalui CLIENT AREA.</p> 

<p style="color:#0B0909 !important;text-align:left;padding-left:2%;padding-right:2%;"> 
Berikut adalah email username dan password client area Anda :
</p>
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

<p style="color:#0B0909 !important;text-align:left;padding-left:2%;padding-right:2%;"> 
Berikut username dan Password AKUN DEMO GOFX Meta Trader 5 anda :
</p>
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

<p style="color:#0B0909 !important;text-align:left;padding-left:2%;padding-right:2%;"> 
Harap menyiapkan data-data pribadi sebagai berikut untuk di upload pada saat registrasi :
</p>
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
      <tr>
         <td class="bg_white email-section" style="width:33%;padding-bottom: 0px;">
         <p style="color:#0B0909 !important;text-align:center;padding-left:2%;padding-right:2%;">
         <img src="{{url('/public/assets/images/foto-terbaru.jpg')}}">
         </p>
        </td>
         <td class="bg_white email-section" style="width:34%;padding-bottom: 0px;">
         <p style="color:#0B0909 !important;text-align:center;padding-left:2%;padding-right:2%;">
         <img src="{{url('/public/assets/images/kartu-identitas.jpg')}}">
         </p>
        </td>
         <td class="bg_white email-section" style="width:33%;padding-bottom: 0px;">
         <p style="color:#0B0909 !important;text-align:center;padding-left:2%;padding-right:2%;">
         <img src="{{url('/public/assets/images/dokumen-pendukung.jpg')}}">
         </p></td>
      </tr>
      <tr>
        <td class="bg_white email-section" colspan="3" style="padding-top: 0px;">
        <p style="color:#0B0909 !important;text-align:center;padding-left:2%;padding-right:2%;">(ketentuan upload: dokumen hasil foto/scan max 500kb dalam bentuk (JPG/GIF/PNG)</p>
      </td>
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