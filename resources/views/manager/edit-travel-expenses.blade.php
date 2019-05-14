@extends('layouts.manager')
@section('body')
@if($tr)
<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Travel Expences</h3>
	  				</div> 
					<div class="widget-content">
						<div class="container">
						<form action="{{route('update-travel-expenses')}}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
						 <div class="control-group">											
							
						<label class="control-label" for="title">Employee ID</label>
						<div class="controls">
						<select class="span7" name="user_id" id="user_id">
                            @foreach($em as $e)
                              @if($e->user_id  == $tr->user_id)
                               <option value="{{$e->user_id}}" selected>{{$e->employee_id}}</option>  
                              @else
                              <option value="{{$e->user_id}}">{{$e->employee_id}}</option> 
                              @endif  
                            @endforeach              
                        </select>
						</div> <!-- /controls -->				
						</div>
                        <div class="control-group">                                         
                        <label class="control-label" for="date">Date</label>
                        <div class="controls">
                        <input class="span7" id="date" placeholder="Date" name="date" value="{{$tr->date}}">
                        </div> <!-- /controls -->               
                        </div>
                        <div class="control-group">                                         
                        <label class="control-label" for="amount">Amount</label>
                        <div class="controls">
                        <input class="span7" id="amount" placeholder="Amount" name="amount" value="{{$tr->amount}}">
                        </div> <!-- /controls -->               
                        </div>
						<div class="control-group">											
						<label class="control-label" for="comment">Comment</label>
						<div class="controls">
						<textarea class="span7" id="comment" placeholder="Comment" name="comment" style="min-height: 100px;">{{$tr->comment}}</textarea>
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