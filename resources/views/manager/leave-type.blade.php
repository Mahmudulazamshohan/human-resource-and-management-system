@extends('layouts.manager')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Add Type of leaves</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-leave-type')}}" method="POST">
							{{ csrf_field() }}
						 <div class="control-group">											
							
						<label class="control-label" for="leave_type">Leave Type</label>
						<div class="controls">
						<input type="text" class="span7" id="leave_type" placeholder="Leave Type" name="leave_type">
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
            <tr>
                <th>Type</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
         
                <th></th>
                <th></th>
                
            </tr>
        </tfoot>
        <tbody>
        	@foreach($leave as $l)
            <tr>
              
                <td style="text-align: center;">
                {{$l->leave_type}}
                </td>
                <td style="float: right;">
				<div class="controls">
				<div class="btn-group">
				<a class="btn btn-success" href="#"><i class="icon-plus icon-white"></i> Action</a>
				<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu">
				
				<li ><a href="{{route('delete-leave-type',$l->id)}}"><i class="icon-trash"></i> Delete</a></li>
			
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
    $('#example').DataTable();
} );
</script>
@endsection
@endsection