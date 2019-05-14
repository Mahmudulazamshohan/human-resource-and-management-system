@extends('layouts.admin')
@section('body')
@if($st)
<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Salary Type</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('update-salary-type')}}" method="POST">
							{{ csrf_field() }}
							<div class="control-group">											
						<label class="control-label" for="hourly_salary">Hourly Salary</label>
						<div class="controls">
						<select class="span7" disabled>
							<option>{{$st->employee->employee_id}}</option>
						</select>
						</div> <!-- /controls -->				
						</div>
						 <div class="control-group">											
						<input type="hidden" name="id" value="{{$st->id}}">	
						<label class="control-label" for="hourly_salary">Hourly Salary</label>
						<div class="controls">
						<input type="text" class="span7" id="hourly_salary" placeholder="Hourly Salary" name="hourly_salary" value="{{$st->hourly_salary}}">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
							
						<label class="control-label" for="weekly_salary">Weekly Salary</label>
						<div class="controls">
						<input type="text" class="span7" id="weekly_salary" placeholder="Weekly Salary" name="weekly_salary" value="{{$st->weekly_salary}}">
						</div> <!-- /controls -->				
						</div>
						
						<button class="btn btn-primary">Update</button>	
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
// 	$(document).ready(function() {
//     $('#example').DataTable();
// } );
</script>
@endsection
@endsection