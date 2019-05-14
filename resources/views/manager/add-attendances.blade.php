@extends('layouts.manager')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>New Attendance</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-attendances')}}" method="POST">
							{{ csrf_field() }}
						 <div class="control-group">											
							
						<label class="control-label" for="employee_id">Employee</label>
						<div class="controls">
						<select class="span7" id="employee_id" name="employee_id">
							@foreach($employee as $em)
							 <option value="{{$em->user_id}}">{{$em->employee_id}}</option>

							@endforeach
						</select> 
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="attendance_date">Attendance Date</label>
						<div class="controls">
						<input type="text" class="span7" id="attendance_date" placeholder="Date" name="attendance_date">
						</div> <!-- /controls -->				
						</div>


						<button class="btn btn-primary">Submit</button>	
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
                <th>Employe ID</th>
                <th>Attendance Date</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                
            </tr>
        </tfoot>
        <tbody>
        	@foreach($attendance  as  $at)
            <tr>
                <td>{{$at->employee_id}}</td>
                <td>
                 {{$at->attendance_date}}	
                </td>
                <td>
				<div class="controls">
				<div class="btn-group">
				<a class="btn btn-success" href="#"><i class="icon-plus icon-white"></i> Action</a>
				<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu">
				
				<li><a href=""><i class="icon-trash"></i> Delete</a></li>
			
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
<script src="http://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript">

	  $('#attendance_date').datepicker();
	$(document).ready(function() {
    $('#example').DataTable( );
} );


// 	var data = [
//     {
//         id: 0,
//         text: 'enhancement'
//     },
//     {
//         id: 1,
//         text: 'bug'
//     },
//     {
//         id: 2,
//         text: 'duplicate'
//     },
//     {
//         id: 3,
//         text: 'invalid'
//     },
//     {
//         id: 4,
//         text: 'wontfix'
//     }
// ];


$("#employee_id").select2();
</script>
@endsection
@endsection