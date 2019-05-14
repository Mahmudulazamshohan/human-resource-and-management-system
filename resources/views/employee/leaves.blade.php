@extends('layouts.employee')
@section('body')


<div class="row" style="margin-bottom: 200px;">
    <div class="span12">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>My Attendances</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <table id="example" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr style="text-align: left;">
                
                <th>Leave Type</th>
                <th>Date From</th>
                <th>Date To</th>
                <th>Total Days</th>
                <th>Applied On</th>
                <th>Reason</th>
                
                
                
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
           @foreach($le as $l)
            <tr>
            	<td>{{$l->leave_type}}</td>
            	<td>{{$l->date_from}}</td>
            	<td>{{$l->date_to}}</td>
            	<td>{{$l->total_days}}</td>
                <td>{{$l->applied_on}}</td>
                <td>
                	{{$l->reason}}
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
    $('#example').DataTable();
});
</script>
@endsection
@endsection