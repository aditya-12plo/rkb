@extends('layouts.email')
@section('content-email')
<tr>
		            <td class="bg_dark email-section" style="text-align:center;background:#fff !important;">
		            	<div class="heading-section heading-section-white">
		            		<span class="subheading" style="color:#0B0909 !important;">Dear</span>
		              	<h2 style="color:#0B0909 !important;">{{$data->name}}</h2>
		            	</div>
		            </td>
		          </tr>
          <!-- end tr --> 
          <tr>
		            <td class="bg_white email-section" style="padding:1em !important;">
		            	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td><p style="color:#0B0909 !important;"><b>Registrasi Pembukaan Akun Real Berhasil</b></p> </td>
                    </tr>
                    <tr>
                        <td><p style="color:#0B0909 !important;text-align:justify;">Calon nasabah akan di wawancara oleh Wakil Pialang kami sebagai proses verifikasi data . Dan Akun Real akan aktif setelah calon nasabah menyetorkan dana ke Rekening Terpisah (Segregated Account) PT Rajawali Kapital Berjangka.</p> </td>
                    </tr>
                    <tr>
                        <td><p style="color:#0B0909 !important;text-align:justify;">Pengiriman dana deposit dapat dilakukan ke rekening terpisah kami (Segregated Account) sebagai berikut :</p> </td>
                    </tr>
                    <tr>
                        <td>
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td colspan="4" style="text-align: center;"><p style="color:#0B0909 !important;">PT RAJAWALI KAPITAL BERJANGKA</p></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><p style="color:#0B0909 !important;">Bank</p></td>
                                <td style="text-align: center;"><p style="color:#0B0909 !important;">Cabang</p></td>
                                <td style="text-align: center;" colspan="2"><p style="color:#0B0909 !important;">No. Rekening</p></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"><p style="color:#0B0909 !important;">USD</p></td>
                                <td style="text-align: center;"><p style="color:#0B0909 !important;">Rupiah</p></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><p style="color:#0B0909 !important;">MANDIRI</p></td>
                                <td style="text-align: center;"><p style="color:#0B0909 !important;">Asia Afrika Bandung</p></td>
                                <td style="text-align: center;"><p style="color:#0B0909 !important;">130-0021-00333-3</p></td>
                                <td style="text-align: center;"><p style="color:#0B0909 !important;">-</p></td>
                            </tr>
                        </table>
                        <p style="color:#0B0909 !important;"><i>*Pengiriman dana harus melalui transfer dari  rekening nasabah / pemilik Account</i></p>
                        </td>
                    </tr>
                    <tr>
                        <td><p style="color:#0B0909 !important;text-align:justify;">Jika calon nasabah sudah menyetorkan dana atau transfer ke Rekening Segregated Account PT. Rajawali Kapital Berjangka, harap bukti transfer di upload melalui Client Area.</p> </td>
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