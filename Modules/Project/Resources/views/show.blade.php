@extends('layouts.layout')

@section('content')

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
                    <th scope="col" width="200px">Name</th>
                    <th scope="col" width="30px">:</th>
                    <th scope="col">{{ $project->name }}</th>
                </tr>
                <tr>
                    <th scope="col">Description</th>
                    <th scope="col">:</th>
                    <td>{{ $project->description }}</td>
                </tr>
                <tr>
                    <th scope="col">Created Start Date</th>
                    <th scope="col">:</th>
                    <td>{{ $project->created_start_date }}</td>
                </tr>
                <tr>
                    <th scope="col">Launching Date</th>
                    <th scope="col">:</th>
                <td>{{ $project->launching_date }}</td>
                </tr>
            </thead>
      </table>
    </div>
    </div>
  </div>
</div>
@endsection
