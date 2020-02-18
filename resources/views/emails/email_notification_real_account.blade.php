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
                        <td><p style="color:#0B0909 !important;"> <?php echo $title;?>. Klik tombol dibawah ini untuk melihat detail data anda :</p> </td>
                    </tr>
		            		<tr>
		            			<td valign="top" width="100%" style="padding-top: 0%;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                         
                          <tr>
		            <td class="bg_white email-section" style="padding:1em !important;">
		            	<div class="heading-section" style="text-align: center; padding: 0 30px;">
                        <a href="{{url('/detail-data-pendaftar-akun-real/'.$id)}}" target="_blank"><button type="button" class="btn btn-primary" style="background-color:#f18109 !important;">Detail Data</button> </a>
		              </div>
		            	
		            </td>
		          </tr><!-- end: tr --> 
                        </table>
                      </td>
                      
                      
                    </tr>
                
                    <tr>
                        <td><p style="color:#0B0909 !important;"> {{$message}}  </td>
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