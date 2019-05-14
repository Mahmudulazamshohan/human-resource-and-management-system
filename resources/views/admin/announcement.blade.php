@extends('layouts.admin')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-bell"></i>
	      				<h3>Announcement</h3>
	  				</div> 
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-announcement')}}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
						 <div class="control-group">											
							
						<label class="control-label" for="title">Title</label>
						<div class="controls">
						<input type="text" class="span7" id="title" placeholder="Title" name="title">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="description">Description</label>
						<div class="controls">
						<textarea class="span7" id="description" placeholder="Description" name="description" style="min-height: 200px;"></textarea>
						</div> <!-- /controls -->				
						</div>

						<div class="control-group">											
						<label class="control-label" for="description">Image File</label>
						<div class="controls">
						<input type="file" class="span5 custom-file-input"  name="image_file" style="height: 38px;">
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
            	class="table table-striped table-bordered" width="100%"  style="overflow: auto;">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th>
                	
                </th>
                <th></th>
                
            </tr>
        </tfoot>
        <tbody>
           @foreach($an as $a)
            <tr>
                <td>{{$a->title}}</td>
                <td>{{$a->description}}</td>
                <td>
                	@if($a->image_file!=null)
                	  <a href="{{asset('storage/app/'.$a->image_file)}}" class="btn btn-info" >View</a>
                	@else
                	   Not found
                	@endif
                </td>
                <td>
                <a href="{{route('edit-announcement',$a->id)}}" class="btn btn-small btn-success" style="margin-bottom: 4px;"><i class="icon-pencil"></i></a>
                <a href="{{route('delete-announcement',$a->id)}}" class="btn btn-small btn-danger"><i class="icon-remove"></i></a>
				
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
        scrollY:300,
        scrollX:true
    } );
} );
</script>
@endsection
@endsection