@extends('layouts.layout')

@section('content')


<link rel="stylesheet" href="{{ url('assets/calendar/jquery-ui.css') }}">


  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">

        <div class="post-preview">
          <a href="{{url('project')}}">
           
            <h3 class="post-subtitle">
              Timesheet Team
            </h3>
          </a>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
  
                
                @foreach ($employees as $key=> $employee )
                  
                
                <li class="nav-item  
                <?php 
  
                if( Request::segment(4) == $key){ 
                  ?>
  active
                  <?php 
                } ?>
                ">
                  <a class="nav-link" href="{{ url('team/timesheet/index/'.$key.'/'.date('Y-m-d')) }}">{{ $employee }}</span></a>
                </li>
             
                @endforeach
              
              </ul>
              
            </div>
          </nav>
          <br>
               

<br>
<div align="center">
<div id="datepicker"></div>
<div>Date : <span id="date"></span></div>
</div>
<div id="timesheet">
<h1>Timesheet</h1>


<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Timestart</th>
            <th>Timefinish</th>
            <th>Project</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php $key=1; ?>
        @foreach ($timesheets as $timesheet )
            
        
        <tr>
            <td>{{ $key++ }}.</td>
            <td>{{ $timesheet->date }}</td>
            <td>{{ @$timesheet->timestart }}</td>
            <td>{{ @$timesheet->timefinish }}</td>
            <td>{{ @$timesheet->project->title }}</td>
            <td>{!! @$timesheet->description !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>  
  
  </div>
</div>

    @yield('script')
   

    <script src="{{ url('assets/calendar/jquery-1.12.4.js') }}"></script>
<script src="{{ url('assets/calendar/jquery-ui.js') }}"></script>
<script>
$( function() {

    var employees_id = '{{ Request::segment(4)}}';
    $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd",
      
        onSelect: function (date) {
            var url = '{{ url("timesheet/browse") }}/'+employees_id+'/'+date;
            $('#date').text(date);
            // alert(url);
            $('#timesheet').load(url);
        }
    });
} );
</script>
@endsection

