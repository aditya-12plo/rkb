@extends('layouts.website')
@section('content-website')
  
<link rel="stylesheet" href="{{asset('/public/main_dashboard/css/flexbox.css')}}" />


<div class="feed-content blog" style="padding-top:90px !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 box-body-feed">
				 
					<?php echo $forexFactory; ?>
					
					
					
					<div class="foot"> <ul> <li class="more"> <a href="https://www.forexfactory.com/calendar.php" target="_blank" class="flexMore" data-preloadshow="no" data-preload="preloadingComplete" data-preloadid="preload_1"><span>source by forexfactory.com</span><span class="loader"></span></a> </li> </ul> </div>
					
					
					</div>

             

                </div>
            </div>

</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>

// var tables = document.getElementsByClassName("calendar__table").rows[0].cells;
 
	// console.log(tables);
	
$('.calendar__table').find('tr').click( function(){
	var noRow = ($(this).index()+1);
	// var rows = document.getElementsByClassName("calendar__table")[0].rows;
	// var last = rows[noRow];
	// var cell = last.cells[0];
	// var value = cell.innerHTML;
	var code = $(this).attr("data-eventid");
	// alert('You clicked row ' + noRow + ' '+ code);
	window.location.href = "/kalender-ekonomi/"+code;
});


// $('.calendar__table').find('a').click( function(){
	// var noRow = $(this).index()+1;
	// var dast = tables.rows[noRow].innerHTML;
// alert('You clicked row '+ noRow );
// });

// $('.calendar__detail-link').click(function() {
    // console.log('ok')
// });
</script>

@endsection