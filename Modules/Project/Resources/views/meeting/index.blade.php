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
   <!--   <li class="nav-item">
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
<br>

<h3>Meeting</h3>
        <table class="table">

          <thead>

            
              <tr>
              <th width="10px">No </th>
              <th width="150px">Date </th>
              <th width="300px">Subject </th>
              <th>Description </th>
             
             
            
            </tr>
            
          </thead>

          <tbody>
            @foreach ($meetings as $i => $meeting)
              
            <tr><td>{{ $i  + 1}}. </td>
              <td>{{ $meeting->date }}</td>
           
              <td>{{ $meeting->subject }}</td>

              <td>{!! $meeting->description !!}</td>
          
            
            
             
           
         
            
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

