@extends('layouts.manager')
@section('body')

<div class="row">
    <div class="span12">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Employee Info</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
               <div class="row">
                   <div class="span3" style="padding:10px; font-family: Impact, Charcoal, sans-serif;font-size: 22px;">
                    @if($em->image_preview_location!=null)
                       <img src="{{asset('storage/app/'.$em->image_preview_location)}}" height="200px" width="200px">
                    @else
                      <img src="{{asset('public/img/blank-profile.png')}}" height="200px" width="200px">
                    @endif
                       <label>Name</label>
                       <input type="text" name="" placeholder="Name" value="{{$em->user->name}}">
                       <label>ID</label>
                       <input type="text" name="" placeholder="ID" value="{{$em->employee_id}}">
                   </div>
                   <div class="span2 mr100">
                       <label>Workday(hours)</label>
                       <input type="text" name="" class="span2" value="{{$current_salary->hours_worked/3600}}">
                   </div>
                   <div class="span2 mr100">
                       <label>Overtime(hours)</label>
                       <input type="text" name="" class="span2" value="{{$current_salary->overtime/3600}}">
                   </div>
                   <div class="span2 mr100">
                       <label>Leave-days(hours)</label>
                       <input type="text" name="" class="span2" value="{{$shift_time*$lv->leaves}}">
                   </div>
                   <div class="span2 mr100">
                       <label>Subsides</label>
                       <input type="text" name="" class="span2">
                   </div>
               </div>
            </div>
         </div>
    </div>
</div>
<div class="row">
	<div class="span12">
		<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Working Days</h3>
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
        scrollX:true,
        scrollY:true,
    });

    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        scrollX:true,
        scrollY:true,
    });
} );
</script>
@endsection
@endsection