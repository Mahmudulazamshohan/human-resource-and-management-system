@extends('layouts.admin')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>New Reward</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-rewards')}}" method="POST">
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
						<label class="control-label" for="award_name">Award Name</label>
						<div class="controls">
						<input type="text" class="span7" id="award_name" placeholder="Award Name" name="award_name">
						</div> <!-- /controls -->				
						</div>

						<div class="control-group">											
						<label class="control-label" for="gift_item">Gift Item</label>
						<div class="controls">
						<input type="text" class="span7" id="gift_item" placeholder="Gift Item" name="gift_item">
						</div> <!-- /controls -->				
						</div>

						<div class="control-group">											
						<label class="control-label" for="cash_price">Cash Price</label>
						<div class="controls">
						<input type="text" class="span7" id="cash_price" placeholder="Cash Price" name="cash_price">
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
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Award Name</th>
                <th>Gift Item</th>
                <th>Cash Price</th>
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
          @foreach($reward as $r)
            <tr>
                <td>{{ $r->employee->employee_id }}</td>
                <td>{{$r->user->name}}</td>
                <td>{{$r->award_name}}</td>
                <td>{{$r->gift_item}}</td>
                <td>{{$r->cash_price}}</td>
                <td>
				<div class="controls">
				<div class="btn-group">
				<a class="btn btn-success" href="#"><i class="icon-plus icon-white"></i> Action</a>
				<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu">
				
				<li><a href="{{route('delete-rewards',$r->id)}}"><i class="icon-trash"></i> Delete</a></li>
			
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