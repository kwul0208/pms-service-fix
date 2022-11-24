@extends('layouts.layout')

@section('content')
    <link rel="stylesheet" href="{{ url('assets/chosen_v1.8.7/') }}/docsupport/prism.css">
    <link rel="stylesheet" href="{{ url('assets/chosen_v1.8.7/') }}/chosen.css">

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 ">
                <div class="post-preview">
                    <a href="post.html">

                        <h3 class="post-subtitle" id="heading">
                            Task Index : {{ $status = Request::segment(4) }}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">Start Bootstrap</a>
                        on <?php echo date('d M Y'); ?>
                    </p>
                </div>
                <div class="alert alert-success" role="alert">
                    Great... You did your task well... and it's already insert to timesheet also
                </div>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <!--  <li class="nav-item 
      <?php if($status =='todo'){ ?>
      active
      <?php } ?>
      ">
            <a class="nav-link" href="{{ url('task/mytask/index/todo#heading') }}">To Do</span></a>
          </li>
        -->
                            <li class="nav-item 
      <?php if($status =='not_started'){ ?>
      active
      <?php } ?>
      ">
                                <a class="nav-link" href="{{ url('task/mytask/index/not_started#heading') }}">Not
                                    Started</span></a>
                            </li>
                            <li
                                class="nav-item
      <?php if($status =='ongoing'){ ?>
        active
        <?php } ?>
      ">
                                <a class="nav-link" href="{{ url('task/mytask/index/ongoing#heading') }}">Ongoing</a>
                            </li>
                            <li
                                class="nav-item
      <?php if($status =='done'){ ?>
        active
        <?php } ?>
      ">
                                <a class="nav-link" href="{{ url('task/mytask/index/done#heading') }}">Done</a>
                            </li>

                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>


                <div style="padding-bottom: 20px"></div>
                <button class="btn btn-success btn-add-task">Add Task</button>
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
                                    <input type="text" name="name" class="form-control" placeholder="Title" />
                                    <br />
                                    <textarea name="description" class="form-control" placeholder="Description"></textarea>
                                </th>
                                <th scope="col"> <select name="project_id" data-placeholder="Choose a Project..."
                                        class="chosen-select" tabindex="2">
                                        <option></option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select></th>
                                <th scope="col">
                                    {{ $status }}
                                    <input type="hidden" name="status" readonly="readonly" value="{{ $status }}">
                                    <br>
                                    <br>
                                    <label>Start Date</label>
                                    <input type="date" name="start_date">
                                    <br>
                                    <label>Due Date</label>
                                    <input type="date" name="due_date">
                                    </br>




                                </th>
                                <th scope="col">
                                    <select required name="employees_id[]" data-placeholder="Choose a team member..."
                                        class="chosen-select" multiple tabindex="4">
                                        <option value=""></option>
                                        @foreach ($employees as $employees_id => $employees_fullname)
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
                                <th scope="col"><input type="submit" value="Add"
                                        class="btn btn-success form-control"></th>
                            </tr>

                            <input type="hidden" name="redirect" value="{{ url()->current() }}">
                        </form>
                    </tbody>
                    <tr>
                        <td></td>
                        <td><button class="btn btn-warning btn-cancel">Cancel</button></td>
                        <td colspan="4"></td>
                    </tr>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Project</th>


                            <th scope="col">Status</th>
                            <th scope="col">Timespent</th>
                            <th>Action</th>
                        </tr>


                    </thead>
                    <tbody>


                        @foreach ($tasks as $key => $task)
                            <tr>
                                <th scope="row">{{ $key + 1 }}.</th>
                                <td>{{ $task->task_name }}

                                    @if ($task->task_description)
                                        <br>
                                        <i> {{ $task->description }}</i>
                                    @endif

                                </td>
                                <td>

                                    @if ($task->project_id)
                                        {{ $task->project->name }}
                                    @endif
                                </td>

                                <td style="text-transform:capitalize">
                                    {{ preg_replace(['/_/'], [' '], $task->status) }}

                                </td>
                                <td>
                                    {{ $task->timespentPerTeam($task->task_id, $employeesId) }}
                                </td>
                                <td>

                                    <button class="did-it btn btn-info">Did it</button>
                                    <a href="{{ url('task/' . $task->task_id) }}"><Button
                                            class="btn btn-danger">Detail</Button></a>
                                    <div class="box-form">
                                        <form name="" class="form" action="{{ url('task/mytask/ajaxCreate') }}"
                                            method="POST">
                                            @csrf
                                            <div style="margin-top: 9px"> <input type="date" class="date"
                                                    name="date" value="<?php echo date('Y-m-d'); ?>"> </div>
                                            <div style="margin-top: 9px"> <input type="time" class="timestart"
                                                    name="timestart" value="<?php echo date('H:i'); ?>">
                                                &nbsp;
                                                To <input type="time" name="timefinish" class="timefinish"
                                                    value="<?php echo date('H:i'); ?>"> </div>
                                            <div style="margin-top: 9px">
                                                <textarea name="description" class="" placeholder="Type Description (optional)"></textarea>
                                            </div>
                                            <div style="margin-top: 9px">



                                                Status <select name="status">
                                                    <option value="not_started" <?php if($task->status=='not_started') { ?> selected="selected"
                                                        <?php } ?>>
                                                        Not Started</option>
                                                    <option value="ongoing" <?php if($task->status=='ongoing') { ?> selected="selected"
                                                        <?php } ?>>
                                                        Ongoing</option>
                                                    <option value="done" <?php if($task->status=='done') { ?> selected="selected"
                                                        <?php } ?>>
                                                        Done</option>
                                                </select>
                                            </div>
                                            <div style="margin-top: 9px">
                                                <input type="checkbox" name="input_timesheet" value="1" checked>
                                                Input Timesheet
                                            </div>

                                            <div style="margin-top: 9px"><input name="submit" type="submit"
                                                    value="Submit">
                                                <input type="hidden" name="task_id" value="{{ $task->task_id }}">
                                                <input type="hidden" name="task_name" value="{{ $task->task_name }}">
                                                <input type="hidden" name="project_id" value="{{ $task->project_id }}">
                                                <input type="hidden" name="project_timesheet_id"
                                                    value="{{ $task->project_timesheet_id }}">
                                            </div>

                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-lg-12 col-md-12 ">

                <div id="timesheet">
                    <h3>Timesheet</h3>



                    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
                    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
                    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


                    <div id="datepickerss"></div>

                    <script>
                        $("#datepicker").datepicker();
                    </script>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Time</th>
                                <th>Task</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>

                    </table>

                </div>
            </div>




        </div>
    </div>
    </div>

    <script src="{{ url('assets/chosen_v1.8.7/') }}/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="{{ url('assets/chosen_v1.8.7/') }}/chosen.jquery.js" type="text/javascript"></script>
    <script src="{{ url('assets/chosen_v1.8.7/') }}/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
    <script src="{{ url('assets/chosen_v1.8.7/') }}/docsupport/init.js" type="text/javascript" charset="utf-8"></script>


    <script>
        $('.box-form').hide();

        $('.alert-success').hide();

        // saat klik button mau menyelesaikan
        $('.did-it').click(function() {
            if ($(this).parent().find('.box-form').hide()) {
                $('.box-form').hide();
                $(this).parent().find('.box-form').show();
            }
        })


        $('.timestart').change(function() {

            var timestart = $(this).val();

            $(this).parent().find('.timefinish').val(timestart);
        })

        // saat milih tanggal
        $('input[type="date"]').change(function() {

            var date = $(this).val();
            var employees_id = '{{ Session::get('employeesId') }}';
            var url = '{{ url('timesheet/browse') }}/' + employees_id + '/' + date;
            // alert(url);
            $('#timesheet').load(url);

        })

        // saat submit form
        $('.form').submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            var date = $('.date').val();
            var employees_id = '{{ Session::get('employeesId') }}';
            //alert(data);
            $.ajax({
                url: '{{ url('task/mytask/ajaxCreate') }}',
                type: 'POST',
                data: data,
                error: function() {
                    alert('Ajax Error');

                },
                success: function(datas) {

                    $('.box-form').hide();
                    $('.alert-success').show();
                    //   alert(datas);
                    var url = '{{ url('timesheet/browse') }}/' + employees_id + '/' + date;
                    // alert(url);
                    $('#timesheet').load(url);

                }
            })



        })



        $('#table-add-task').hide();
        // btn add task
        $('.btn-add-task').click(function(e) {
            e.preventDefault();

            $('#table-add-task').show();
        })

        $('.btn-cancel').click(function(e) {
            e.preventDefault();

            $('#table-add-task').hide();
        })
    </script>
@endsection
