@extends('layouts.manager')
@section('body')

@if($departments)
<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Edit Department</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
					
						<form action="{{route('update-departments')}}" method="POST">
							{{ csrf_field() }}
						 <div class="control-group">											
						<input type="hidden" name="id" value="{{$departments->id}}">	
						<label class="control-label" for="department">Department Name</label>
						<div class="controls">
						<input type="text" class="span7" id="department" placeholder="Department Name" name="department" value="{{$departments->department}}">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="designation">Designation</label>
						<div class="controls">
						<input type="text" class="span7" id="designation" placeholder="Designation Name" name="designation" value="{{$departments->designation}}">
						</div> <!-- /controls -->				
						</div>
						<button class="btn btn-primary">Update</button>	
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