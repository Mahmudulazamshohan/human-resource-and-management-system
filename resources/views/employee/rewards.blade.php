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
                
                <th>Award Name</th>
                <th>Gift Item</th>
                <th>Cash Price</th>
                
                
                
                
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
           @foreach($rd as $r)
            <tr>
            	
            	<td>{{$r->award_name}}</td>
                <td>{{$r->gift_item}}</td>
                <td>
                	{{$r->cash_price}}
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