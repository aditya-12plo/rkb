@extends('layouts.email')
@section('content-email')

<tr>
		            <td class="bg_white email-section">
		            	<div class="heading-section" style="text-align: center; padding: 0 30px;">
		              	<h2>@if(Config::get('app.locale') == 'cn') 您有来自网站的联系方式。 @else You Have Contact From Website. @endif</h2>
		               </div>
		            	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
		            		<tr>
		            			<td valign="top" width="100%" style="padding-top: 20px;" class="services">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                        
                          <tr>
                            <td width="30%" class="text-services"><h3 align="left">@if(Config::get('app.locale') == 'id') Nama @elseif(Config::get('app.locale') == 'cn') 名称 @else Name @endif</h3></td>
                            <td width="5%" class="text-services"><h3>:</h3></td>
                            <td width="65%" class="text-services"><h3 align="left">{{$contact_name}}</h3></td>
                          </tr>
                          <tr>
                            <td width="30%" class="text-services"><h3 align="left">@if(Config::get('app.locale') == 'id') Nama Perusahaan @elseif(Config::get('app.locale') == 'cn') 公司名 @else Company Name @endif</h3></td>
                            <td width="5%" class="text-services"><h3>:</h3></td>
                            <td width="65%" class="text-services"><h3 align="left">{{$contact_company}}</h3></td>
                          </tr>
                          <tr>
                            <td width="30%" class="text-services"><h3 align="left">@if(Config::get('app.locale') == 'cn') 电邮 @else Email @endif</h3></td>
                            <td width="5%" class="text-services"><h3>:</h3></td>
                            <td width="65%" class="text-services"><h3 align="left">{{$contact_email}}</h3></td>
                          </tr>
                          <tr>
                            <td width="30%" class="text-services"><h3 align="left">@if(Config::get('app.locale') == 'id') Telepon @elseif(Config::get('app.locale') == 'cn')电话号码 @else Phone @endif</h3></td>
                            <td width="5%" class="text-services"><h3>:</h3></td>
                            <td width="65%" class="text-services"><h3 align="left">{{$contact_phone}}</h3></td>
                          </tr>
                          <tr>
                            <td width="30%" class="text-services"><h3 align="left">@if(Config::get('app.locale') == 'id') Pesan @elseif(Config::get('app.locale') == 'cn') 信息 @else Message @endif</h3></td>
                            <td width="5%" class="text-services"><h3>:</h3></td>
                            <td width="65%" class="text-services"><h3 align="left">{{$contact_message}}</h3></td>
                          </tr>
                          <tr>
                            <td width="100%" colspan="3" class="text-services"><h3 align="left">@if(Config::get('app.locale') == 'cn') 谢谢<br>按系统 @else Thanks <br> By System @endif</h3></td>
                          </tr>
                          
                        </table>
                      </td>
                      
                      
                    </tr>
		            	</table>
		            </td>
		          </tr><!-- end: tr -->



@endsection