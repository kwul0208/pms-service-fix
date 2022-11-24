@extends('layouts.layout')

@section('content')

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">
        <div class="post-preview">
          <a href="post.html">
           
            <h3 class="post-subtitle">
                Project Index
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 24, 2019</p>
        </div>

        <div class="pull-right">
            <a href="{{ url('project/create') }}" >
                <button type="button" class="btn btn-success">Create New</button>
            </a>
        </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($projects as $key => $project )
              
         
          <tr>
            <th scope="row">{{ $key + 1 }}.</th>
            <td>{{ $project->name }}</td>
            <td>{{ $project->description }}</td>
            <td><a href="{{ url('project/'.$project->id) }}"><Button class="btn btn-danger">Detail</Button></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
  </div>
</div>
@endsection
