@extends('layouts.manager')
@section('body')
@if($bonus)
<div class="row">
	   
	   <div class="span12">
       	      			

          <div class="widget ">
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Edit Performance Bonus</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('update-performance-bonus')}}" method="POST">
							{{ csrf_field() }}
						 <div class="control-group">											
							
						<label class="control-label" for="user_id">Employee ID</label>
						<div class="controls">
						<select class="span7"  name="user_id" id="user_id">
							@foreach($employee as $em)
							 @if($em->user_id == $bonus->user_id)
							  <option value="{{$em->user_id}}" selected> {{$em->employee_id}}</option>
							  @else
							   <option value="{{$em->user_id}}"> {{$em->employee_id}}</option>
							  @endif
							@endforeach
						</select> 
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="date">Date</label>
						<div class="controls">
						<input type="text" class="span7" id="date" placeholder="" name="date" value="{{$bonus->date}}">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="note">Note</label>
						<div class="controls">
						<textarea style="min-height: 70px;" class="span7" id="note" placeholder="" name="note">{{$bonus->note}}</textarea>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="number_of_star">Number of Star</label>
						<div class="controls">
						<input type="text" class="span7" id="number_of_star" placeholder="" name="number_of_star" value="{{$bonus->number_of_star}}">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="bonus_amount">Bonus Amount</label>
						<div class="controls">
						<input type="text" class="span7" id="bonus_amount" placeholder="" name="bonus_amount" value="{{$bonus->bonus_amount}}">
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
	$('#date').datepicker();
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
@endsection