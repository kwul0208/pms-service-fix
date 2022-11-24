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

        <table class="table" id="table-add-task">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Project</th>
              <th scope="col">Status</th>
              <th scope="col">Assigned to</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              <form action="{{ url('task/store') }}" method="POST">
                  @csrf
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">
                    <input type="text" name="name"  class="form-control" placeholder="Title"/>
                    <br />
                  <textarea name="description"  class="form-control" placeholder="Description" ></textarea>
                  </th>
                  <th scope="col"> <select name="project_id" data-placeholder="Choose a Project..." class="chosen-select" tabindex="2"> 
                      <option></option>
                  @foreach ($projects as $project )
                      <option value="{{ $project->id }}">{{ $project->name }}</option>
                  @endforeach    
                  </select></th>
                  <th scope="col">                
                      <select name="status" class="form-control">
                        <option selected  value="not_started">Not Started</option>
                        <option  name="status">Ongoing</option>
                        <option  value="done">Done</option>
                      </select>
  
                      <br>
                      <label>Start Date</label>
                      <input type="date" name="start_date" >
                      <br>
                      <label>Due Date</label>
                      <input type="date" name="due_date" >
                  </br>
  
                      
  
                        
                  </th>
                  <th scope="col">
                    <select required name="employees_id[]" data-placeholder="Choose a team member..." class="chosen-select" multiple tabindex="4">
                      <option value=""></option>
                     @foreach ($employees as $employees_id => $employees_fullname )
                     <option value="{{ $employees_id }}">{{ $employees_fullname }}</option>
                     @endforeach
                    </select>
  
                    <br>
                      <br>
                      
                      <select name="category" data-placeholder="Category" class="chosen-select">
                        <option value=""></option>
                        <option value="new_feature">New Feature</option>
                        <option value="improve_feature">Improve Feature</option>
                        <option value="fixing_bug_error">Fixing Bug Error</option>
                        <option value="other">Other</option>
                      </select>
                      
                  </th>
                  <th scope="col"><input type="submit" value="Add"  class="btn btn-success form-control"></th>
                </tr>
  
                <input type="hidden" name="redirect" value="{{ url()->current() }}">
              </form>
          </tbody>
        </table>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Project</th>
            <th scope="col">Status</th>
            <th scope="col">Assigned to</th>
            <th scope="col">Timespent</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach ($tasks as $key => $task )
              
         
          <tr>
            <th scope="row">{{ $key + 1 }}.</th>
            <td>{{ $task->task_name }}
              @if($task->description)
              <br>
             <i> {{ $task->description }}</i>
              @endif
            </td>
            <td>
                @if($task->project_id)
                    {{  $task->project->name }}
                @endif
            </td>
            <td style="text-transform:capitalize">{{ preg_replace( array('/_/'), array(' '), $task->status)  }}
                
<!--
                    @if($task->status=='ongoing')
                    <br>
                        Start : {{ $task->working_start_date }}
                    @endif

                    @if($task->status=='done')
                    <br>
                        Start : {{ $task->working_start_date }}
                        <br>
                        
                        Finish : {{ $task->working_finish_date }}
                    @endif
-->
            </td>
            
            <td>
              
            @foreach ($task->assignedTo  as  $assignedTo)
                {{ $assignedTo->employees->fullname }} <br>
            @endforeach
          
            </td>
            <td>
              @foreach ($task->assignedTo  as  $assignedTo)
              {{ substr($assignedTo->employees->fullname,0,1) }} : {{ $task->timespentPerTeam($task->id, $assignedTo->employees->id) }}
               <br>
           @endforeach

           Total   {{ $task->timespent($task->id) }}
            </td>
            <td><a href="{{ url('task/'.$task->id) }}"><Button class="btn btn-danger">Detail</Button></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
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
</script>
@endsection
