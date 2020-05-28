@extends('layouts.email')
@section('content-email')
<tr>
		            <td class="bg_dark email-section" style="text-align:center;background:#fff !important;">
		            	<div class="heading-section heading-section-white">
		            		<span class="subheading" style="color:#0B0909 !important;">@if(Config::get('app.locale') == 'cn') 亲 @else Dear @endif</span>
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
                            <span class="subheading" style="color:#0B0909 !important;">@if(Config::get('app.locale') == 'id') ANDA TELAH MENDAFTAR SEBAGAI IB DI PT RAJAWALI KAPITAL BERJANGKA @elseif(Config::get('app.locale') == 'cn') 您已经在Eagle Capital Futures Ltd中注册为IB @else YOU HAVE REGISTERED AS IB IN EAGLE CAPITAL FUTURES Ltd @endif</span>
                             
                        </div>
		            	 
		            </td>
		          </tr><!-- end: tr --> 
                          <tr>
		            <td class="bg_white email-section" style="padding:1em !important;">
		            	<div class="heading-section" style="text-align: center; padding: 0 30px;">
							 <p style="color:#0B0909 !important;">
							@if(Config::get('app.locale') == 'id')  Tim kami benar-benar senang dengan adanya anda di sini, dan kami tidak sabar untuk menyambut anda di <a href="http://rajawalikapital.co.id/" target="_blank">PT Rajawali Kapital</a> sebagai partner IB. 
							<br>
							Untuk bisa segera bergabung dengan kami, anda diharuskan melakukan registrasi terlebih dahulu dengan menyiapkan data pribadi dan mengisi dokumen yang telah kami kirimkan (Terlampir) @elseif(Config::get('app.locale') == 'cn') 我们的团队非常高兴您能来这里，我们迫不及待想在<a href="http://rajawalikapital.co.id/" target="_blank"> Eagle Capital Futures Ltd</a>上欢迎您 IB合伙人。
							<br>
							为了能够立即加入我们，您需要先准备个人数据并填写我们发送的文件（随附）以进行注册。 @else Our team is really happy to have you here, and we can't wait to welcome you at <a href="http://rajawalikapital.co.id/" target="_blank"> Eagle Capital Futures Ltd </a> as IB partner.
							<br>
							To be able to immediately join us, you are required to register in advance by preparing personal data and filling out the documents we have sent (Attached) @endif
							
							</p>
                             
                        </div>	 
		            </td>
		          </tr><!-- end: tr --> 
                          <tr>
		            <td class="bg_white email-section" style="padding:1em !important;">
		            	<div class="heading-section" style="text-align: center; padding: 0 30px;">
							 <p style="color:#0B0909 !important;">
							@if(Config::get('app.locale') == 'id') 
							Untuk informasi lebih lanjut mengenai produk dan layanan kami Anda dapat mengunjungi <a href="http://rajawalikapital.co.id/" target="_blank">www.rajawalikapital.co.id</a> atau di nomor telepon
							(+6222) 0585060 ataupun melalui email layanan Customer Support di <a href="mailto:info@rajawalikapital.co.id?Subject=Hello%20">info@rajawalikapital.co.id</a>
							@elseif(Config::get('app.locale') == 'cn') 
							有关我们产品和服务的更多信息，请访问<a href="http://rajawalikapital.co.id/" target="_blank"> www.rajawalikapital.co.id </a>或致电（+6222）0585060或通过客户支持服务电子邮件地址<a href="mailto:info@rajawalikapital.co.id?Subject=Hello%20"> info@rajawalikapital.co.id </a>
							@else  
							For more information about our products and services you can visit <a href="http://rajawalikapital.co.id/" target="_blank"> www.rajawalikapital.co.id </a> or at the telephone number (+6222) 0585060 or via Customer Support service email at <a href="mailto:info@rajawalikapital.co.id?Subject=Hello%20"> info@rajawalikapital.co.id </a>
							@endif	
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