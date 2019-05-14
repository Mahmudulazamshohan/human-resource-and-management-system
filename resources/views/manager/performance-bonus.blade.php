@extends('layouts.manager')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>New Performance Bonus</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-performance-bonus')}}" method="POST">
							{{ csrf_field() }}
						 <div class="control-group">											
							
						<label class="control-label" for="user_id">Employee ID</label>
						<div class="controls">
						<select class="span7"  name="user_id" id="user_id">
							@foreach($employee as $em)
							  <option value="{{$em->user_id}}"> {{$em->employee_id}}</option>
							@endforeach
						</select> 
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="date">Date</label>
						<div class="controls">
						<input type="text" class="span7" id="date" placeholder="" name="date">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="note">Note</label>
						<div class="controls">
						<textarea style="min-height: 70px;" class="span7" id="note" placeholder="" name="note"></textarea>
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="number_of_star">Number of Star</label>
						<div class="controls">
						<input type="text" class="span7" id="number_of_star" placeholder="" name="number_of_star">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
						<label class="control-label" for="bonus_amount">Bonus Amount</label>
						<div class="controls">
						<input type="text" class="span7" id="bonus_amount" placeholder="" name="bonus_amount">
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
              <h3>Department List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">

            	<table id="example" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr style="text-align: left;">
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Number of Star</th>
                <th>Note</th>
                <th>Bonus Amount</th>
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
                <th></th>
                
            </tr>
        </tfoot>
        <tbody>
          @foreach($bonus as $bn)
            <tr>
                <td>{{$bn->employee->employee_id}}</td>
                <td>{{$bn->user->name}}</td>
                <td>{{$bn->date}}</td>
                <td>{{$bn->number_of_star}}</td>
                <td>{{$bn->note}}</td>
                <td>{{$bn->bonus_amount}}</td>
                <td>
				<div class="controls">
				<div class="btn-group">
				<a class="btn btn-success" href="#"><i class="icon-plus icon-white"></i> Action</a>
				<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="{{route('edit-performance-bonus',$bn->id)}}"><i class="icon-pencil"></i> Edit</a></li>
				<li><a href="{{route('delete-performance-bonus',$bn->id)}}"><i class="icon-trash"></i> Delete</a></li>
			
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
    $('#example').DataTable({
    	scrollX:true,
    	scrollY:100,
    });
} );
</script>
@endsection
@endsection