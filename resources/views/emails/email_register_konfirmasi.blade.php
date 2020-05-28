@extends('layouts.email')
@section('content-email')
<tr>
		            <td class="bg_dark email-section" style="text-align:center;background:#fff !important;">
		            	<div class="heading-section heading-section-white">
		            		<span class="subheading" style="color:#0B0909 !important;">@if(Config::get('app.locale') == 'cn') 亲  @else Dear @endif
                    </span>
		              	<h2 style="color:#0B0909 !important;">{{$name}}</h2>
		            	</div>
		            </td>
		          </tr>
          <!-- end tr -->
          <tr>
		            <td class="bg_white email-section" style="padding:1em !important;">
		            	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
		            		<tr>
		            			<td valign="top" width="100%" style="padding-top: 0%;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                         
                          <tr>
		            <td class="bg_white email-section" style="padding:1em !important;">
		            	<div class="heading-section" style="text-align: center; padding: 0 30px;">
                            <span class="subheading" style="color:#0B0909 !important;">@if(Config::get('app.locale') == 'id') Konfirmasi Pendaftaran Akun @elseif(Config::get('app.locale') == 'cn') 帐户注册确认 @else Account Registration Confirmation @endif</span>
                            <p style="color:#0B0909 !important;">
 @if($type == "demo")
 @if(Config::get('app.locale') == 'id') Terimakasih, Anda telah melakukan pendaftaran Akun Demo di <a href="https://rajawalikapital.co.id/" target="_blank">www.rajawalikapital.co.id</a>                      
 Untuk mendapatkan DEMO AKUN GOFX META TRADER dan PASSWORD META TRADER serta AKUN
CLIENT AREA, Klik “Link Konfirmasi” dibawah ini dan cek kembali email Anda : 
@elseif(Config::get('app.locale') == 'cn') 谢谢您，您已经在<a href="https://rajawalikapital.co.id/" target="_blank"> www.rajawalikapital.co.id </a>上注册了模拟帐户以获得演示帐户GOFX META TRADER和密码META TRADER和客户端区域帐户，单击下面的“确认链接”，然后再次检查您的电子邮件： 
@else Thank you, you have registered for a Demo Account at <a href="https://rajawalikapital.co.id/" target="_blank"> www.rajawalikapital.co.id </a> To get the DEMO ACCOUNT GOFX META TRADER and PASSWORD META TRADER and CLIENT AREA ACCOUNT, Click "Confirmation Link" below and check your email again: @endif

@else
@if(Config::get('app.locale') == 'id')  
Terimakasih, Anda telah melakukan pendaftaran Akun Real di <a href="https://rajawalikapital.co.id/" target="_blank">www.rajawalikapital.co.id</a> 
Untuk mendapatkan user REAL AKUN GOFX serta AKUN CLIENT AREA, Klik “Link Konfirmasi” dibawah ini

dan cek kembali email Anda:
@elseif(Config::get('app.locale') == 'cn')  
感谢您在<a href="https://rajawalikapital.co.id/" target="_blank"> www.rajawalikapital.co.id </a>上注册真实帐户。
要获得REAL GOFX ACCOUNT用户和CLIENT AREA帐户，请单击下面的“确认链接”

然后再次检查您的电子邮件：
@else 
Thank you for registering for a Real Account at <a href="https://rajawalikapital.co.id/" target="_blank"> www.rajawalikapital.co.id </a>
To get REAL GOFX ACCOUNT users and CLIENT AREA ACCOUNTS, click the "Confirmation Link" below

and check your email again:
@endif

@endif                           
</p>
                            <h2 style="color:#f18109 !important;"><a href="{{$url}}">@if(Config::get('app.locale') == 'id') Link Konfirmasi @elseif(Config::get('app.locale') == 'cn') 确认链接 @else Confirmation Link @endif</a> </h2>
                            <!--<h2 style="color:#2e3192 !important;"><a href="">MT5 Platform Link</a> </h2> -->
                        </div>
		            	 
		            </td>
		          </tr><!-- end: tr --> 
                          <tr>
		            <td class="bg_white email-section" style="padding:1em !important;">
		            	<div class="heading-section" style="text-align: center; padding: 0 30px;">
                             <p style="color:#0B0909 !important;">
                              @if(Config::get('app.locale') == 'id') Untuk informasi lebih lanjut mengenai produk dan layanan kami Anda dapat mengunjungi <a href="http://rajawalikapital.co.id/" target="_blank">www.rajawalikapital.co.id</a> atau di nomor telepon
                              (+6222) 0585060 ataupun melalui email layanan Customer Support di <a href="mailto:info@rajawalikapital.co.id?Subject=Hello%20">info@rajawalikapital.co.id</a> @elseif(Config::get('app.locale') == 'cn') 有关我们产品和服务的更多信息，您可以访问<a href="http://rajawalikapital.co.id/" target="_blank"> www.rajawalikapital.co.id </a>或通过电话（ +6222）0585060或通过客户支持服务电子邮件，地址为<a href="mailto:info@rajawalikapital.co.id?Subject=Hello%20"> info@rajawalikapital.co.id </a> @else For more information about our products and services you can visit <a href="http://rajawalikapital.co.id/" target="_blank"> www.rajawalikapital.co.id </a> or at the telephone number ( +6222) 0585060 or via Customer Support service email at <a href="mailto:info@rajawalikapital.co.id?Subject=Hello%20"> info@rajawalikapital.co.id </a> @endif
                            </p>
                            <br>
                            <h4 style="color:#f18109 !important;text-align:left !important;">@if(Config::get('app.locale') == 'id') Terima kasih @elseif(Config::get('app.locale') == 'cn') 谢谢 @else Thank you @endif</h4>
                            <h4 style="color:#2e3192 !important;text-align:left !important;">@if(Config::get('app.locale') == 'id') Rajawali Kapital Berjangka @else Eagle Capital Futures Ltd @endif</h4>
                            
                        </div>
		            	 
		            </td>
		          </tr><!-- end: tr --> 
                        </table>
                      </td>
                      
                      
                    </tr>
		            	</table>
		            </td>
                  </tr>
                  <!-- end: tr -->



@endsection