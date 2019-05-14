@extends('layouts.employee')
@section('body')
@if($an)
<div class="row">
	   
	   <div class="span12">
         <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-bell"></i>
                        <h3>Announcement</h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">
                      <div class="flex-i">
                        @if($an->image_file!=null)
                          <img src="{{asset('storage/app/'.$an->image_file)}}" style="width: 100%; height: auto;">
                        @endif
                          <div class="discription">
                            <h1>Title:{{$an->title}}</h1>
                            @if($an->description)
                              {{$an->description}}
                              @endif
                          </div>
                      </div>  
                        
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
                    Sorry, an error has occured! Why not try going back to the <a href="{{route('employee/dashboard')}}">home page</a> or perhaps try following!
                    
                </div> <!-- /error-details -->
                
                <div class="error-actions">
                    <a href="{{route('employee/dashboard')}}" class="btn btn-large btn-primary">
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
@endsection