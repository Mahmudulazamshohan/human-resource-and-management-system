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
                <th>Date</th>
                <th>Attendance</th>
                
                
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                
                <th></th>
                <th></th> 
            </tr>
        </tfoot>
        <tbody>
           @foreach($em as $e)
            <tr>
                <td>{{$e->attendance_date}}</td>
                <td>
                    <button class="btn btn-small btn-success"><i class="icon-ok-sign" style="font-size: 18px;"></i></button>
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