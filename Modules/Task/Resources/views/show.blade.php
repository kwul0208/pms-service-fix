@extends('layouts.layout')

@section('content')


<link rel="stylesheet" href="{{  url('assets/chosen_v1.8.7/') }}/docsupport/prism.css">
<link rel="stylesheet" href="{{  url('assets/chosen_v1.8.7/') }}/chosen.css">

  <!-- Main Content -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">
        <div class="post-preview">
          <a href="post.html">
           
            <h3 class="post-subtitle">
                Task Index
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 24, 2019</p>
        </div>

        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

              <li class="nav-item  ">
                <a class="nav-link" href="{{ url('task/index/all#heading') }}">All</span></a>
              </li>
              @foreach ($employees as $key=> $employee )
                
              
              <li class="nav-item  
              <?php 

              if( Request::segment(4) == $key){ 
                ?>
active
                <?php 
              } ?>
              ">
                <a class="nav-link" href="{{ url('task/index/'.$status.'/'.$key) }}">{{ $employee }}</span></a>
              </li>
           
              @endforeach
            
            </ul>
            
          </div>
        </nav>
        <br>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item 
              <?php if($status =='not_started'){ ?>
              active
              <?php } ?>
              ">
                <a class="nav-link" href="{{ url('task/index/not_started/'.Request::segment(4) .'#heading') }}">Not Started</span></a>
              </li>
              <li class="nav-item
              <?php if($status =='ongoing'){ ?>
                active
                <?php } ?>
              ">
                <a class="nav-link" href="{{ url('task/index/ongoing/'.Request::segment(4).'#heading') }}">Ongoing</a>
              </li>
              <li class="nav-item
              <?php if($status =='done'){ ?>
                active
                <?php } ?>
              ">
                <a class="nav-link" href="{{ url('task/index/done/'.Request::segment(4) .'#heading') }}">Done</a>
              </li>
            
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
<br>
     
        <div class="pull-right">
            <a href="{{ url('task/create') }}" >
                <button type="button" class="btn btn-success btn-add-task">Create New</button>
            </a>
        </div>

        <div>
          <table class="table">
            <tr>
                <td width="200">Task Name</td>
                <td width="20">:</td>
                <td>{{ $task->task_name }}</td>
            </tr>
            <tr>
              <td>Description</td>
              <td>:</td>
              <td>{{ $task->description }}</td>
          </tr>
          <tr>
            <td>Category</td>
            <td>:</td>
            <td>{{ $task->category }}</td>
         </tr>
         <tr>
          <td>Status</td>
          <td>:</td>
          <td>{{ $task->status }}</td>
       </tr>
       <tr>
          <td>Start Date</td>
          <td>:</td>
          <td>{{ $task->start_date }}</td>
       </tr>
       <tr>
        <td>Due Date</td>
        <td>:</td>
        <td>{{ $task->start_date }}</td>
     </tr>
     <tr>
      <td>Working Start Date</td>
      <td>:</td>
      <td>{{ $task->working_start_date }}</td>
   </tr>
    <tr>
      <td>Working Finish Date</td>
      <td>:</td>
      <td>{{ $task->working_finish_date }}</td>
    </tr>
    <tr>
      <td>Created Date</td>
      <td>:</td>
      <td>{{ $task->created_at }}</td>
    </tr>
    <tr>
      <td>Created By</td>
      <td>:</td>
      <td>{{ $task->created_by_fullname }}</td>
    </tr>

    <tr>
      <td>Assigned to</td>
      <td>:</td>
      <td>
          @foreach ($task->assignedTo as $assignedTo)
           <div> {{   $assignedTo->employees->fullname }} </div>
          @endforeach
      </td>
    </tr>
        </table>
        </div>
       
        <h1>Timespent xx</h1>

        @foreach ($task->assignedTo as $assignedTo)
        <div>
        <h4> {{   $assignedTo->employees->fullname }} : {{  $task->timespentPerTeam($task->id, $assignedTo->employees_id)  }} </h4>
        <button class="btn btn-toggle">Toggle</button>
        <table class="table">
          <thead>
          <tr>
            <th width="10">No</th>
            <th width="200">Date</th>
            <th>Timestart</th>
            <th>Timefinish</th>
            <th>timeduration</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($task->taskDoing($task->id, $assignedTo->employees_id) as $key => $timesheet)
          <tr>
            <td>{{ $key + 1 }}.</td>
            <td>{{ $timesheet->date }}<d>
            <td>{{ $timesheet->timestart }}</td>
            <td>{{ $timesheet->timefinish }}</td>
            <td>{{  gmdate("H:i:s", $timesheet->timeduration) }}</td>
            <td>{!!  $timesheet->description !!}</td>
          </tr>
          @endforeach
          <tr>
            <td></td>
          </tr>
        </tbody>
        </table>
      </div>
        @endforeach
    </div>
    </div>
  </div>
</div>

<script src="{{  url('assets/chosen_v1.8.7/') }}/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="{{  url('assets/chosen_v1.8.7/') }}/chosen.jquery.js" type="text/javascript"></script>
<script src="{{  url('assets/chosen_v1.8.7/') }}/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="{{  url('assets/chosen_v1.8.7/') }}/docsupport/init.js" type="text/javascript" charset="utf-8"></script>

<script>

    
  $('#table-add-task').hide();
  // btn add task
  $('.btn-add-task').click(function(e){
    e.preventDefault();
    
    $('#table-add-task').show();
  })

  $('.btn-cancel').click(function(e){
    e.preventDefault();
    
    $('#table-add-task').hide();
  })

 
  $('.btn-toggle').each(function(){
    $(this).click(function(){
      $(this).parent().find('table').slideToggle();
    })
  })
 
</script>
@endsection
