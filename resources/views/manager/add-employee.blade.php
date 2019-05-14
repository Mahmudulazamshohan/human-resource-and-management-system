@extends('layouts.manager')
@section('body')

<form action="{{route('store-employee')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
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
                        <input type="text" class="span5" id="name" placeholder="Name" name="username">
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" for="designation">Father's Name</label>
                        <div class="controls">
                        <input type="text" class="span5" id="designation" placeholder="Father's Name" name="father_name">
                        </div> <!-- /controls -->               
                        </div>
                         <div class="control-group">                                         
                        <label class="control-label" for="date_of_birth">Date of Birth</label>
                        <div class="controls">
                        <input type="text" class="span5" id="date_of_birth" name="date_of_birth">
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
                        <input type="text" class="span5" id="designation" name="phone_number">
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" >Local Address</label>
                        <div class="controls">
                        <textarea class="span5"  name="local_address" style="height: 50px;"></textarea>
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" >Permanent Address</label>
                        <div class="controls">
                        <textarea class="span5" name="permanent_address" style="height: 50px;"></textarea>
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
                        <input type="text" class="span5" id="department" placeholder="Name" name="employee_id">
                        </div> <!-- /controls -->               
                        </div>
    

                         <div class="control-group">                                         
                        <label class="control-label" for="designation">Department</label>
                        <div class="controls">
                        <select class="option-auto" style="width: 40.55344070278184%;" id="department-section" name="department">
                        @foreach($department as $dp)

                          <option value="{{$dp->department}}">{{ $dp->department }}</option>

                        @endforeach
                        </select>
                        </div> <!-- /controls -->               
                        </div>
                         <div class="control-group">                                         
                        <label class="control-label" for="designation">Designation</label>
                        <div class="controls">
                        <select id="designation-section" style="width: 40.55344070278184%;" name="designation">
                          <option>Designation</option>
                        </select>
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" for="designation">Date of joining</label>
                        <div class="controls">
                        <input type="text" class="span5" id="date_of_birth2"  name="date_of_joining">
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" for="designation">Joining Salary</label>
                        <div class="controls">
                        <input type="text" class="span5" id="designation" placeholder="Current Salary" name="joining_salary">
                        </div> <!-- /controls -->               
                        </div>

                         <div class="control-group">                                         
                        <label class="control-label" for="shift_start">Shift Start <i class="icon-asterisk icon-sm"></i></label>
                        <div class="controls">
                        <input type="text" class="span5" id="shift_start" placeholder="" name="shift_start">
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" for="shift_end">Shift End <i class="icon-asterisk icon-sm"></i></label>
                        <div class="controls">
                        <input type="text" class="span5" id="shift_end" placeholder="" name="shift_end">
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
                        <input type="text" class="span5" id="email" placeholder="Email" name="email">
                        </div> <!-- /controls -->               
                        </div>
                         <div class="control-group">                                         
                        <label class="control-label" for="designation">Password <i class="icon-asterisk icon-sm"></i></label>
                        <div class="controls">
                        <input type="text" class="span5" id="designation" placeholder="Password" name="password">
                        </div> <!-- /controls -->               
                        </div>

                         <div class="control-group">                                         
                        <label class="control-label" for="designation">User Role <i class="icon-asterisk icon-sm"></i></label>
                        <div class="controls">
                        <select class="option-auto" style="width: 40.55344070278184%;" name="user_role">
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
                               
                                   <img src="{{asset('public/img/blank-profile.png')}}" id="preview_image" width="200px" >

                            </div>
                            
                       
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
                            <input type="text" class="span5" id="account_holder" placeholder="Account Holder Name" name="account_holder_name">
                            </div> <!-- /controls -->               
                            </div>

                             <div class="control-group">                                         
                        <label class="control-label" >Account Number </label>
                        <div class="controls">
                        <input type="text" class="span5" placeholder="Account Number" name="account_number">
                        </div> <!-- /controls -->               
                        </div>
                         <div class="control-group"> 

                        <label class="control-label" for="bank_number">Bank Name </label>
                        <div class="controls">
                        <input type="text" class="span5" id="bank_number" placeholder="Bank Number" name="bank_name">
                        </div> <!-- /controls -->               
                        </div>
                         <div class="control-group">                                         
                        <label class="control-label" for="ifsc_code">IFSC Code </label>
                        <div class="controls">
                        <input type="text" class="span5" id="ifsc_code" placeholder="IFSC Code" name="ifsc_code">
                        </div> <!-- /controls -->               
                        </div>
                         <div class="control-group">                                         
                        <label class="control-label" for="pan_number">Pan Number </label>
                        <div class="controls">
                        <input type="text" class="span5" id="pan_number" placeholder="Pan Number" name="pan_number">
                        </div> <!-- /controls -->               
                        </div>
                         <div class="control-group">                                         
                        <label class="control-label" for="branch">Branch </label>
                        <div class="controls">
                        <input type="text" class="span5" id="branch" placeholder="Branch" name="branch">
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
                        </div> <!-- /controls -->               
                        </div>
                       

                        <div class="control-group file-back">                                    
                        <label class="control-label" for="offer_letter">Offer Letter (Pdf/Doc) </label>
                        <div class="controls">
                        <input type="file" class="span5 custom-file-input" id="offer_letter" name="offer_letter" style="height: 38px;">
                        </div> <!-- /controls -->               
                        </div>

                        <div class="control-group file-back">                                    
                        <label class="control-label" for="joining_letter">Joining Letter (Pdf/Doc) </label>
                        <div class="controls">
                        <input type="file" class="span5 custom-file-input" id="joining_letter" name="joining_letter" style="height: 38px;">
                        </div> <!-- /controls -->               
                        </div>

                        <div class="control-group file-back">                                    
                        <label class="control-label" for="designation">Contract and Agreement (Pdf/Doc)</label>
                        <div class="controls">
                        <input type="file" class="span5 custom-file-input"  name="contract_and_agreement" style="height: 38px;">
                        </div> <!-- /controls -->               
                        </div>

                        <div class="control-group file-back">                                    
                        <label class="control-label" for="designation">ID Proof (Pdf/Doc) </label>
                        <div class="controls">
                        <input type="file" class="span5 custom-file-input"  name="id_proof" style="height: 38px;">
                        </div> <!-- /controls -->               
                        </div> 
                       
                         </div>
                   </div>
          </div>
               <button type="submit" class="btn btn-success">Submit</button>
               <a href="" class="btn btn-danger">Cancel</a>
       </div>
       
</div>
</form>
@section('scripts')
<script src="{{asset('public/js/jquery-ui-timepicker-addon.js') }}"></script>
<script type="text/javascript">
   
    $( "#date_of_birth" ).datepicker();
    $('#date_of_birth2').datepicker();
      $("#shift_start").timepicker({
                    timeFormat: 'hh:mm tt'
                });
     $("#shift_end").timepicker({
                    timeFormat: 'hh:mm tt'
            });
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