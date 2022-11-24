@extends('layouts.layout')

@section('content')


<link rel="stylesheet" href="{{  url('assets/chosen_v1.8.7/') }}/chosen.css">

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">

        <div class="post-preview">
          <a href="{{url('project')}}">
           
            <h3 class="post-subtitle">
                {{ $project->name }}
            </h3>
          </a>
        </div>

               
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item 

      ">
        <a class="nav-link" href="{{ url('project/'.$project->id) }}">Detail</span></a>
      </li>
      <li class="nav-item
  
      ">
        <a class="nav-link" href="{{ url('project/task/'.$project->id) }}">Task</a>
      </li>
   <!--   <li class="nav-item  ">
        <a class="nav-link" href="{{ url('project/team/'.$project->id) }}">Team</a>
      </li> -->
      <li class="nav-item
   
      ">
        <a class="nav-link" href="{{ url('project/meeting/'.$project->id) }}">Meeting</a>
      </li> 
    
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Status</th>
              <th scope="col">Assigned to</th>
              <th scope="col">Action</th>
            </tr>
           
            </thead>
            <tbody>
                <form action="{{ url('project/taskProject/store') }}" method="POST">
                    @csrf
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">
                    <textarea name="name"  class="form-control" ></textarea>
                    <br>
                    <br>
                    
                    <select name="category" data-placeholder="Category" >
                      <option value=""></option>
                      <option value="new_feature">New Feature</option>
                      <option value="improve_feature">Improve Feature</option>
                      <option value="fixing_bug_error">Fixing Bug Error</option>
                      <option value="other">Other</option>
                    </select>
                    </th>
                   
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

                    


                    </th>
                    <th scope="col"><input type="submit" value="Add"  class="btn btn-success form-control"></th>
                  </tr>
                  <input type="hidden" name="project_id" value="{{ $project_id }}">
                </form>
          </thead>
          <tbody>
        @foreach ($tasks as $key => $task )
                
          
        <tr>
          <th scope="row">{{ $key + 1 }}.</th>
          <td>{{ $task->task_name }}</td>
          <td>{{ $task->status }}</td>
          <td>

            @foreach ($task->assignedTo  as  $assignedTo)
            {{ $assignedTo->employees->fullname }} <br>
@endforeach
          </td>
          <td><a href="{{ url('project/'.$task->id) }}"><Button class="btn btn-danger">Detail</Button></a></td>
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

@endsection

