@extends('layouts.admin')
@section('body')
@if($income_tax && $leave_pay && $overtimes &&$salary_type )
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
                       <button  id="calculateBtn" class="btn btn-primary"> Calculate</button>
                   </div>
                   <div class="span2 mr100">
                       <label>Leave-days(hours)</label>
                       <input type="text" name="" class="span2" value="{{$shift_time*($lv->leaves + $absence)}}">
                   </div>
                   <div class="span2 mr100">
                       <label>Subsides</label>
                       <input type="text" name="" class="span2" value="{{$income_tax->percentage}}">
                   </div>
               </div>
            </div>
         </div>
    </div>
</div>



<div class="row" id="payroll-show">
    <div class="span12">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Payroll</h3>
              <button style="float: right;margin-top: 7px;margin-right: 10px;" class="btn btn-success" id="print-payroll">Print</button>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" id="payroll-print">
              <table  class="table table-bordered table-striped" cellspacing="0" width="100%" >
        <thead>
            <tr style="text-align: left;">
                <th>Payroll Category</th>
                <th>Hours</th>
                <th>Hourly Salary / Percentage %</th>
                <th>Total Amount</th> 
            </tr>
        </thead>
        <tfoot>
            <tr>
               
             
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                
            </tr>
        </tfoot>
        <tbody>
          
          @php
            $wkday = floor(($current_salary->hours_worked/3600)*$salary_type->hourly_salary);
            $lvday = floor(($shift_time*($lv->leaves + $absence))*($leave_pay->hourly_salary));
            $overti = floor(($current_salary->overtime/3600)*$overtimes->hourly_salary) ;
            $intax=(($wkday-$lvday+$overti)/100)* $income_tax->percentage ;
            $subTotal = ($wkday-$lvday+$overti)-$intax;
          @endphp
            <tr>
          
                <td>Working Days(Hours)</td>
                <td>{{$current_salary->hours_worked/3600}} hours</td>
                <td>{{$salary_type->hourly_salary}}</td>
                <td>(+) {{$wkday}}</td>
            </tr>
            <tr>
          
                <td>Leave Days(Hours)</td>
                <td>{{$shift_time*($lv->leaves + $absence)}} hours</td>
                <td>{{$leave_pay->hourly_salary}}</td>
                <td>(-) {{$lvday}}</td>
            </tr>
            <tr>
          
                <td>Overtime(Hours)</td>
                <td>{{$current_salary->overtime/3600}} hours</td>
                <td>{{$overtimes->hourly_salary}}</td>
                <td>{{$overti}}</td>
            </tr>
            <tr>
          
                <td>Income Tax(Hours)</td>
                <td></td>
                <td>{{$income_tax->percentage}}% of total amount</td>
                <td>{{$intax}}</td>
            </tr>
            <tr>
          
                <td></td>
                <td></td>
                <td style="text-align: right;">Sub Total</td>
                <td>{{$subTotal}}</td>
            </tr>
         
      
          
           
        </tbody>
    </table>
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
            	<table id="example" class="display nowrap" cellspacing="0" width="100%" >
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
            <tr style="text-align: center;">
                
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
@else
  <div class="row" style="margin-bottom: 30%;">
    <div class="span12">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Employee Info</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" style="padding:20px;">
               @if(!$salary_type)
                <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Employee Salary Not Added
                </div>
                <a href="{{route('salary-type')}}" class="btn btn-success" style="margin-bottom: 10px;"><i class="icon-eye-open"></i> Add Salary Type</a>

               @endif
               @if(!$income_tax)
                <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Income Tax Not Added
                </div>
                <a href="{{route('income-tax')}}" class="btn btn-success" style="margin-bottom: 10px;"><i class="icon-eye-open"></i> Add Income Tax</a>

               @endif
               @if(!$leave_pay)
                <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Leave pay deduction Not Added
                </div>
                <a href="{{route('leave-pay')}}" class="btn btn-success" style="margin-bottom: 10px;"><i class="icon-eye-open"></i> Leave Pay Deduction</a>
               @endif
               @if(!$overtimes)
                <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                  Overtime Pay Not Added
                </div>
                <a href="{{route('overtime-pay')}}" class="btn btn-success" style="margin-bottom: 10px;"><i class="icon-eye-open"></i> Overtime Pay</a>

               @endif
            </div>
         </div>
    </div>
</div>
@endif

@section('scripts')

<script type="text/javascript">
   $("#payroll-show").hide();
   $("#print-payroll").click(function() {
       printDiv();
   });

   function printDiv() 
{

  var divToPrint=document.getElementById('payroll-print');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><style>td{border:1px solid #000;}</style><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
	$(document).ready(function() {
     $('#calculateBtn').click(function() {
        $("#payroll-show").show();
     });
    $('#example').DataTable( {
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