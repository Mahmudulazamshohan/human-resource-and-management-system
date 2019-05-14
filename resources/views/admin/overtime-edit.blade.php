@extends('layouts.admin')
@section('body')

<div class="row" style="margin-bottom: 10%;">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Edit Overtime</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('overtime-update')}}" method="POST">
							{{ csrf_field() }}
						<div class="control-group">											
						<input type="hidden" name="user_id" value="{{$overtime->user_id}}">	
						<label class="control-label" for="user_id">Employee ID</label>
						<div class="controls">
						<select class="span7" id="user_id" disabled>
							
							  <option value="">{{$overtime->employee->employee_id}}</option>
							
						</select>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="hourly_salary">Hourly Salary</label>
						<div class="controls">
						<input type="text" class="span7" id="hourly_salary" placeholder="Hourly Salary" name="hourly_salary" value="{{$overtime->hourly_salary}}">
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

@section('scripts')

<script type="text/javascript">
	$('#user_id').select2();
	
</script>
@endsection
@endsection