@extends('layouts.manager')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Violation Records</h3>
	  				</div> 
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-violation-record')}}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
						 <div class="control-group">											
							
						<label class="control-label" for="title">Employee ID</label>
						<div class="controls">
						<select class="span7" name="user_id" id="user_id">
                            @foreach($em as $e)
                             <option value="{{$e->user_id}}">{{$e->employee_id}}</option>    
                            @endforeach              
                        </select>
						</div> <!-- /controls -->	

						</div>
                        <div class="control-group">                                         
                        <label class="control-label" for="date">Date</label>
                        <div class="controls">
                        <input class="span7" id="date" placeholder="Date" name="date">
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" for="violation_type">Violation Type</label>
                        <div class="controls">
                        <input class="span7" id="violation_type" placeholder="Violation Type" name="violation_type">
                        </div> <!-- /controls -->               
                        </div>

                        <div class="control-group">                                         
                        <label class="control-label" for="violation_statement">Violation Statement</label>
                        <div class="controls">
                        <input class="span7" id="violation_statement" placeholder="Violation Statement" name="violation_statement">
                        </div> <!-- /controls -->               
                        </div>

						<div class="control-group">											
						<label class="control-label" for="description_details">Description Details</label>
						<div class="controls">
						<textarea class="span7" id="description_details" placeholder="Description Details" name="description_details" style="min-height: 100px;"></textarea>
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
              <h3>Announcement List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            	<table  {{-- class="display nowrap" --}} 
            	class="table table-striped table-bordered" width="100%"  style="overflow: auto;" id="example">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Violation Type</th>
                <th>Violation Statement</th>
                <th>Description Details</th>  
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
                
            </tr>
        </tfoot>
        <tbody>
           @foreach($vio as $v)
            <tr>
                <td>{{$v->employee->employee_id}}</td>
                <td>{{$v->user->name}}</td>
                <td>{{$v->date}}</td>
                <td>{{$v->violation_type}}</td>
                <td>{{$v->violation_statement}}</td>
                <td>{{$v->description_details}}</td>
                <td>
                  <a href="{{route('delete-violation-record',$v->id)}}" class="btn btn-small btn-danger"><i class="icon-remove"></i></a>
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
    $('#time').timepicker({
	      timeFormat: 'hh:mm tt'
    });
    $('#user_id').select2();
// 	$(document).ready(function() {
//     $('#example').DataTable( {
//         scrollY:300,
//         scrollX:true
//     } );
// } );
</script>
@endsection
@endsection