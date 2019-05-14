@extends('layouts.manager')
@section('body')
@if($employee)
<form action="{{route('update-employee')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{$id}}">
<div class="row">
      {{--  Spanstart --}}
       <div class="span6">
       
          <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-plus"></i>
                        <h3>Personal Details</h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">
                        <div class="container">
                       
                           
                         <div class="control-group">                                            
                            
                        <label class="control-label" for="name">Name <i class="icon-asterisk icon-sm"></i></label>
                        <div class="controls">
                        <input type="text" class="span5" id="name" placeholder="Name" name="username" value="{{ $employee->user->name }}">
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" for="designation">Father's Name</label>
                        <div class="controls">
                        <input type="text" class="span5" id="designation"  name="father_name" 
                        @if($employee->father_name!= null)
                        value="{{ $employee->father_name }}" 
                        @else 
                        placeholder="Null"
                        @endif
                        >
                        </div> <!-- /controls -->               
                        </div>
                         <div class="control-group">                                         
                        <label class="control-label" for="date_of_birth">Date of Birth</label>
                        <div class="controls">
                        <input type="text" class="span5" id="date_of_birth" name="date_of_birth"
                        @if($employee->date_of_birth!= null)
                        value="{{ $employee->date_of_birth }}" 
                        @else 
                        placeholder="Null"
                        @endif
                        >
                        </div> <!-- /controls -->               
                        </div>

                         <div class="control-group">                                         
                        <label class="control-label" for="designation">Gender</label>
                        <div class="controls">
                        <select name="gender">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" for="designation">Phone Number</label>
                        <div class="controls">
                        <input type="text" class="span5" id="designation" name="phone_number"
                        @if($employee->phone_number!= null)
                        value="{{ $employee->phone_number }}" 
                        @else 
                        placeholder="Null"
                        @endif
                        >
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" >Local Address</label>
                        <div class="controls">
                        <textarea class="span5"  name="local_address" style="height: 50px;">
                            @if($employee->local_address)
                             {{$employee->local_address}}
                            @endif
                        </textarea>
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" >Permanent Address</label>
                        <div class="controls">
                        <textarea class="span5" name="permanent_address" style="height: 50px;">
                             @if($employee->permanent_address)
                              {{$employee->permanent_address}}
                              @endif
                        </textarea>
                        </div> <!-- /controls -->               
                        </div>
                     
                        </div>
                      

                        
                    </div>
                </div>
                
            
            
             <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-plus"></i>
                        <h3>Company Details</h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">
                        <div class="container">  
                    
                         <div class="control-group">                                            
                            
                        <label class="control-label" for="department">Employee ID <i class="icon-asterisk icon-sm"></i></label>
                        <div class="controls">
                        <input type="text" class="span5" id="department"  name="employee_id"
                        @if($employee->employee_id!= null)
                        value="{{ $employee->employee_id }}" 
                        @else 
                        placeholder="Null"
                        @endif
                         disabled 
                        >
                        </div> <!-- /controls -->               
                        </div>
    

                         <div class="control-group">                                         
                        <label class="control-label" for="designation">Department</label>
                        <div class="controls">
                        <select class="option-auto" style="width: 40.55344070278184%;" id="department-section" name="department" disabled >
                        @foreach($department as $dp)

                          <option value="{{$dp->department}}">{{ $dp->department }}</option>

                        @endforeach
                        </select>
                        </div> <!-- /controls -->               
                        </div>
                         <div class="control-group">                                         
                        <label class="control-label" for="designation">Designation</label>
                        <div class="controls">
                        <select id="designation-section" style="width: 40.55344070278184%;" name="designation" disabled >
                          <option>{{$employee->designation}}</option>
                        </select>
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" for="designation">Date of joining</label>
                        <div class="controls">
                        <input type="text" class="span5" id="date_of_birth2"  name="date_of_joining"
                        @if($employee->date_of_joining!= null)
                        value="{{ $employee->date_of_joining }}" 
                        @else 
                        placeholder="Null"
                        @endif
                        >
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" for="designation">Joining Salary</label>
                        <div class="controls">
                        <input type="text" class="span5" id="designation"  name="joining_salary"
                        @if($employee->joining_salary!= null)
                        value="{{ $employee->joining_salary }}" 
                        @else 
                        placeholder="Null"
                        @endif
                        >
                        </div> <!-- /controls -->               
                        </div>
                      
                        </div>
                       

                        
                    </div>
                </div>
                    
       </div>
       {{--   SpanEnd --}}
       {{-- SpanStart --}}    
       <div class="span6">
           <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-plus"></i>
                        <h3>Account Login</h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">
                         <div class="container">
                        
                            
                         
                        <div class="control-group">                                         
                        <label class="control-label" for="email">Email  <i class="icon-asterisk icon-sm"></i></label>
                        <div class="controls">
                        <input type="text" class="span5" id="email" placeholder="Email" name="email"
                        @if($employee->user->email!= null)
                        value="{{ $employee->user->email }}" 
                        @else 
                        placeholder="Null"
                        @endif
                        disabled 
                        >
                        </div> <!-- /controls -->               
                        </div>
                         <div class="control-group">                                         
                        <label class="control-label" for="designation">New Password <i class="icon-asterisk icon-sm"></i></label>
                        <div class="controls">
                        <input type="text" class="span5" id="designation" placeholder="Enter new password" name="password" disabled="">
                        </div> <!-- /controls -->               
                        </div>

                         <div class="control-group">                                         
                        <label class="control-label" for="designation">User Role <i class="icon-asterisk icon-sm"></i></label>
                        <div class="controls">
                        <select class="option-auto" style="width: 40.55344070278184%;" name="user_role" disabled="">
                          <option value="3">Employee</option>
                          <option value="2">Manager</option>
                          <option value="1">Admin</option>
                          
                        </select>
                        </div> <!-- /controls -->               
                        </div>
                      
                        </div>
                    
                    </div>
          </div>

          <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-plus"></i>
                        <h3>Upload</h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">
                         <div class="container">
                            <div style="display: grid;">
                               <input type="file" name="image_file" id="image_preview" class="custom-file-input" style="height: 38px;" accept="image/png, image/jpeg, image/gif">
                                   @if($employee->image_preview_location!=null)
                                    <img src="{{asset('storage/app/'.$employee->image_preview_location)}}" id="preview_image" width="200px" >

                                   @else
                                     <img src="{{asset('public/img/blank-profile.png')}}" id="preview_image" width="200px" >
                                   @endif
                                  

                            </div>
                            <div style="margin-top: 10px;"><a href="{{asset('storage/app/'.$employee->image_preview_location)}}" class="btn btn-download" download="" style="background: #01579b;color: #fff;">Download</a></div>
                            
                       
                         </div>
                   </div>
      </div>
       <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-plus"></i>
                        <h3>Bank Account Details</h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">
                         <div class="container">
                            
                            <div class="control-group">                                         
                            <label class="control-label" for="account_holder">Account Holder Name </label>
                            <div class="controls">
                            <input type="text" class="span5" id="account_holder"  name="account_holder_name"
                            @if($employee->account_holder_name!= null)
                            value="{{ $employee->account_holder_name }}" 
                            @else 
                            placeholder="Null"
                            @endif
                            >
                            </div> <!-- /controls -->               
                            </div>

                             <div class="control-group">                                         
                        <label class="control-label" >Account Number</label>
                        <div class="controls">
                        <input type="text" class="span5" 
                         name="account_number"
                            @if($employee->account_number!= null)
                            value="{{ $employee->account_number }}" 
                            @else 
                            placeholder="Null"
                            @endif
                         >
                        </div> <!-- /controls -->               
                        </div>
                         <div class="control-group"> 

                        <label class="control-label" for="bank_number">Bank Name </label>
                        <div class="controls">
                        <input type="text" class="span5" id="bank_number" placeholder="Bank Number" name="bank_name"
                            @if($employee->bank_name!= null)
                            value="{{ $employee->bank_name }}" 
                            @else 
                            placeholder="Null"
                            @endif
                        >
                        </div> <!-- /controls -->               
                        </div>
                         <div class="control-group">                                         
                        <label class="control-label" for="ifsc_code">IFSC Code </label>
                        <div class="controls">
                        <input type="text" class="span5" id="ifsc_code" 
                         name="ifsc_code"
                           @if($employee->ifsc_code!= null)
                            value="{{ $employee->ifsc_code }}" 
                            @else 
                            placeholder="Null"
                            @endif

                         >
                        </div> <!-- /controls -->               
                        </div>
                         <div class="control-group">                                         
                        <label class="control-label" for="pan_number">Pan Number </label>
                        <div class="controls">
                        <input type="text" class="span5" id="pan_number" 
                         name="pan_number"
                         @if($employee->pan_number!= null)
                            value="{{ $employee->pan_number }}" 
                            @else 
                            placeholder="Null"
                            @endif  
                         >
                        </div> <!-- /controls -->               
                        </div>
                         <div class="control-group">                                         
                        <label class="control-label" for="branch">Branch </label>
                        <div class="controls">
                        <input type="text" class="span5" id="branch" 
                         name="branch"
                            @if($employee->branch!= null)
                            value="{{ $employee->branch }}" 
                            @else 
                            placeholder="Null"
                            @endif
                         >
                        </div> <!-- /controls -->               
                        </div>
                       
                         </div>
                   </div>
      </div>
       </div>
    {{--    Spanend --}}
       
       
