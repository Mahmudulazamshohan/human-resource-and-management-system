@extends('layouts.manager')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Health Insurances</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-health-insurances')}}" method="POST">
							{{ csrf_field() }}
						 <div class="control-group">											
							
						<label class="control-label" for="title">Employee ID</label>
						<div class="controls">
						<select class="span7" name="user_id" id="user_id">
                            @foreach($em as $e)
                             <option value="{{$e->user_id}}">{{$e->employee_id}}</option>    
                            @endforeach              
                        </select>
						</div> <!-- /controls -->	

						</div>
						<div class="control-group">											
						<label class="control-label" for="employee_social_number">Employee Social Security Number</label>
						<div class="controls">
						<input type="text" class="span7" id="employee_social_number" placeholder="Employee Social Security Number" name="employee_social_number">
						</div> <!-- /controls -->				
						</div>

						<div class="control-group">											
						<label class="control-label" for="amount">Amount</label>
						<div class="controls">
						<input type="text" class="span7" id="amount" placeholder="Amount" name="amount">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="date">Date</label>
						<div class="controls">
						<input type="text" class="span7" id="date" placeholder="Date" name="date">
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
              <h3>Health Insurances</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            	<table id="example" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Employee Social Security Number</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                
            </tr>
        </tfoot>
        <tbody>
         @foreach($hl as $h)
            <tr>

                <td>{{$h->employee->employee_id}}</td>
                <td>{{$h->user->name}}</td>
                <td>{{$h->employee_social_number}}</td>
                <td>{{$h->date}}</td>
                <td>{{$h->amount}}</td>
                <td>
				<div class="controls">
				<div class="btn-group">
				<a class="btn btn-success" href="#"><i class="icon-plus icon-white"></i> Action</a>
				<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu">
				
				<li><a href="{{route('delete-health-insurances',$h->id)}}"><i class="icon-trash"></i> Delete</a></li>
			
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
	$('#date').datepicker();
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