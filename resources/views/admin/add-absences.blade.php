@extends('layouts.admin')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>New Absence</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-absences')}}" method="POST">
							{{ csrf_field() }}
						 <div class="control-group">
						 <label class="control-label" for="user_id">Employee</label>
						<div class="controls">
						<select class="span7" id="user_id"  name="user_id">
						   @foreach($employee as $em)
						     <option value="{{$em->user_id}}">{{$em->employee_id}}</option>
						    @endforeach
						</select>
						</div> <!-- /controls -->				
						</div>

						<div class="control-group">
						 <label class="control-label" for="leave_type">Leave Type</label>
						<div class="controls">
						<select class="span7" id="leave_type"  name="leave_type">
                           @foreach($leave as $lv)
						   <option value="{{$lv->leave_type}}">{{$lv->leave_type}}</option>
						  @endforeach
						</select>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">
						 <label class="control-label" for="leave_type">Reason</label>
						<div class="controls">
						<textarea  class="span7 h200" name="reason"></textarea>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">
						 <label class="control-label" for="date">Date</label>
						<div class="controls">
						<input type="text"  class="span7 " name="date" id="date">
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
              <h3>Leave Type</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            	<table id="example" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Leave Type</th>
                <th>Reason</th>
                <th>Date</th>
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
                
            </tr>
        </tfoot>
        <tbody>
        	@foreach($absences as $ab)
            <tr>
                <td>{{$ab->employee->employee_id}}</td>
                <td>{{$ab->user->name}}</td>
                <td>{{$ab->leave_type}}</td>
                <td>{{$ab->reason}}</td>
                <td>{{$ab->date}}</td>
                <td style="float: right;">
				<div class="controls">
				<div class="btn-group">
				<a class="btn btn-success" href="#"><i class="icon-plus icon-white"></i> Action</a>
				<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				 <ul class="dropdown-menu" style="min-width:100px;">
				        <li><a href="{{route('edit-absences',$ab->id)}}"><i class="icon-pencil"></i> Edit</a></li>
				         <li>
				         	<a href="{{route('delete-absences',$ab->id)}}"><i class="icon-trash"></i> Delete</a>
				         </li>
			
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

<script type="text/javascript">
	$('#date').datepicker();
	$('#user_id').select2();
	$('#leave_type').select2();
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
@endsection