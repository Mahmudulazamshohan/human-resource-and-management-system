@extends('layouts.admin')
@section('body')

<div class="row" style="margin-bottom: 10%;">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Edit Leave Pay</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('update-leave-pay')}}" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="user_id" value="{{$lp->user_id}}">
						 <div class="control-group">

						<label class="control-label" for="user_id">Employee ID</label>
						<div class="controls">
						<select class="span7" id="user_id" disabled>
							@foreach($employee as $em)
							  <option value="{{$em->user_id}}">{{$em->employee_id}}</option>
							@endforeach
						</select>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="hourly_salary">Hourly Deduction Amount</label>
						<div class="controls">
						<input type="text" class="span7" id="hourly_salary" placeholder="Hourly Amount" name="hourly_salary" value="{{$lp->hourly_salary}}">
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
	$(document).ready(function() {
    $('#example').DataTable({
    	scrollX:true,
        scrollY: 200
    });
} );
</script>
@endsection
@endsection