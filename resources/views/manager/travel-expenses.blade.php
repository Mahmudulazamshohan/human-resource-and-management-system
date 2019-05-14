@extends('layouts.manager')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Travel Expences</h3>
	  				</div> 
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-travel-expenses')}}" method="POST" enctype="multipart/form-data">
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
                        <label class="control-label" for="date">Date</label>
                        <div class="controls">
                        <input class="span7" id="date" placeholder="Date" name="date">
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" for="amount">Amount</label>
                        <div class="controls">
                        <input class="span7" id="amount" placeholder="Amount" name="amount">
                        </div> <!-- /controls -->               
                        </div>
						<div class="control-group">											
						<label class="control-label" for="comment">Comment</label>
						<div class="controls">
						<textarea class="span7" id="comment" placeholder="Comment" name="comment" style="min-height: 100px;"></textarea>
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
              <h3>Announcement List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            	<table  {{-- class="display nowrap" --}} 
            	class="display nowrap" width="100%"  style="overflow: auto;" id="example">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Comment</th>
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
           @foreach($trv as $t)
            <tr>
                <td>{{$t->employee->employee_id}}</td>
                <td>{{$t->user->name}}</td>
                <td>{{$t->amount}}</td>
                <td>{{$t->date}}</td>
                <td>{{$t->comment}}</td>
                <td>
                <div class="controls">
                <div class="btn-group">
                <a class="btn btn-success" href="#"><i class="icon-plus icon-white"></i> Action</a>
                 <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu" style="min-width:100px;">
                        <li><a href="{{route('edit-travel-expenses',$t->id)}}"><i class="icon-pencil"></i> Edit</a></li>
                         <li><a href="{{route('delete-travel-expenses',$t->id)}}"><i class="icon-trash"></i> Delete</a></li>
            
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
    $('#date').datepicker();
    $('#user_id').select2();
	$(document).ready(function() {
    $('#example').DataTable( {
        scrollY:300,
        scrollX:true
    } );
} );
</script>
@endsection
@endsection