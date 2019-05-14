@extends('layouts.admin')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Edit Income Tax</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('update-income-tax')}}" method="POST">
							{{ csrf_field() }}
						 <div class="control-group">											
							<input type="hidden" name="employee_id" value="{{$income->user_id}}">
						<label class="control-label" for="user_id">Employee ID</label>
						<div class="controls">
						<select class="span7" id="user_id" name="user_id" disabled>
							<option>{{$income->employee->employee_id}}</option>
						</select>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="percentage">Percentage %</label>
						<div class="controls">
						<input type="text" class="span7" id="percentage" placeholder="Percentage" name="percentage" value="{{$income->percentage}}">
						</div> <!-- /controls -->				
						</div>

						<div class="control-group">											
						<label class="control-label" for="current_salary">Current Salary</label>
						<div class="controls">
						<input type="text" class="span7" id="current_salary" placeholder="Current Salary" name="current_salary" value="{{$income->current_salary}}">
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

@section('scripts')

<script type="text/javascript">
	$('#user_id').select2();
	$(document).ready(function() {
    $('#example').DataTable({
    	scrollX:true,
        scrollY: 200
    });
} );
</script>
@endsection
@endsection