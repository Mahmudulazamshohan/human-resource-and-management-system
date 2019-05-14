<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>{{$title}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<meta name="apple-mobile-web-app-capable" content="yes">
{{-- <link rel="shortcut icon" href="#" type="image/x-icon"> --}}
<link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/css/bootstrap-responsive.min.css') }}" rel="stylesheet">

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="{{ asset('public/css/font-awesome.css') }}" rel="stylesheet">

<link href="{{ asset('public/css/pages/dashboard.css') }}" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
{{-- <link rel="stylesheet" type="text/css" href="http://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.css"> --}}
<link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('public/css/jquery-ui.min.css') }}" rel="stylesheet">


</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner" >
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="#"><img src="{{asset('storage/app/'.$sts->website_logo)}}" alt="" style="max-width: 100%;height:25px;" /> </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
             
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{route('profile')}}">Profile</a></li>
              <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
             </form>
            </ul>
          </li>
        </ul>
        <form class="navbar-search pull-right" action="search" method="GET">
          <input type="text" class="search-query" placeholder="Search" name="search" style="background:#fff;">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="{{route('dashboard')}}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li><a href="{{route('departments')}}"><i class="icon-briefcase"></i><span>Departments</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>Employee</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{route('employee-list')}}">Employee List</a></li>
              <li><a href="{{route('add-employee')}}">Add Employee</a></li>
              <li><a href="{{route('add-attendances')}}">Attendances</a></li>
              <li><a href="{{route('leave-type')}}">Leave Type</a></li>
              <li><a href="{{route('add-absences')}}">Absences</a></li>
              <li><a href="{{route('staff-scheduling')}}">Scheduling Classes</a></li>
       

            </ul>
          </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-gift"></i><span>Rewards</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{route('rewards')}}">New Reward</a></li>
              <li><a href="{{route('calendar')}}">Calendar</a></li>
              
            </ul>
          </li>
         <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-credit-card"></i><span>Payroll</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{route('salary-type')}}">Salary Type</a></li>
              <li><a href="{{route('income-tax')}}">Add Income Tax </a></li>
              <li><a href="{{route('leave-pay')}}">Leave Pay deduction </a></li>
              <li><a href="{{route('overtime-pay')}}">Overtime Pay </a></li>
              <li><a href="{{route('salary-structure')}}">Salary Structure</a></li>
              <li><a href="{{route('performance-bonus')}}">Performance Bonus</a></li>
            </ul>
          </li>
        <li>          
          <a href="{{route('leaves')}}">
            <i class="icon-table"></i>
            <span>Leaves</span>
          </a>                    
        </li>  
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-money"></i><span>Expense</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{route('travel-expenses')}}">Travel expenses</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-bullhorn"></i><span>Announcement</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{route('announcement')}}">New Announcement</a></li>
            </ul>
          </li>
         <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-ban-circle"></i><span>Records</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{route('violation-record')}}">Violation Records</a></li>
            </ul>
          </li>  
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-certificate"></i><span>Insurances</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{route('health-insurances')}}">Health Insurances</a></li>
           
            
          </ul>
        </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-cogs"></i><span>General Setting</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{route('setting')}}">Application Setting</a></li>
            
            
          </ul>
        </li>

       
        
        
      </ul>
        
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>

<div class="main">
  <div class="main-inner">
    <div class="container">
       @if($errors->any()) 
         @foreach($errors->all() as $e)
        <div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{$e}}
        </div>
        @endforeach
       @endif
      @if(session()->has('message'))
       @if(session()->has('type') && session()->get('type') ==='success')

       <div class="alert alert-success">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session()->get('message')}}
        </div>

        @elseif(session()->has('type') && session()->get('type') ==='danger')

        <div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session()->get('message')}}
        </div>

        @endif
      @endif
      @yield('body')
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<div class="extra">
  <div class="extra-inner">
    <div class="container">
      <div class="row">
                    <div class="span3">
                       {{--  <h4>
                            Section1</h4>
                        <ul>
                            @for($i=1;$i<5;$i++)
                            <li><a href="javascript:;">demo{{$i}}</a></li>
                            @endfor
                        </ul> --}}
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                       {{--  <h4>
                                Section2</h4>
                        <ul>
                            <li><a href="">Content demo </a></li>
                            <li><a href="">Content demo</a></li>
                            <li><a href="">Content demo</a></li>
                            <li><a href="">Content demo</a></li>
                        </ul> --}}
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        {{-- <h4>
                                Section3</h4>
                        <ul>
                                <li><a href="">Content demo</a></li>
                                <li><a href="">Content demo</a></li>
                                <li><a href="">Content demo</a></li>
                                <li><a href="">Content demo</a></li>
                        </ul> --}}
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        {{-- <h4>
                                Section4</h4>
                        <ul>
                            <li><a href="">Content demo</a></li>
                            <li><a href="">Content demo</a></li>
                            <li><a href="">Content demo</a></li>
                            <li><a href="">Content demo</a></li>
                        </ul> --}}
                    </div>
                    <!-- /span3 -->
                </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /extra-inner --> 
</div>
<!-- /extra -->
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; {{date('Y')}} <a href="#">{{$sts->website_name}}</a> </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="{{ asset('public/js/jquery-1.7.2.min.js') }}"></script> 

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="http://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="http://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="http://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ asset('public/js/jquery-ui.min.js') }}"></script> 
@yield('scripts')
<script src="{{ asset('public/js/excanvas.min.js') }}"></script> 
<script src="{{ asset('public/js/chart.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('public/js/bootstrap.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('public/js/full-calendar/fullcalendar.min.js') }}"></script>
 
<script src="{{ asset('public/js/base.js') }}"></script> 
@yield('scripts2')
</body>
</html>
