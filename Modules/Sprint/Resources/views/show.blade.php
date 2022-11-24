@extends('layouts.layout')

@section('content')
 <div class="container">
     <h4>Sprint</h4>
<div>
   <a href="{{ url('sprint/create') }}"> <button class="btn btn-success">Create New</button></a>
</div>


@foreach ($sprints as $sprint)
    <a href="{{ url('sprint/sprinttask/'.$sprint->sprint_id.'/'.$sprint->date) }}"><button class="btn btn-default btn-sm">{{ $sprint->date }}</button></a>
@endforeach
     <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title Sprint</th>
            <th scope="col">Period</th>
            <th scope="col">Goal</th>
            <th scope="col">Action</th>
          </tr>
          </tr>
        </thead>
        <tbody>
          
          @foreach ($sprints as $sprint)
            
         
          <tr>
            <th scope="row">1</th>
            <td> {{ $sprint->title }} </td>
            <td>{{ $sprint->date }}  </td>
            <td>{{ $sprint->description }}</td>
            <td>
              <a href="{{ url('sprint/'.$sprint->id) }}">
                <button class="btn btn-default btn-sm">Detail</button>
              </a>
            </td>
          </tr>
          @endforeach
      
        </tbody>
      </table>
 </div>
 
@endsection