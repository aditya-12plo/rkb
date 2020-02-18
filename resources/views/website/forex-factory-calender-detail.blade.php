	@extends('layouts.website')
@section('content-website')
  
<link rel="stylesheet" href="{{asset('/public/main_dashboard/css/flexbox.css')}}" />


<div class="feed-content blog" style="padding-top:90px !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 box-body-feed">
					
	<a href="/kalender-ekonomi" class="btn btn-more">back</a>		
	
<div class="shell">
	<!-- Start calendar event details -->
	<div class="calendardetails__segment calendardetails__segment--info overlay">
					<?php echo $detailForexFactory; ?>
					
	</div>	



	
</div>
					
					</div>

             

                </div>
            </div>

</div> 

@endsection