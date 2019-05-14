@extends('layouts.admin')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>New Leaves</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-leaves')}}" method="POST">
							{{ csrf_field() }}
						 <div class="control-group">											
							
						<label class="control-label" for="user_id">Employee ID</label>
						<div class="controls">
						<select class="span7" id="user_id"  name="user_id">
							@foreach($employee as $e)
							  <option value="{{$e->user_id}}">{{ $e->employee_id }}</option>
							@endforeach
						</select>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
							
						<label class="control-label" for="leave_type">Leave Type</label>
						<div class="controls">
						<select class="span7" id="leave_type"  name="leave_type">
							@foreach($leave_type as $l)
							  <option value="{{$l->leave_type}}">{{ $l->leave_type }}</option>
							@endforeach
						</select>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
							
						<label class="control-label" for="date_from">Date From</label>
						<div class="controls">
						<input type="text" class="span7" id="date_from" placeholder="Date From" name="date_from">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
							
						<label class="control-label" for="date_to">Date To</label>
						<div class="controls">
						<input type="text" class="span7" id="date_to" placeholder="Date To" name="date_to">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
							
						<label class="control-label" for="applied_on">Applied On</label>
						<div class="controls">
						<input type="text" class="span7" id="applied_on" placeholder="Applied On" name="applied_on">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
							
						<label class="control-label" for="leave_type">Reason</label>
						<div class="controls">
						<textarea class="span7" id="reason"  name="reason" style="min-height:70px; min-width:48.79941434846266%; "></textarea>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
							
						<label class="control-label" for="comment">Comment</label>
						<div class="controls">
						
						<textarea class="span7" id="comment"  name="comment" style="min-height:70px;min-width:48.79941434846266%; "></textarea>
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
              <h3>Leave Type</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            	<table id="example" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr style="text-align: left">
                <th>ID</th>	
                <th>Name</th>	
                <th>Leave Type</th>	
                <th>Date From</th>	
                <th>Date To</th>	
                <th>Applied On</th>	
                <th>Reason</th>	
                <th>Comment	</th>
                <th>Status</th>	
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
                <th></th>
                
            </tr>
        </tfoot>
        <tbody>
        	@foreach($leaves as $ls)
             <tr>
                <td>{{ $ls->employee->employee_id}}</td>
                <td>{{ $ls->user->name}}</td>
                <td>{{ $ls->leave_type}}</td>
                <td>{{ $ls->date_from}}</td>
                <td>{{ $ls->date_to}}</td>
                <td>{{ $ls->applied_on}}</td>
                <td>{{ $ls->reason}}</td>
                <td>{{ $ls->comment}}</td>
                @if($ls->status == 'false')
                  <td>Pending</td>
                @else
                  <td>Accepted</td>
                @endif
                <td >
				<div class="controls">
				<div class="btn-group" >
				<a class="btn btn-success" href="#"><i class="icon-plus icon-white"></i> Action</a>
				<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu" style="min-width: 30px;">
					@if($ls->status == 'false')
	                  <li ><a href="{{route('accept-leaves',$ls->id)}}"><i class="icon-ok-sign"></i> Accept</a></li>
	                @else
                       <li ><a href="{{route('pending-leaves',$ls->id)}}"><i class="icon-remove-sign"></i> Pending</a></li>
	                @endif
				
				<li ><a href="{{route('edit-leaves',$ls->id)}}"><i class="icon-pencil"></i> Edit</a></li>
				<li ><a href="{{route('delete-leaves',$ls->id)}}"><i class="icon-trash"></i> Delete</a></li>
			
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