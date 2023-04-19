@extends('layouts.app1')

@section('content')
<div class="container-fluid">

    <div class = 'row p-bar'>
      <div class="progress-box">
        <div class="wrapper-pb row col-sm-12 col-md-12 col-lg-12">
          <div class="col-sm-3 col-md-3 col-lg-3">
          <div class="c100 p{{intval($planning)}} blue">
              <span>{{intval($planning)}}% <p class = "subt">Appointment</p> </span>
              <div class="slice {{-- col-sm-3 col-md-3 col-lg-3 --}}">
                <div class="bar"></div>
                <div class="fill"></div>
              </div>
          </div></div>
          
          <div class="col-sm-3 col-md-3 col-lg-3">
          <div class="c100 p{{intval($medication)}} pink">
              <span>{{intval($medication)}}% <p class = "subt">Medication</p></span>
              <div class="slice {{-- col-sm-3 col-md-3 col-lg-3 --}}">
                <div class="bar"></div>
                <div class="fill"></div>
              </div>
          </div></div>

          <div class="col-sm-3 col-md-3 col-lg-3">
          <div class="c100 p{{intval($treatment)}} green">
              <span>{{intval($treatment)}}% <p class = "subt">Treatment</p> </span>
              <div class="slice {{-- col-sm-3 col-md-3 col-lg-3 --}}">
                <div class="bar"></div>
                <div class="fill"></div>
              </div>
          </div></div>

          <div class="col-sm-3 col-md-3 col-lg-3">
          <div class="c100 p{{intval($care)}} orange">
              <span>{{intval($care)}}% <p class = "subt">Care</p></span>
              <div class="slice {{-- col-sm-3 col-md-3 col-lg-3 --}}">
                <div class="bar"></div>
                <div class="fill"></div>
              </div>
          </div></div>

        </div>
      </div>
    </div>
    <br>
    <div class = 'row'>
        <div class = "col-sm-6 col-md-6 col-lg-6 task-table2 table-responsive x-content">
          <h3 class = 'text-center'>Upcoming Appointment</h3><hr><br>
          <table class="table table-bordered table-hover table-sm {{-- table-responsive  --}}x-content"  id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th>Date</th>
                <th>Appointment</th>
                <th class="text-center">Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($appointments as $appointment)
              <?php
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                    $startTimeStamp = strtotime(date("Y-m-d"));
                    $endTimeStamp = strtotime($appointment->appointment_date);

                    $timeDiff = $endTimeStamp - $startTimeStamp;

                    $numberDays = $timeDiff/86400;  

                    $numberDays = intval($numberDays);
                    $appointment->days = $numberDays;
                    $appointment->save();
                  ?>
              <tr>
                <td>{{$appointment->appointment_date}}</td>
                <td>
                  @if($numberDays == 0)
                    <span style = font-weight:bold;>{{$appointment->appointment}}</span>&nbsp; <span class="badge badge-pill badge-success">Today</span>
                  @elseif($numberDays == 1) 
                  <span style = font-weight:bold;>{{$appointment->appointment}}</span>&nbsp; <span class="badge badge-pill badge-info">Tomorrow</span>
                  @else
                  {{$appointment->appointment}}
                  @endif
                  </td>
                  <td class = 'text-center'>
                    <form action="/appointment/{{$appointment->id}}/complete" method="post">
                      @method('PATCH')
                      @csrf 
                      @if($appointment->completed == 0)
                        <button class = 'btn btn-status' type="submit" id="completed" name = 'completed' onclick="/* this.form.submit() */return checkAttended()" data-toggle="tooltip" data-placement="bottom" title="Click to change status"><span class = 'badge badge-danger'>Unattended</span> </button>                      
                      @endif
                    </form>
                      @if($appointment->completed == 1)
                        <a class = 'btn btn-status1' id="completed" name = 'completed'><span class = 'badge badge-success'>Attended</span> </a>
                      @endif
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  
        <div class = "col-sm-6 col-md-6 col-lg-6 task-table2 table-responsive x-content">
          <h3 class = 'text-center'>Overdue Task</h3><hr><br>
          <table class="table table-bordered table-hover table-sm"  id="dataTable1" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th class="text-center">Overdue</th>
                <th>Task</th>
                <th class="text-center">Deadline</th>
              </tr>
            </thead>
            <tbody>

              @foreach($overdue_tasks as $task)
                <?php
                  date_default_timezone_set("Asia/Kuala_Lumpur");
                  $startTimeStamp = strtotime(date("Y-m-d"));
                  $endTimeStamp = strtotime($task->deadline);

                  $timeDiff = $endTimeStamp - $startTimeStamp;

                  $numberDays = $timeDiff/86400;
                  $late = $numberDays- (2*$numberDays);
                  $numberDays = intval($numberDays);
                  
                  $task->days = $numberDays;
                  $task->save();
      
                ?>
                                  
                  <tr>
                      <td class="text-center">
                        @if($late >=1 && $late<=5)
                          <span style="color:#ffcc00;padding-left:10px; padding-right:10px;"><b>{{$late}}
                            @if($late==1)
                              Day
                            @elseif($late > 1)
                              Days</b></span>
                            @endif
                        @elseif($late > 5)
                          <span class = 'text-danger' style="padding-left:10px; padding-right:10px;"><b>{{$late}}
                            @if($late==1)
                            Day
                          @elseif($late > 1)
                            Days</b></span>&nbsp;<span class = "badge badge-danger">!</span>
                          @endif
                        @endif
                       
                      </b></td>
                      <td>{{$task->task_name}}</td>
                      <td class = 'text-center'>{{$task->deadline}}</td>
                  </tr>
                  @endforeach
            </tbody>
          </table>
        </div>
  
      </div>

      <div class = 'row'>
        <div class = "col-sm-6 col-md-6 col-lg-6 task-table2 table-responsive x-content" >
          <h3 class = 'text-center'>Prescription Reminder&nbsp;<span class="badge badge-pill badge-warning">{{$all}}</span> </h3><hr><br>
              @foreach($medications_noti as $medication)
                  <?php
                  date_default_timezone_set("Asia/Kuala_Lumpur");
                  $startTimeStamp = strtotime(date("Y-m-d"));
                  $endTimeStamp = strtotime($medication->date_stop);

                  $timeDiff = $endTimeStamp - $startTimeStamp;

                  $numberDays = $timeDiff/86400;  
                  
                  $numberDays = intval($numberDays);
                  $medication->countdown = $numberDays;
                  $medication->save();

                  $date=date('M d, Y', $startTimeStamp);
                  
                ?>
              @if($medication->countdown == 7)
              <div class = "alert alert-info">
                <i class = 'fas fa-bell'></i>&nbsp;<strong><small>[{{$date}}]</small>: &nbsp; <mark><span class = "notification">{{$medication->medication}}</span></mark></strong>
                
                <dl>
                  <dd>Last consume date will be on <span class = "badge badge-warning">{{$medication->date_stop}}</span></dd> 
                  <dd><small>Don't forget to prescribe your medicine</small></dd>
                </dl>
                
              </div>
              @endif

              @if($medication->countdown == 3)
              <div class = "alert alert-warning">
                <i class = 'fas fa-bell'></i>&nbsp;<strong><small>[{{$date}}]</small>: &nbsp; <mark><span class = "notification">{{$medication->medication}}</span></mark></strong>
                
                <dl>
                  <dd>Last consume date will be on <span class = "badge badge-warning">{{$medication->date_stop}}</span></dd> 
                  <dd><small>Don't forget to prescribe your medicine</small></dd>
                </dl>
                
              </div>
              @endif

              @if($medication->countdown == 1)
              <div class = "alert alert-danger">
                <i class = 'fas fa-bell'></i>&nbsp;<strong><small>[{{$date}}]</small>: &nbsp; <mark><span class = "notification">{{$medication->medication}}</span></mark></strong>
                
                <dl>
                  <dd>Last consume date will be on <span class = "badge badge-warning">{{$medication->date_stop}}</span><small>(Tomorrow)</small></dd>
                  <dd><small>Don't forget to prescribe your medicine</small></dd>
                </dl>
                
              </div>
              @endif

                
            @endforeach
            
         
        </div>
        
        <div class = "col-sm-6 col-md-6 col-lg-6 task-table2 table-responsive x-content">
          <h3 class = 'text-center'>Upcoming Deadline</h3><hr><br>
          <table class="table table-hover table-sm"  id="dataTable2" width="100%" cellspacing="0">
            <thead class="thead-light">
              <tr>
                <th class="text-center">Deadline</th>
                <th>Task</th>
              </tr>
            </thead>
            <tbody>
                @foreach($upcoming_tasks as $task)
                  <?php
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                    $startTimeStamp = strtotime(date("Y-m-d"));
                    $endTimeStamp = strtotime($task->deadline);

                    $timeDiff = $endTimeStamp - $startTimeStamp;

                    $numberDays = $timeDiff/86400;  

                    $numberDays = intval($numberDays);
                    $task->days = $numberDays;
                    $task->save();
                  ?>
                
                    <tr>
                        <td class = 'text-center'>
                          @if($numberDays == 0)
                            <span style = font-weight:bold;>{{$task->deadline}}</span>
                          @else
                            {{$task->deadline}}
                          @endif
                        </td>

                        <td>
                            <form action="/task/{{$task->id}}" method="POST">
                              @method('PATCH')
                              @csrf

                              <label for="completed{{$task->id}}"  class = 'checkbox {{$task->completed ? 'is-complete' : ''}}'>
                                <input type="checkbox" id="completed{{$task->id}}" name="completed" onchange="this.form.submit()" {{$task->completed ? 'checked' : ''}}> &nbsp;
                                @if($numberDays == 0)
                                <span style = font-weight:bold;>{{$task->task_name}}</span>&nbsp; <span class="badge badge-pill badge-success">Today</span>
                                @else 
                                  {{$task->task_name}}
                                @endif
                              </label>
                            </form>
                        </td>
                    </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  
      </div>
