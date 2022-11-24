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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item 
              <?php if($status =='not_started'){ ?>
              active
              <?php } ?>
              ">
                <a class="nav-link" href="{{ url('task/index/not_started/'.Request::segment(4) .'#heading') }}">Timesheet</span></a>
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
