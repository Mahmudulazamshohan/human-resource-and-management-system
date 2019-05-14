<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/css/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('public/css/font-awesome.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="{{ asset('public/css/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/css/pages/signin.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
    
    <div class="navbar navbar-fixed-top">
    
    <div class="navbar-inner">
        
        <div class="container">
            
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
         

                 <a class="brand" href="">
                   <img src="http://preview.thesoftking.com/thesoftking/hrms/assets/images/logo/1510985988.png" alt="" style="max-width: 100%;height:20px;" />      
                         
                </a> 
         
                  
            
            <div class="nav-collapse">
                <ul class="nav pull-right">
                    
                    <li class="">                       
                        <a href="" class="">
                            Don't have an account?
                        </a>
                        
                    </li>
                    
                    <li class="">                       
                        <a href="{{ route('dashboard') }}" class="">
                            <i class="icon-chevron-left"></i>
                            Back to Homepage
                        </a>
                        
                    </li>
                </ul>
                
            </div><!--/.nav-collapse -->    
    
        </div> <!-- /container -->
        
    </div> <!-- /navbar-inner -->
    
</div> <!-- /navbar -->



<div class="account-container">
    
    <div class="content clearfix">
        
        <form action="{{route('login')}}" method="POST">
            
              <h1 style="font-family: Impact, Charcoal, sans-serif;letter-spacing: 4px;color: #555;">Login</h1>     
            
                {{ csrf_field() }}
            
            <div class="login-fields">
                
                <p>Please provide your details</p>
                @if ($errors->has('email'))
                      <p style="color:red;">{{$errors->first('email')}}</p>
                @endif
                @if ($errors->has('password'))
                      <p style="color:red;">{{$errors->first('password')}}</p>
                @endif
                <div class="field">
                    <label for="username" style="display:">Username</label>
                    <input type="text" id="username" name="email" value="" placeholder="Email" class="login username-field" />
                    
                </div> <!-- /field -->
                
                <div class="field">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
                </div> <!-- /password -->
                
            </div> <!-- /login-fields -->
            
            <div class="login-actions">
                
                <span class="login-checkbox">
                    <input id="Field" name="checkbox" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
                    <label class="choice" for="Field">Keep me signed in</label>
                    
                </span>
                                    
                <button class="button btn btn-success btn-large">Sign In</button>
                
            </div> <!-- .actions -->
            
            
            
        </form>
        
    </div> <!-- /content -->
    
</div> <!-- /account-container -->



 <!-- /login-extra -->


<script src="{{ asset('public/js/jquery-1.7.2.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.js') }}"></script>

<script src="{{ asset('public/js/signin.js') }}"></script>

</body>

</html>
