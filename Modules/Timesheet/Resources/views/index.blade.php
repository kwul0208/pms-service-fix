@extends('layouts.layout')

@section('content')


<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">

        <div class="post-preview">
          <a href="{{url('project')}}">
           
            <h3 class="post-subtitle">
              Timesheet
            </h3>
          </a>
        </div>

               

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
            <td>{{ $timesheet->timestart }}</td>
            <td>{{ $timesheet->timefinish }}</td>
            <td>{{ @$timesheet->project->title }}</td>
            <td>{!! $timesheet->description !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>  
  
  </div>
</div>


@endsection

