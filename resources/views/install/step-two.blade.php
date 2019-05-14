<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Step One</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <link href="{{ asset('public/css/jquery-ui.min.css') }}" rel="stylesheet">
	<style type="text/css">
	body{
		background:#eee;
	}
		.main-body{
			margin-left: auto;
			margin-right: auto;
			width: 58.56515373352855%;
			background:#fff;
			box-shadow: 0px 1px 1px 1px rgba(0,0,0,0.2);
			padding: 20px;
			margin-top: 100px;
			margin-bottom: 200px;
		}
		.main-body .flex-i{
			display: flex;

		}
		.flex-i .flex-r{
			flex-flow: row;
		}
		.flex-i label{
			font-size: 18px;
			font-weight: bold;
		}
		.flex-i input[type='text']{
          border-radius: 4px;
          border:2px solid #eee;
          padding: 5px;
          margin-left: 10px;
          width: 250px;
          height: 20px;
		}
		.flex-i p{
			font-size: 14px;
			color: #555;
			margin-left: 4px;
		}
		.main-body p{
			font-size: 16px;
			color: #555;
		}
		.btn-default{
			background: #01579b;
			color: #fff;
			font-weight: bold;
			box-shadow: 0px 1px 1px 1px rgba(0,0,0,0.1);
		}
		.col-form-label{
			font-size: 14px;
			font-weight: bold;
			color: #555;
		}
		.b14{
			font-size: 13px;
			font-weight: 700;
			color: #555;
		}
		.error-body{
			padding: 10px;
			background:#fff;
			box-shadow: 0px 1px 1px 1px rgba(0,0,0,0.2);
			width: 58.56515373352855%;
			margin-left: auto;
			margin-right: auto;
			margin-top: 200px;
		}
		.error-body p{
			text-align: center;
			font-size: 22px;
			color: #555;

		}
	</style>
</head>
<body>
	@if($installOK)
	 @if(session()->has('message'))
	   <h1 style="text-align: center;color:green;">{{session()->get('message')}}
	 @endif
	<div class="main-body">
		<p>Below you should enter database connection details,please carefully fill all field.</p>
		<form action="{{route('step-two-back')}}" method="POST">
			{{csrf_field() }}

	
     
     <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">Username*</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="username" required>
        
       </div>
       <label class="col-sm-4 b14">Username as Super Admin</label>
    </div>
     <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">Password*</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="password" >
        
       </div>
       <label class="col-sm-4 b14">Password and remember this</label>
    </div>
     <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">Email Address *</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="email" required>
        
       </div>
       <label class="col-sm-4 b14">Your Email Address</label>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">Employee ID*</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="employee_id" required>
        
       </div>
       <label class="col-sm-4 b14">Employee ID</label>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">Shift Start*</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="shift_start" id="shift_start" required>
        
       </div>
       <label class="col-sm-4 b14">Shift Start</label>
    </div>
     <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">Shift End*</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="shift_end" id="shift_end" required>
        
       </div>
       <label class="col-sm-4 b14">Shift End</label>
    </div>

    
   
     
    
     
    <button type="submit" class="btn btn-default">Finished</button>
    @if(session()->has('step-two'))
	   <a class="btn btn-info" style="color: #fff;font-weight: bold;">Step Two</a>
	 @endif
  </form>
	</div>
	@else
	<div class="error-body">
		<p>Already Installed</p>
	</div>
	@endif
<script src="{{ asset('public/js/jquery-ui.min.js') }}"></script> 
<script src="{{asset('public/js/jquery-ui-timepicker-addon.js') }}"></script>
<script type="text/javascript">
	$("#shift_start").timepicker({
                    timeFormat: 'hh:mm tt'
                });
     $("#shift_end").timepicker({
                    timeFormat: 'hh:mm tt'
            });
</script>	
</body>
</html>