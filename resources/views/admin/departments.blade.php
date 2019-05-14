@extends('layouts.admin')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Add New Department</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-departments')}}" method="POST">
							{{ csrf_field() }}
						 <div class="control-group">											
							
						<label class="control-label" for="department">Department Name</label>
						<div class="controls">
						<input type="text" class="span7" id="department" placeholder="Department Name" name="department">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="designation">Designation</label>
						<div class="controls">
						<input type="text" class="span7" id="designation" placeholder="Designation Name" name="designation">
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
                <th>Department Name</th>
                <th>Designations</th>
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
        	@foreach($department  as  $dp)
            <tr>
                <td>{{$dp->department}}</td>
                <td>
                	<ul style="list-style: none;">	
                	@foreach(explode(',',$dp->designation) as $dl)
                	    <li><i class="icon-plus"></i> {{$dl}}</li>
                	@endforeach
                	</ul>
                </td>
                <td>
				<div class="controls">
				<div class="btn-group">
				<a class="btn btn-success" href="#"><i class="icon-plus icon-white"></i> Action</a>
				<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="{{route('edit-departments',$dp->id)}}"><i class="icon-pencil"></i> Edit</a></li>
				<li><a href="{{route('delete-departments',$dp->id)}}"><i class="icon-trash"></i> Delete</a></li>
			
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