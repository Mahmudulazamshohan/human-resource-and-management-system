@extends('layouts.employee')
@section('body')

<div class="row" style="margin-bottom: 10%;">
	   
	   <div class="span12">
         <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-user"></i>
                        <h3>Profile</h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">
                        <form action="{{route('employee/update-profile')}}" method="POST">
                            {{csrf_field()}}
                        <div class="control-group">                                         
                        <label class="control-label" for="name">Name</label>
                        <div class="controls">
                        <input type="text" class="span7" id="name" placeholder="Name" name="name" value="{{Auth::user()->name}}">
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" for="email">Email</label>
                        <div class="controls">
                        <input type="text" class="span7" id="email" placeholder="Email" name="email" value="{{Auth::user()->email}}" disabled>
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" for="name">New Password</label>
                        <div class="controls">
                        <input type="text" class="span7" id="name" placeholder="New Password" name="password" value="">
                        </div> <!-- /controls -->               
                        </div>
                        <button class="btn btn-success">Submit</button> 
                        <a href="" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
                </div>
       </div>
 
</div>

@endsection