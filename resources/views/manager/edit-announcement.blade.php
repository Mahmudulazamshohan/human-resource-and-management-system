@extends('layouts.manager')
@section('body')
@if($an)
<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-bell"></i>
	      				<h3>Announcement</h3>
	  				</div> 
					<div class="widget-content">
						<div class="container">
						<form action="{{route('manager/update-announcement')}}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
						 <div class="control-group">											
						<input type="hidden" name="id" value="{{$id}}">	
						<label class="control-label" for="title">Title</label>
						<div class="controls">
						<input type="text" class="span7" id="title" placeholder="Title" name="title" value="{{$an->title}}">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="description">Description</label>
						<div class="controls">
						<textarea class="span7" id="description" placeholder="Description" name="description" style="min-height: 200px;">{{$an->description}}"</textarea>
						</div> <!-- /controls -->				
						</div>

						<div class="control-group">											
						<label class="control-label" for="description">Image File</label>
						<div class="controls">
						<input type="file" class="span5 custom-file-input"  name="image_file" style="height: 38px;">
						</div> <!-- /controls -->				
						</div>

						<button class="btn btn-primary">Update</button>	
						<a href="" class="btn btn-danger">Cancel</a>
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
        scrollY:300,
        scrollX:true
    } );
} );
</script>
@endsection
@endsection