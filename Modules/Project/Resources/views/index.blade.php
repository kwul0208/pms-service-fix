@extends('layouts.layout')

@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 mx-auto">
                <div class="post-preview">
                    <a href="javascript:void(0)">
                        <h3 class="post-subtitle">Project Index</h3>
                    </a>
                </div>
              
                @if (Session::get("employeesId") =='105' )
                    	
          
                <div class="pull-right">
                    <a href="{{ url('project/create') }}" >
                        <button type="button" class="btn btn-sm btn-primary">Create New</button>
                    </a>
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">PIC</th>
                            <th scope="col">Last Update At</th>
                            <th scope="col">Last Update By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $key => $project )
                            <tr>
                                <th scope="row">{{ $key + 1 }}.</th>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ @$project->pic->fullname }}</td>
                                <td>{{ $project->last_update }}</td>
                                <td>{{ $project->update_by }}</td>
                                <td>
                                    <a href="{{ url('project/'.$project->id) }}">
                                        <Button class="btn btn-sm btn-info">Detail</Button>
                                    </a>
                                    <a onclick="return confirm('Are you sure want to delete {{ $project->name }}?')" href="{{ url('project/delete/'.$project->id) }}">
                                        <Button class="btn btn-sm btn-danger">Delete</Button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
@endsection