</div>


<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{asset('js/min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('js/dTable.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap4.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datatables.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/moment.js')}}"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
  $(document).ready(function(){

    let all = $("#all").attr("value");
    
    for($x = 1; $x < all+1; $x++){
        let id = "#sd"+$x;
        let id2 = "#mn"+$x;
        let ntitle = "notiTitle"+$x;
        let nbody = "notiBody"+$x;
        
        let medName = $(id2).attr("value");

        let stopDate = $(id).attr("value");
        let stopM = moment(stopDate).format('ll');
        let stop = moment(stopDate).subtract(6, 'days');
        let now = moment().utc();

        let days = now.diff(stop, 'days');

        let formattedStopDate = stop.format('ll');
        
        let todaysDate = now.format('ll');
        
        if(days == 0 && formattedStopDate == todaysDate){
          
          let notificationTitle = "Reminder["+formattedStopDate+"] ";
          let notificationBody = medName+"'s end date is on "+stopM;
          document.getElementById(ntitle).append(notificationTitle);
          document.getElementById(nbody).append(notificationBody);
          
        }
    }
      
  });
  </script> --}}
<script>
  //PROGRESS BAR
</script>

<script language="JavaScript" type="text/javascript">
  function checkAttended(){
      return confirm('[STATUS UPDATE CONFIRMATION]\n\nOnce confirmed, status cannot be changed back. \nDo you want to proceed?');
  };
