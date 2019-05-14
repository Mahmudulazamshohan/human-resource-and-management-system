<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Step One</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
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
		<form action="{{route('step-one-back')}}" method="POST">
			{{csrf_field() }}

	<div class="form-group row">
	<label for="inputEmail3" class="col-sm-3 col-form-label">App Url *</label>
	<div class="col-sm-5">
	<input type="text" class="form-control" name="app_url" required>

	</div>
	<label class="col-sm-4 b14">Domain name</label>
	</div>
     <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">Database Name*</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="database_name" required>
        
       </div>
       <label class="col-sm-4 b14">The name of database</label>
    </div>
     <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">Username*</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="username" required>
        
       </div>
       <label class="col-sm-4 b14">Your database username</label>
    </div>
     <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">Password*</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="password" >
        
       </div>
       <label class="col-sm-4 b14">Your database password</label>
    </div>
     <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">Database Host *</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="database_host" required>
        
       </div>
       <label class="col-sm-4 b14">Database host IP address</label>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">Mail Host*</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="mail_host" required>
        
       </div>
       <label class="col-sm-4 b14">Mail smtp host</label>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">Mail Port*</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="mail_port" required>
        
       </div>
       <label class="col-sm-4 b14">Mail port address</label>
    </div>
     <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">Mail Username*</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="mail_username" required>
        
       </div>
       <label class="col-sm-4 b14">Mail server username</label>
    </div>
     <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">Mail Password*</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" name="mail_password" required>
        
       </div>
       <label class="col-sm-4 b14">Mail smtp password</label>
    </div>
     
    <button type="submit" class="btn btn-default">Submit</button>
    @if(session()->has('step-two'))
	   <a href="{{route('step-two')}}" class="btn btn-info" style="color: #fff;font-weight: bold;">Step Two</a>
	 @endif
  </form>
	</div>
	@else
	<div class="error-body">
		<p>Already Installed</p>
	</div>
	@endif
	
</body>
</html>