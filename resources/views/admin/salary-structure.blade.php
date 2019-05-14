@extends('layouts.admin')
@section('body')


<div class="row" style="margin-bottom: 10%;">
	<div class="span12">
		<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Employee List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            	<table id="example" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr style="text-align: left;">
                <th>Employee ID</th>
                <th>Name</th>
                <th>Month</th>
                <th>Workday(hours)</th>
                <th>Overtime(hours)</th>
                <th>Tardiness</th>
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
           @foreach($salary as $s)
            <tr>
                
                <td>{{ $s->employee_id }}</td>
                <td>{{ $s->name }}</td>
                <td>{{$s->month }}</td>
                <td>{{ floor($s->hour_worked/3600) }} hours {{($s->hour_worked/ 60) % 60}} minutes</td>
                <td>{{ floor($s->overtime/3600) }} hours {{($s->overtime/ 60) % 60}} minutes</td>
                <td>{{$s->tardiness/3600}} hours {{($s->tardiness/ 60) % 60}} minutes</td>
                <td>
				<div class="controls">
				<div class="btn-group">
				<a class="btn btn-success" href="#"><i class="icon-plus icon-white"></i> Action</a>
				 <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				    <ul class="dropdown-menu" style="min-width:90px;">
				        <li><a href="{{route('view-salary-structure',$s->user_id)}}"><i class="icon-eye-open"></i> View/Details</a></li>
				        
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
	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        scrollY:true,
        scrollX:200,
    });
} );
</script>
@endsection
@endsection