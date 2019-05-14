@extends('layouts.manager')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Travel Expences</h3>
	  				</div> 
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-meeting-record')}}" method="POST" enctype="multipart/form-data">
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
                        <label class="control-label" for="time">Time</label>
                        <div class="controls">
                        <input class="span7" id="time" placeholder="Time" name="time">
                        </div> <!-- /controls -->               
                        </div>

                        <div class="control-group">                                         
                        <label class="control-label" for="project_name">Project Name</label>
                        <div class="controls">
                        <input class="span7" id="date" placeholder="Project Name" name="project_name">
                        </div> <!-- /controls -->               
                        </div>

                        <div class="control-group">                                         
                        <label class="control-label" for="location">Location</label>
                        <div class="controls">
                        <input class="span7" id="location" placeholder="Location" name="location">
                        </div> <!-- /controls -->               
                        </div>

						<div class="control-group">											
						<label class="control-label" for="topics">Tropics</label>
						<div class="controls">
						<textarea class="span7" id="topics" placeholder="Topics" name="topics" style="min-height: 50px;"></textarea>
						</div> <!-- /controls -->				
						</div>

						<div class="control-group">											
						<label class="control-label" for="meeting_content">Meeting Content</label>
						<div class="controls">
						<textarea class="span7" id="meeting_content" placeholder="Meeting Content" name="meeting_content" style="min-height: 100px;"></textarea>
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
                <th>Time</th>
                <th>Project Name</th>
                <th>Location</th>
                <th>Tropics</th>
                <th>Meeting Content</th>
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
          @foreach($mr as $m)
            <tr>
            	<td>{{$m->employee->employee_id}}</td>
                <td>{{$m->user->name}}</td>
                <td>{{$m->date}}</td>
                <td>{{$m->time}}</td>
                <td>{{$m->project_name}}</td>
                <td>{{$m->location}}</td>
                <td>{{$m->topics}}</td>
                <td>{{$m->meeting_content}}</td>
                <td>
                  <a href="{{route('delete-meeting-record',$m->id)}}" class="btn btn-small btn-danger"><i class="icon-remove"></i></a>
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