</script>

<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
  </script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });

    $(function(){
      var $ppc = $('.progress-pie-chart'),
        percent = parseInt($ppc.data('percent')),
        deg = 360*percent/100;
      if (percent > 50) {
        $ppc.addClass('gt-50');
      }
      $('.ppc-progress-fill').css('transform','rotate('+ deg +'deg)');
      $('.ppc-percents span').html(percent+'%');
    });
</script>

{{-- PROGRESS BAR --}}
<script type="text/javascript">
    let step = 'step1';

    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const step3 = document.getElementById('step3');
    const step4 = document.getElementById('step4');

    function next() {
      if (step === 'step1') {
      step = 'step2';
      step1.classList.remove("is-active");
      step1.classList.add("is-complete");
      step2.classList.add("is-active");
      } 
      else if (step === 'step2') {
        step = 'step3';
        step2.classList.remove("is-active");
        step2.classList.add("is-complete");
        step3.classList.add("is-active");
                        
      } 
      else if (step === 'step3') {
        step = 'step4d';
        step3.classList.remove("is-active");
        step3.classList.add("is-complete");
        step4.classList.add("is-active");

      } 
      else if (step === 'step4d') {
        step = 'complete';
        step4.classList.remove("is-active");
        step4.classList.add("is-complete");

      } 
      else if (step === 'complete') {
        step = 'step1';
        step4.classList.remove("is-complete");
        step3.classList.remove("is-complete");
        step2.classList.remove("is-complete");
        step1.classList.remove("is-complete");
        step1.classList.add("is-active");
      }
    }
</script>

@endsection

