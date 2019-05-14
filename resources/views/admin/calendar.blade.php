@extends('layouts.admin')
@section('body')
<button class="btn btn-primary" id="calenderToggle">New Calender</button>
<div class="row" id="calendar-body">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>New Calendar</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-calendar')}}" method="POST">
							{{ csrf_field() }}
						 <div class="control-group">											
							
						<label class="control-label" for="date">Date</label>
						<div class="controls">
						<input type="text" class="span7" id="date" placeholder="Date" name="date">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="text">Text</label>
						<div class="controls">
						<textarea  class="span7" id="text" placeholder="Text" name="text" style="min-height: 50px;"></textarea>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="time">Time</label>
						<div class="controls">
						<input type="text" class="span7" id="time" placeholder="Time" name="time">
						</div> <!-- /controls -->				
						</div>
						<button class="btn btn-primary">Submit</button>	
						<a href="" class="btn btn-danger">Cancel</a>
						</div>
						</form>
						
					</div>
				</div>
				
      		
      		
      		
		      		
	   </div>
	   
	   
</div>
<div class="row">
	<div class="span12">
		<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th"></i>
              <h3>Calendar</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            	<div id='calendar'>
                </div>
            </div>
         </div>
	</div>
</div>
@section('scripts')
<script src="{{asset('public/js/jquery-ui-timepicker-addon.js') }}"></script>

<script type="text/javascript">
	$('#date').datepicker();
	$('#time').timepicker({
	      timeFormat: 'hh:mm tt'
    });
	var c =0;

	$('#calenderToggle').click(function(event) {
		$('#calendar-body').toggle('fast');
        if(c ==0){
        	$('#calenderToggle').text('View');
        	c++;
        }else {
        	$('#calenderToggle').text('Close');
        	c = 0;
        }
	});

	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

@endsection
@section('scripts2')
<script type="text/javascript">
	
	

	$.ajax({
				url: '{{route('api-calendar')}}',
				type: 'GET',
				dataType: 'json',
				success: function (data) {
		            
		              
		          datas(data);          
		   
			}});

	function datas(e) {
	 	var abc = null;
	 

		console.log(e);	
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        
        var y = date.getFullYear();
        
        var calendar = $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
          },
          selectable: false,
          selectHelper: true,
          select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            calendar.fullCalendar('unselect');
          },
          editable: true,
          events:e
        });
      }

</script>
@endsection
@endsection