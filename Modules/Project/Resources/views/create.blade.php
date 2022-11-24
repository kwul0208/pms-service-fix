@extends('layouts.layout')

@section('content')
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto">
            <div class="post-preview">
                <a href="javascript:void(0)">
                    <h3 class="post-subtitle">
                      Create Project
                    </h3>
                </a>
            </div>
            <form method="POST" action="{{  url('project/store') }}">
                {{ csrf_field() }}
                @method('POST')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="name" id="Name" placeholder="Name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Start Project on</label>
                    <input type="date" style="width:300px" name="created_start_date" class="form-control" placeholder="Date">
                </div>
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea class="form-control" id="Description" name="description" placeholder="Description"></textarea>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
