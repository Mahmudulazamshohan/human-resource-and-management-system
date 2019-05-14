@extends('layouts.manager')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Staff Scheduling Classes</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-staff-scheduling')}}" method="POST">
							{{ csrf_field() }}
						 <div class="control-group">											
							
						<label class="control-label" for="user_id">Employee ID</label>
						<div class="controls">
						<select class="span7" id="user_id" name="user_id">
							@foreach($employee as $em)
							  <option value="{{$em->user_id}}">{{$em->employee_id}}</option>
							@endforeach
						</select>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="date">Date</label>
						<div class="controls">
						<input type="text" class="span7" id="date" placeholder="Date" name="date">
						</div> <!-- /controls -->				
						</div>

						<div class="control-group">											
						<label class="control-label" for="time_in">Time In</label>
						<div class="controls">
						<input type="text" class="span7" id="time_in" placeholder="Time In" name="time_in">
						</div> <!-- /controls -->				
						</div>

						<div class="control-group">											
						<label class="control-label" for="time_out">Time Out</label>
						<div class="controls">
						<input type="text" class="span7" id="time_out" placeholder="Time Out" name="time_out">
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
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Department List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            	<table id="example" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>	
                <th>Name</th>	
                <th>Date</th>	
                <th>Time In</th>	
                <th>Time Out</th>	
                <th>Hours Worked</th>	
                <th>Tardiness</th>	
                <th>Overtime</th>	
                <th>Action</th>
                
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                
            </tr>
        </tfoot>
        <tbody>
          @foreach($staff_scheduling as $ss)
            <tr>
            	<td>{{ $ss->employee->employee_id }}</td>
            	<td>{{ $ss->user->name }}</td>
            	<td>{{ $ss->date }}</td>
                <td>{{ $ss->time_in }}</td>
                <td>{{ $ss->time_out }}</td>
                <td>{{ $ss->hours_worked_str }}</td>
                <td>{{ $ss->tardiness_str }}</td>
                <td>{{ $ss->overtime_str }}</td>
                <td>
				<div class="controls">
				<div class="btn-group">
				<a class="btn btn-success" href="#"><i class="icon-plus icon-white"></i> Action</a>
				<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu">
				
				<li><a href="{{route('delete-staff-scheduling',$ss->id)}}"><i class="icon-trash"></i> Delete</a></li>
			
				</ul>
				</div>
				</div>
                 </td>
            </tr>
            @endforeach
           
           
        </tbody>
    </table>
            </div>
         </div>
	</div>
</div>
@section('scripts')
<script src="{{asset('public/js/jquery-ui-timepicker-addon.js') }}"></script>

<script type="text/javascript">
	
	$('#date').datepicker();
	$('#time_in').timepicker({
	      timeFormat: 'hh:mm tt'
    });
    $('#time_out').timepicker({
	      timeFormat: 'hh:mm tt'
    });
	$('#user_id').select2();
	$(document).ready(function() {
    // $('#example').DataTable( {
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'copy', 'csv', 'excel', 'pdf', 'print'
    //     ]
    // } );
    $('#example').DataTable();
} );
</script>
@endsection
@endsection