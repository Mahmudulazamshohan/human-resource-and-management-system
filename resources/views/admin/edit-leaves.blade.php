@extends('layouts.admin')
@section('body')
@if($ls)
<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Edit Leaves</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('update-leaves')}}" method="POST">
							{{ csrf_field() }}
						 <div class="control-group">											
						<input type="hidden" name="employee_id" value="{{$ls->user_id}}">	
						<label class="control-label" for="user_id">Employee ID </label>
						<div class="controls">
						<select class="span7" id="user_id"  name="user_id">
							@foreach($employee as $e)
							  @if($e->user_id == $ls->user_id)

							    <option value="{{$e->user_id}}" selected>{{ $e->employee_id }}</option>
							  @else
							    <option value="{{$e->user_id}}">{{ $e->employee_id }}</option>
							  @endif
							@endforeach
						</select>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
							
						<label class="control-label" for="leave_type">Leave Type</label>
						<div class="controls">
						<select class="span7" id="leave_type"  name="leave_type">
							@foreach($leave_type as $l)
							  @if($l->leave_type == $ls->leave_type)
							    <option value="{{$l->leave_type}}" selected>{{ $l->leave_type }}</option>
							  @else
							    <option value="{{$l->leave_type}}">{{ $l->leave_type }}</option>
							  @endif
							@endforeach
						</select>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
							
						<label class="control-label" for="date_from">Date From</label>
						<div class="controls">
						<input type="text" class="span7" id="date_from" placeholder="Date From" name="date_from" value="{{$ls->date_from}}">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
							
						<label class="control-label" for="date_to">Date To</label>
						<div class="controls">
						<input type="text" class="span7" id="date_to" placeholder="Date To" name="date_to" value="{{$ls->date_to}}">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
							
						<label class="control-label" for="applied_on">Applied On</label>
						<div class="controls">
						<input type="text" class="span7" id="applied_on" placeholder="Applied On" name="applied_on" value="{{$ls->applied_on}}">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
							
						<label class="control-label" for="leave_type">Reason</label>
						<div class="controls">
						<textarea class="span7" id="reason"  name="reason" style="min-height:70px; min-width:48.79941434846266%; ">{{$ls->reason}}</textarea>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
							
						<label class="control-label" for="comment">Comment</label>
						<div class="controls">
						
						<textarea class="span7" id="comment"  name="comment" style="min-height:70px;min-width:48.79941434846266%; ">{{$ls->comment}}</textarea>
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
	$('#user_id').select2();
	$('#leave_type').select2();
	$('#date_from').datepicker();
	$('#date_to').datepicker();
	$('#applied_on').datepicker();
	$(document).ready(function() {
    $('#example').DataTable({
    	scrollY:150,
    	scrollX:true
    });
});
</script>
@endsection
@endsection