</div>
<div class="row">
   {{--  SpanStart --}}
       <div class="span12">
             <div class="widget ">
                    
                    <div class="widget-header">
                        <i class="icon-plus"></i>
                        <h3>Documents</h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">
                         <div class="container">
                        <div class="control-group file-back">                                    
                        <label class="control-label" for="resume">Resume (Pdf/Doc) </label>
                        <div class="controls">
                        <input type="file" class="span5 custom-file-input" id="resume" name="resume" style="height: 38px;"> 
                         <a 
                        @if($employee->resume_location!=null)
                        href="{{asset('storage/app/'.$employee->resume_location)}}"
                        @else
                        href="#"
                        @endif
                            class="btn btn-download" style="background: #01579b;color: #fff;">Download</a>
                        </div> <!-- /controls -->               
                        </div>
                       

                        <div class="control-group file-back">                                    
                        <label class="control-label" for="offer_letter">Offer Letter (Pdf/Doc) </label>
                        <div class="controls">
                        <input type="file" class="span5 custom-file-input" id="offer_letter" name="offer_letter" style="height: 38px;">
                          <a 
                        @if($employee->resume_location!=null)
                        href="{{asset('storage/app/'.$employee->offer_letter_location)}}"
                         @else
                        href="#"
                        @endif
                            class="btn btn-download" style="background: #01579b;color: #fff;">Download</a>
                        </div> <!-- /controls -->               
                        </div>

                        <div class="control-group file-back">                                    
                        <label class="control-label" for="joining_letter">Joining Letter (Pdf/Doc) </label>
                        <div class="controls">
                        <input type="file" class="span5 custom-file-input" id="joining_letter" name="joining_letter" style="height: 38px;">
                         <a 
                        @if($employee->resume_location!=null)
                        href="{{asset('storage/app/'.$employee->joining_letter_location)}}"
                         @else
                        href="#"
                        @endif   
                            class="btn btn-download" style="background: #01579b;color: #fff;">Download</a>
                        </div> <!-- /controls -->               
                        </div>

                        <div class="control-group file-back">                                    
                        <label class="control-label" for="designation">Contract and Agreement (Pdf/Doc)</label>
                        <div class="controls">
                        <input type="file" class="span5 custom-file-input"  name="contract_and_agreement" style="height: 38px;">
                        <a 
                        @if($employee->resume_location!=null)
                        href="{{asset('storage/app/'.$employee->id_proof_location)}}"
                         @else
                        href="#"
                        @endif
                            class="btn btn-download" style="background: #01579b;color: #fff;">Download</a>
                        </div> <!-- /controls -->               
                        </div>

                        <div class="control-group file-back">                                    
                        <label class="control-label" for="designation">ID Proof (Pdf/Doc) </label>
                        <div class="controls">
                        <input type="file" class="span5 custom-file-input"  name="id_proof" style="height: 38px;">
                         <a 
                         @if($employee->resume_location!=null)
                         href="{{asset('storage/app/'.$employee->id_proof_location)}}"
                        @else
                        href="#"
                        @endif
                          class="btn btn-download" style="background: #01579b;color: #fff;" download="">Download</a>
                        </div> <!-- /controls -->               
                        </div> 
                       
                         </div>
                   </div>
          </div>
               <button type="submit" class="btn btn-success">Update</button>
       </div>
       
</div>
</form>
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
    $( "#date_of_birth" ).datepicker();
    $('#date_of_birth2').datepicker();
    $('#department-section').change(function(e) {
       var v = document.getElementById('designation-section');
       $.get('{{route('api-designation')}}', {_token:'{{csrf_token()}}',department:this.value}, function(data, textStatus, xhr) {
            
             v.innerHTML =data;

       });
      
       
    });
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#preview_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image_preview").change(function(){
        readURL(this);
    });

    $(".option-auto").select2();
    $('.option-auto').change(function(event) {
        
    });
	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
 
</script>
@endsection
@endsection