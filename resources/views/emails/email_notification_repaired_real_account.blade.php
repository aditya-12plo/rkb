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
		            <td class="bg_white email-section" style="padding:1em !important;">
		            	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td><p style="color:#0B0909 !important;"><b>Registrasi Pembukaan Akun Real Perlu Perbaikan</b></p> </td>
                    </tr>
                    <tr>
                        <td><p style="color:#0B0909 !important;text-align:justify;">Calon nasabah harap perbaiki data yang anda masukan dari intruksi sebagai berikut : <br> 
                        <br>
                        <b> <?php echo $message;?> </b>
                    </p> </td>
                    </tr>
                    <tr>
                        <td>
                              </td>
                    </tr>
                    <tr>
                        <td><p style="color:#0B0909 !important;text-align:justify;">Bila ada pertanyaan lebih lanjut, anda dapat : <br>
                        <ul>
                            <li style="color:#0B0909 !important;text-align:justify;">Hubungi Wakil Pialang Anda</li>
                            <li style="color:#0B0909 !important;text-align:justify;">Mengirim email ke info@rajawalikapital.co.id </li>
                            <li style="color:#0B0909 !important;text-align:justify;">Telp ke (022) 20585 060</li>
                        </ul>
                    </p> </td>
                    </tr>

		            		<tr>
		            			<td valign="top" width="100%" style="padding-top: 0%;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                         
                          <tr>
		            <td class="bg_white email-section" style="padding:1em !important;">
		            	<div class="heading-section" style="text-align: center; padding: 0 30px;">
                         
		              </div>
		            	
		            </td>
		          </tr><!-- end: tr --> 
                        </table>
                      </td>
                      
                      
                    </tr> 
                    <tr>
                        <td>
                        
                        </td>
                    </tr>
		            	</table>
		            </td>
                  </tr>
                  <!-- end: tr -->



@endsection