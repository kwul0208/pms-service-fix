 <!-- <link href="{{ url('assets/Rapid') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('assets/Rapid') }}/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 --> 
<h1>Timesheet</h1>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Timestart</th>
            <th>Timefinish</th>
            <th>Project</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php $key=1; ?>
        @foreach ($timesheets as $timesheet )
            
        
        <tr>
            <td>{{ $key++ }}.</td>
            <td>{{ $timesheet->date }}</td>
            <td>{{ $timesheet->timestart }}</td>
            <td>{{ $timesheet->timefinish }}</td>
            <td>{{ @$timesheet->project->title }}</td>
            <td>{!! nl2br($timesheet->description) !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>