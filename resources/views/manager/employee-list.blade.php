@extends('layouts.manager')
@section('body')


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
                <th>Employee ID</th>
                <th>Account</th>
                <th>Gender</th>
                <th>Email </th>
                <th>Department</th>
                <th>Designation</th>
                <th>Role </th>
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
                <th></th>
                
            </tr>
        </tfoot>
        <tbody>
        @foreach($employee as $em)
            <tr>
                <td>{{$em->employee_id}}</td>
                <td>{{$em->user->name}}</td>
                <td>{{$em->gender}}</td>
                <td>{{$em->user->email}}</td>
                <td>
                    {{$em->department}}
                </td>
                <td>{{$em->designation}}</td>
                <td>
                    @if(DB::table('role_admins')
                             ->where('user_id',$em->user_id)
                             ->first()->role_id === 3)
                             {{"Employee"}} 
                    @elseif(DB::table('role_admins')
                             ->where('user_id',$em->user_id)
                             ->first()->role_id === 2)
                             {{"Manager"}} 
                    @else
                             {{"Admin"}}
                    @endif
                </td>
                <td>
				<div class="controls">
				<div class="btn-group">
				<a class="btn btn-success" href="#"><i class="icon-plus icon-white"></i> Action</a>
				 <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				    <ul class="dropdown-menu" style="min-width:100px;">
				        <li><a href="{{route('edit-employee',$em->id)}}"><i class="icon-pencil"></i> Edit/View</a></li>
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