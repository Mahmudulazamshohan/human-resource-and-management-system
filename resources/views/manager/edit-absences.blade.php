@extends('layouts.manager')
@section('body')
@if($absences)
<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Edit Absence</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('update-absences')}}" method="POST">
							{{ csrf_field() }}
                         <input type="hidden" name="user_id" value="{{$absences->user_id}}">
						 <div class="control-group">
						 <label class="control-label" for="user_id">Employee</label>
						<div class="controls">
						<select class="span7" id="user_id"   disabled>
						   @foreach($employee as $em)
						     @if($em->user_id == $absences->user_id )
						     <option value="{{$em->user_id}}" selected>{{$em->employee_id}}</option>
						     @else
                               <option value="{{$em->user_id}}">{{$em->employee_id}}</option>
						     @endif
						    @endforeach
						</select>
						</div> <!-- /controls -->				
						</div>

						<div class="control-group">
						 <label class="control-label" for="leave_type">Leave Type</label>
						<div class="controls">
						<select class="span7" id="leave_type"  name="leave_type">
                           @foreach($leave as $lv)
                           @if($lv->leave_type == $absences->leave_type )
						   <option value="{{$lv->leave_type}}" selected>{{$lv->leave_type}}</option>
						   @else
						   <option value="{{$lv->leave_type}}">{{$lv->leave_type}}</option>
						   @endif

						  @endforeach
						</select>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">
						 <label class="control-label" for="leave_type">Reason</label>
						<div class="controls">
						<textarea  class="span7 h200" name="reason">{{$absences->reason}}</textarea>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">
						 <label class="control-label" for="date">Date</label>
						<div class="controls">
						<input type="text"  class="span7 " name="date" id="date" value="{{$absences->date}}">
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
@else
<div class="container">
	
	<div class="row">
		
		<div class="span12">
			
			<div class="error-container">
				<h1>404</h1>
				
				<h2>Who! bad trip man. No more pixesl for you.</h2>
				
				<div class="error-details">
					Sorry, an error has occured! Why not try going back to the <a href="{{route('dashboard')}}">home page</a> or perhaps try following!
					
				</div> <!-- /error-details -->
				
				<div class="error-actions">
					<a href="{{route('dashboard')}}" class="btn btn-large btn-primary">
						<i class="icon-chevron-left"></i>
						&nbsp;
						Back to Dashboard						
					</a>
					
					
					
				</div> <!-- /error-actions -->
							
			</div> <!-- /error-container -->			
			
		</div> <!-- /span12 -->
		
	</div> <!-- /row -->
	
</div>
@endif

@section('scripts')

<script type="text/javascript">
	$('#date').datepicker();
	$('#user_id').select2();
	$('#leave_type').select2();
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
@endsection