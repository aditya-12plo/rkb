@extends('layouts.email')
@section('content-email')

<tr>
		            <td class="bg_white email-section">
		            	<div class="heading-section" style="text-align: center; padding: 0 30px;">
		              	<h2>You Have Contact From Website.</h2>
		               </div>
		            	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
		            		<tr>
		            			<td valign="top" width="100%" style="padding-top: 20px;" class="services">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                         
                          <tr>
                            <td width="30%" class="text-services"><h3 align="left">Name</h3></td>
                            <td width="5%" class="text-services"><h3>:</h3></td>
                            <td width="65%" class="text-services"><h3 align="left">{{$contact_name}}</h3></td>
                          </tr>
                          <tr>
                            <td width="30%" class="text-services"><h3 align="left">Company Name</h3></td>
                            <td width="5%" class="text-services"><h3>:</h3></td>
                            <td width="65%" class="text-services"><h3 align="left">{{$contact_company}}</h3></td>
                          </tr>
                          <tr>
                            <td width="30%" class="text-services"><h3 align="left">Email</h3></td>
                            <td width="5%" class="text-services"><h3>:</h3></td>
                            <td width="65%" class="text-services"><h3 align="left">{{$contact_email}}</h3></td>
                          </tr>
                          <tr>
                            <td width="30%" class="text-services"><h3 align="left">Phone</h3></td>
                            <td width="5%" class="text-services"><h3>:</h3></td>
                            <td width="65%" class="text-services"><h3 align="left">{{$contact_phone}}</h3></td>
                          </tr>
                          <tr>
                            <td width="30%" class="text-services"><h3 align="left">Message</h3></td>
                            <td width="5%" class="text-services"><h3>:</h3></td>
                            <td width="65%" class="text-services"><h3 align="left">{{$contact_message}}</h3></td>
                          </tr>
                          <tr>
                            <td width="100%" colspan="3" class="text-services"><h3 align="left">Thanks <br> By System</h3></td>
                          </tr>
                          
                        </table>
                      </td>
                      
                      
                    </tr>
		            	</table>
		            </td>
		          </tr><!-- end: tr -->



@endsection