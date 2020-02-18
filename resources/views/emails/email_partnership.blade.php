@extends('layouts.email')
@section('content-email')
<tr>
		            <td class="bg_dark email-section" style="text-align:center;background:#fff !important;">
		            	<div class="heading-section heading-section-white">
		            		<span class="subheading" style="color:#0B0909 !important;">Dear</span>
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
                            <span class="subheading" style="color:#0B0909 !important;">ANDA TELAH MENDAFTAR SEBAGAI IB DI PT RAJAWALI KAPITAL BERJANGKA</span>
                             
                        </div>
		            	 
		            </td>
		          </tr><!-- end: tr --> 
                          <tr>
		            <td class="bg_white email-section" style="padding:1em !important;">
		            	<div class="heading-section" style="text-align: center; padding: 0 30px;">
							 <p style="color:#0B0909 !important;">
							 Tim kami benar-benar senang dengan adanya anda di sini, dan kami tidak sabar untuk menyambut anda di <a href="http://rajawalikapital.co.id/" target="_blank">PT Rajawali Kapital</a> sebagai partner IB. 
							<br>
							Untuk bisa segera bergabung dengan kami, anda diharuskan melakukan registrasi terlebih dahulu dengan menyiapkan data pribadi dan mengisi dokumen yang telah kami kirimkan (Terlampir)
							</p>
                             
                        </div>	 
		            </td>
		          </tr><!-- end: tr --> 
                          <tr>
		            <td class="bg_white email-section" style="padding:1em !important;">
		            	<div class="heading-section" style="text-align: center; padding: 0 30px;">
                             <p style="color:#0B0909 !important;">Untuk informasi lebih lanjut mengenai produk dan layanan kami Anda dapat mengunjungi <a href="http://rajawalikapital.co.id/" target="_blank">www.rajawalikapital.co.id</a> atau di nomor telepon
                                (+6222) 0585060 ataupun melalui email layanan Customer Support di <a href="mailto:info@rajawalikapital.co.id?Subject=Hello%20">info@rajawalikapital.co.id</a></p>
                            <br>
                            <h4 style="color:#f18109 !important;text-align:left !important;">Terima kasih</h4>
                            <h4 style="color:#2e3192 !important;text-align:left !important;">Rajawali Kapital Berjangka  </h4>
                            
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