@extends('layouts.website')
@section('content-website')
 

</script> 
<link rel="stylesheet" href="{{asset('/public/main_dashboard/css/flexbox.css')}}" />


<div class="feed-content blog" style="padding-top:90px !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 box-body-feed">
	<a href="/berita-ekonomi" class="btn btn-more">back</a>			 
				 <ul>
					<?php echo $detailNewsForexFactory; ?>
				</ul>	
					
					
					<div class="foot"> <ul> <li class="more"> <a href="https://www.forexfactory.com/news" target="_blank" class="flexMore" data-preloadshow="no" data-preload="preloadingComplete" data-preloadid="preload_1"><span>source by forexfactory.com</span><span class="loader"></span></a> </li> </ul> </div>
					
					
					</div>

             

                </div>
            </div>

</div>



@endsection