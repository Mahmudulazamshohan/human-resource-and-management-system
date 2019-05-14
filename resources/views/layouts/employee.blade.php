<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>{{$title}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="shortcut icon" href="http://hrm.bdtask.com/hrm_v_2/Demo/assets/img/icons/2017-04-03/m.png" type="image/x-icon">
<link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/css/bootstrap-responsive.min.css') }}" rel="stylesheet">

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="{{ asset('public/css/font-awesome.css') }}" rel="stylesheet">

<link href="{{ asset('public/css/pages/dashboard.css') }}" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="http://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.css">
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
                            class="icon-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('employee/profile') }}">Profile</a></li>
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
        <li>
          <a href="{{route('employee/dashboard')}}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> 
        </li>
         <li>
          <a href="{{route('employee/attendance')}}"><i class="icon-ok-circle"></i><span>Attendances</span> </a> 
        </li>
        <li>
          <a href="{{route('employee/leaves')}}"><i class=" icon-remove-circle"></i><span>Leaves</span> </a> 
        </li>
         <li>
          <a href="{{route('employee/rewards')}}"><i class="icon-gift"></i><span>Awards</span> </a> 
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

<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; {{date('Y')}} <a href="#">{{$sts->website_name}}</a>. </div>
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
