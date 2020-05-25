@extends('layouts.email')
@section('content-email')
<tr>
  <td class="bg_dark email-section" style="text-align:center;background:#fff !important;">
    <div class="heading-section heading-section-white">
    <span class="subheading" style="color:#0B0909 !important;">Dear</span>
    <h2 style="color:#0B0909 !important;">{{$title}}</h2>
    </div>
  </td>
</tr> 


          <tr>
  <td valign="middle" class="hero bg_white">
                    <tr>
                      <td valign="top" width="50%" style="padding-top:0px;">
                      <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                         
                         <tr>
               <td class="bg_white email-section" style="padding:1em !important;">
                 <div class="heading-section" style="text-align: center;">
				  @isset($total_deposit)
                   <p style="color:#0B0909 !important;text-align:left;">Customer Deposit Info :</p>
				   @endisset
				  @isset($total_withdrawal)
                   <p style="color:#0B0909 !important;text-align:left;">Customer Withdrawal Info :</p>
				   @endisset
                 </div>
                 <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                   <tr>
                     <td valign="top" width="50%" style="padding-top:0px;">
                       <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                         <tr>
                           <td class="text-services" style="width: 20%;">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>Status</b>
                           </p>
                           </td>
                           <td class="text-services" style="width: 1%;">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>:</b>
                           </p>
                           </td>
                           <td class="text-services">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>{{$status}}</b>
                           </p>
                           </td>
                         </tr>
                         <tr>
                           <td class="text-services" style="width: 20%;">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>Account Number</b>
                           </p>
                           </td>
                           <td class="text-services" style="width: 1%;">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>:</b>
                           </p>
                           </td>
                           <td class="text-services">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>{{$account_number}}</b>
                           </p>
                           </td>
                         </tr>
						  @isset($total_deposit)
						 <tr>
                           <td class="text-services">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>Total Deposit</b>
                           </p>
                           </td>
                           <td class="text-services">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>:</b>
                           </p>
                           </td>
                           <td class="text-services">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>@convert($total_deposit)</b>
                           </p>
                           </td>
                         </tr>
						 @endisset
						 @isset($total_withdrawal)
						 <tr>
                           <td class="text-services">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>Total Withdrawal</b>
                           </p>
                           </td>
                           <td class="text-services">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>:</b>
                           </p>
                           </td>
                           <td class="text-services">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>@convert($total_withdrawal)</b>
                           </p>
                           </td>
                         </tr>
						 @endisset
                         <tr>
                           <td class="text-services" style="width: 20%;">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>Reason</b>
                           </p>
                           </td>
                           <td class="text-services" style="width: 1%;">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>:</b>
                           </p>
                           </td>
                           <td class="text-services">
                           <p style="color:#0B0909 !important;text-align:left;">
                           <b>{{$reason}}</b>
                           </p>
                           </td>
                         </tr>
                       </table>
  </td>
</tr>
          <!-- end tr -->

@endsection