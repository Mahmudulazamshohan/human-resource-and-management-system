@extends('layouts.admin')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Add Leave Pay</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-leave-pay')}}" method="POST">
							{{ csrf_field() }}
						 <div class="control-group">

						<label class="control-label" for="user_id">Employee ID</label>
						<div class="controls">
						<select class="span7" id="user_id" name="user_id">
							@foreach($employee as $em)
							  <option value="{{$em->user_id}}">{{$em->employee_id}}</option>
							@endforeach
						</select>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="hourly_salary">Hourly Deduction Amount</label>
						<div class="controls">
						<input type="text" class="span7" id="hourly_salary" placeholder="Hourly Amount" name="hourly_salary">
						</div> <!-- /controls -->				
						</div>


						

						<button class="btn btn-primary">Submit</button>	
						<a href="" class="btn btn-danger">Cancel</a>
						</div>
						</form>
						
					</div>
				</div>
				
      		
      		
      		
		      		
	   </div>
	   
	   
</div>
<div class="row">
	<div class="span12">
		<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Leave Pay Deduction</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            	<table id="example" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Hourly Deduction</th>
             
                <th>Action</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
             
                <th></th>
                <th></th>
                <th></th>
                
                
            </tr>
        </tfoot>
        <tbody>
          @foreach($leave_pay as $lp)
            <tr style="text-align: center;">
              
           
                <td>{{$lp->employee->employee_id}}</td>
                <td>{{$lp->user->name}}</td>
                <td>{{$lp->hourly_salary}}</td>
                <td style="float: right;">
				<div class="controls">
				<div class="btn-group">
				<a class="btn btn-success" href="#"><i class="icon-plus icon-white"></i> Action</a>
				<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu" style="min-width:100px;">
				  <li><a href=""><i class="icon-pencil"></i> Edit</a></li>	
				  <li><a href=""><i class="icon-trash"></i> Delete</a></li>
				</ul>
				</div>
				</div>
                 </td>
            </tr>
        @endforeach
        
           
           
        </tbody>
    </table>
            </div>
         </div>
	</div>
</div>
@section('scripts')

<script type="text/javascript">
	$('#user_id').select2();
	$(document).ready(function() {
    $('#example').DataTable({
    	scrollX:true,
        scrollY: 200
    });
} );
</script>
@endsection
@endsection