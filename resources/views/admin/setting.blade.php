@extends('layouts.admin')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-cogs"></i>
	      				<h3>General Setting</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content pd100">
						<div class="container">
						<form action="{{route('update-setting')}}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
						 <div class="control-group">											
							
						<label class="control-label" for="department">Website Logo</label>
						<div class="controls">
						
						 <img src="{{asset('storage/app/'.$sts->website_logo)}}" class="logo-website">

						</div> <!-- /controls -->				
						</div>
						<div class="control-group file-back-setting">											
							
						<label class="control-label" for="department">
						<div class="controls">
						<input type="file" class="span5 custom-file-input"  name="logo_file" style="height: 38px;">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group file-back-setting1">											
							
						<label class="control-label" for="department">Name</label>
						<div class="controls">
						<input type="text" class="span7" id="department"  name="name" value="{{$sts->website_name}}">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group file-back-setting1">											
						<label class="control-label" for="email">Email</label>
						<div class="controls">
						<input type="text" class="span7" id="email"  name="email" value="{{$sts->email}}">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group file-back-setting1">											
						<label class="control-label" for="mobile">Mobile</label>
						<div class="controls">
						<input type="text" class="span7" id="mobile"  name="mobile" value="{{$sts->phone}}">
						</div> <!-- /controls -->				
						</div>
						<button class="btn btn-primary" type="submit">Update</button>	
						
						</div>
						</form>
						
					</div>
				</div>
				
      		
      		
      		
		      		
	   </div>
	   
	   
</div>

@section('scripts')

<script type="text/javascript">
	
</script>
@endsection
@endsection