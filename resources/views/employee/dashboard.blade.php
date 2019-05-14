@extends('layouts.employee')
@section('body')

<div class="row">
	   
	   <div class="span3">
        <div class="frame brtop" >
        	<div class="frame-body">
        		@if($employee->image_preview_location!=null)
        		
        		  <img src="{{asset('storage/app/'.$employee->image_preview_location)}}" class="img-circle">
        		@else
        		  <img src="{{asset('public/img/default.jpg')}}" class="img-circle">
        		@endif
        		<h3>Name: {{$employee->user->name}}</h3>
        		<p>Department: {{$employee->department}}</p>
        		<p>Employee ID: {{$employee->employee_id}}</p>
        		<hr>
        		<div class="flex-items ">
        			<div class="items pd10">
        				<div class="box">
        					<p class="txt">{{ $leaves }}</p>
        					<p>Leave</p>
        				</div>
        			</div>
        			<div class="items pd10">
        				<div class="box">
        					<p class="txt">{{ $awards }}</p>
        					<p>Awards</p>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="frame">
        	<div class="frame-body">
        	  <div class="clock" style="background:url('{{asset('public/css/images/clock-back.jpeg')}}');background-repeat: no-repeat;background-position: right;">
        	  	 <h1 class="year" id="year"></h1>
        	  	 <div class="clock-text" id="clock-text"></div>
        	  </div>
        	</div>
        </div>
	   
		   
      </div>
   <div class="span4">
	 <div class="frame brtop">
        	<div class="frame-body">
        	  <div class="header">Personal Details</div>
        	   <ul class="list">
        	   	 <li>
        	   	   <i class="icon-gift"></i> Birthday: 
                     @if($employee->date_of_birth!=null) 
                       {{$employee->date_of_birth}}
                     @else
                       Null
                     @endif
        	   	 </li>
        	   	 <li>
                    <i class="icon-check-empty"></i> Gender: 
                     @if($employee->gender!=null) 
                       {{$employee->gender}}
                     @else
                       Null
                     @endif
        	   	 </li>
        	   	 <li>
                    <i class="icon-gift"></i> Email: 
                     @if($employee->user->email!=null) 
                       {{$employee->user->email}}
                     @else
                       Null
                     @endif
        	   	 </li>
        	   	 
        	   	 <li>
                    <i class="icon-phone"></i> Cellphone: 
                     @if($employee->phone_number!=null) 
                       {{$employee->phone_number}}
                     @else
                       Null
                     @endif
        	   	 </li>
        	   	 <li>
                    <i class="icon-map-marker"></i> Local Address: 
                     @if($employee->date_of_birth!=null) 
                       {{$employee->local_address}}
                     @else
                       Null
                     @endif
        	   	 </li>
        	   	 <li>
                    <i class="icon-map-marker"></i> Permanent Address: 
                     @if($employee->date_of_birth!=null) 
                       {{$employee->permanent_address}}
                     @else
                       Null
                     @endif
        	   	 </li>
        	   	 
        	   	
        	   </ul>
        	</div>
     </div>
      <div class="frame brtop">
        	<div class="frame-body">
        	  <div class="header">Company Details</div>
        	   <ul class="list">
        	   	 <li><i class="icon-user"></i> Employee ID: 
                     @if($employee->employee_id!=null) 
                       {{$employee->employee_id}}
                     @else
                       Null
                     @endif
                 </li>
        	   	 <li><i class=" icon-briefcase"></i> Department: 
                     @if($employee->department!=null) 
                       {{$employee->department}}
                     @else
                       Null
                     @endif
                 </li>
        	   	 <li><i class="icon-th-list"></i> Designation: 
                     @if($employee->designation!=null) 
                       {{$employee->designation}}
                     @else
                       Null
                     @endif
                 </li>
        	   	 <li><i class="icon-calendar"></i> Date Hired: 
                     @if($employee->date_of_joining!=null) 
                       {{$employee->date_of_joining}}
                     @else
                       Null
                     @endif
                 </li>
        	   	 <li><i class="icon-credit-card"></i> Salary: 
                     @if($employee->date_of_birth!=null) 
                       {{$employee->joining_salary}}
                     @else
                       Null
                     @endif
                 </li>
        	   	 
        	   </ul>
        	</div>
     </div>
     <div class="frame brtop">
        	<div class="frame-body">
        	  <div class="header">Bank Details</div>
        	   <ul class="list">
        	   	 <li><i class="icon-credit-card"></i> Account Name:
                     @if($employee->account_holder_name!=null) 
                       {{$employee->account_holder_name}}
                     @else
                       Null
                     @endif
                 </li>
        	   	 <li><strong>#</strong> Account Number:
                     @if($employee->account_number!=null) 
                       {{$employee->account_number}}
                     @else
                       Null
                     @endif
                 </li>
        	   	 <li><i class=" icon-home"></i> Bank Name:
                     @if($employee->bank_name!=null) 
                       {{$employee->bank_name}}
                     @else
                       Null
                     @endif
                 </li>
        	   	 
        	   </ul>
        	</div>
     </div>
   </div>
   <div class="span5">
   	 <div class="frame brtop">
        	<div class="frame-body">
        		 <div class="header"><i class="icon-bell"></i> Announcement</div>
        	     <ul class="list-notice">
                    
            @foreach($an as $a)
        	   	 <li>
                    <div class="flex-items">
                        <p style="text-align: left; font-weight: bold;">{{$a->title}}</p>  
                        <p style="text-align: left;padding-right: 4px; font-weight: bold;">{{substr($a->description,0,50).'.....'}}</p>  
                        <p style="text-align: left;font-weight: bold;color:blue;">{{$a->updated_at}}</p>
                        <a href="{{route('employee/announcement',$a->id)}}" class="btn btn-small btn-success" style="max-height: 25px;"><i class="icon-eye-open"></i></a>
                    </div>
                   
                 </li>   
            @endforeach
        	     </ul>
        	</div>
        </div>
       
   </div>
</div>
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock-text').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
    document.getElementById('year').innerHTML = new Date();
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
startTime();
</script>
@endsection