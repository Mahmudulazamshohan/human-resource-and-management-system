@extends('layouts.manager')
@section('body')

<div class="row">
	   
	   <div class="span12">
       
          <div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-plus"></i>
	      				<h3>Salary Type</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div class="container">
						<form action="{{route('store-salary-type')}}" method="POST">
							{{ csrf_field() }}
						 <div class="control-group">											
							
						<label class="control-label" for="hourly_salary">Hourly Salary</label>
						<div class="controls">
						<input type="text" class="span7" id="hourly_salary" placeholder="Hourly Salary" name="hourly_salary">
						</div> <!-- /controls -->				
						</div>
						<div class="control-group">											
							
						<label class="control-label" for="weekly_salary">Weekly Salary</label>
						<div class="controls">
						<input type="text" class="span7" id="weekly_salary" placeholder="Weekly Salary" name="weekly_salary">
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
              <h3>Salary Type</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
              
                <th>Hourly Salary</th>
                <th>Weekly Salary</th>
               
                <th>Action</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
         
               
                <th></th>
                <th></th>
                <th></th>
                
            </tr>
        </tfoot>
        <tbody>
           @foreach($salary_type as $st)
            <tr>
                
                <td>{{$st->hourly_salary}}</td>
                <td>{{$st->weekly_salary}}</td>
                <td>
				<a href="{{route('edit-salary-type',$st->id)}}" class="btn btn-small btn-primary">
					<i class="btn-icon-only icon-pencil"> </i>
				</a>
					<a href="{{route('delete-salary-type',$st->id)}}" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i>
				</a>
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
// 	$(document).ready(function() {
//     $('#example').DataTable();
// } );
</script>
@endsection
@endsection