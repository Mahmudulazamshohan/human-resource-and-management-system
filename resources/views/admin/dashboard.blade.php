@extends('layouts.admin')
@section('body')
<div class="row">
        <div class="span6">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Today's Stats</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <h6 class="bigstats">Daily Info </h6>
                  <div id="big_stats" class="cf">
                    <div class="stat"> <i class="icon-group"></i> <span class="value">{{$total_employee}}</span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon-briefcase"></i> <span class="value">
                      {{$departments}}
                    </span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon-gift"></i> <span class="value">{{$rewards}}</span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon-bullhorn"></i> <span class="value">{{$announcement}}</span> </div>
                    <!-- .stat --> 
                  </div>
                </div>
                <!-- /widget-content --> 
                
              </div>
            </div>
          </div>
          <!-- /widget -->
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Recent News</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div id='calendar'>
              </div>
            </div>
            <!-- /widget-content --> 
          </div>
         
        </div>
        <!-- /span6 -->
        <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Important Shortcuts</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 
                <a href="{{route('salary-structure')}}" class="shortcut"><i class="shortcut-icon icon-credit-card"></i><span
                                        class="shortcut-label">Salary Structure</span> </a><a href="javascript:;" class="shortcut"><i
                                            class="shortcut-icon icon-table"></i><span class="shortcut-label">Leaves</span> </a><a href="{{route('travel-expenses')}}" class="shortcut"><i class="shortcut-icon icon-money"></i> <span class="shortcut-label">Expenses</span> </a><a href="{{route('setting')}}" class="shortcut"> <i class="shortcut-icon icon-cogs"></i><span class="shortcut-label">Setting</span> </a><a href="{{route('employee-list')}}" class="shortcut"><i class="shortcut-icon icon-user"></i><span
                                                class="shortcut-label">Users</span> </a><a href="{{route('rewards')}}" class="shortcut"><i
                                                    class="shortcut-icon icon-gift"></i><span class="shortcut-label">Rewards</span> </a><a href="{{route('announcement')}}" class="shortcut"><i class="shortcut-icon icon-bullhorn"></i> <span class="shortcut-label">Announcement</span> </a><a href="{{route('health-insurances')}}" class="shortcut"> <i class="shortcut-icon icon-certificate"></i><span class="shortcut-label">Health Insurances</span> </a> </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          <div class="widget">
            <div class="widget-header"> <i class="icon-signal"></i>
              <h3> Staff Schedule</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <canvas id="area-chart" class="chart-holder" height="250" width="538"> </canvas>
              <!-- /area-chart --> 
            </div>
            <!-- /widget-content --> 
          </div>
           <!-- /widget -->
          <div class="widget">
            <div class="widget-header"> <i class="icon-file"></i>
              <h3> Announcement</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <ul class="messages_layout">
                @foreach($an as $a)
                <li class="from_user left"> <a href="#" class="avatar">
                 

                </a>
                  <div class="message_wrap"> <span class="arrow"></span>
                    <div class="info"> <a class="name">{{$a->title}}</a> <span class="time">{{$a->updated_at}}</span>
                      <div class="options_arrow">
                        <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
                          <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                            <li><a href="{{route('edit-announcement',$a->id)}}"><i class=" icon-share-alt icon-large"></i> Edit</a></li>
                           
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="text"> {{substr($a->description,0,100)}}..... </div>
                  </div>
                </li>
                @endforeach
            
               
              
              </ul>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget --> 
         
         
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
      </div>
      @section('scripts2')
      <script>     
       $.ajax({
        url: '{{route('api-calendar')}}',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
                
                  
              datas(data);          
       
      }});

        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
        
        {
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            data:  [{{$jan}},
                    {{$feb}},
                    {{$mar}},
                    {{$apr}},
                    {{$may}},
                    {{$jun}},
                    {{$jul}}]
        }
      ]

        }

        var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);


        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
        {
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,1)",
            data: [65, 59, 90, 81, 56, 55, 40]
        },
        {
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 96, 27, 100]
        }
      ]

        }    
          
       function datas(e) {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        console.log(new Date(y, m, d+7));
        var calendar = $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
          },
          selectable: false,
          selectHelper: true,
          select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            calendar.fullCalendar('unselect');
          },
          editable: true,
          events: e
        });
      }
      
    </script><!-- /Calendar -->

      @endsection
      @endsection