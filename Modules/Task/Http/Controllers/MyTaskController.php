<?php

namespace Modules\Task\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskDoing;
use App\Models\Employees;
use App\Models\Timesheet;
use Modules\Project\Entities\Project;
use App\Models\TimesheetProject;

class MyTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $status='ongoing')
    {
        date_default_timezone_set('Asia/Jakarta');
        
        $employeesId = $request->session()->get('employeesId') ? $request->session()->get('employeesId'):105;
        
        $tasks = Task::select('task.*','task_assigned_to.*', 'project.*', 'task.description AS task_description')->leftJoin('task_assigned_to', 'task.id', '=', 'task_assigned_to.task_id')
        ->join('project', 'project.id', '=', 'task.project_id')->where('employees_id', $employeesId)
        ->where('status', $status)->get();

        if($status == 'todo')
        {
            $tasks = Task::select('task.*','task_assigned_to.*', 'project.*', 'task.description AS task_description')->leftJoin('task_assigned_to', 'task.id', '=', 'task_assigned_to.task_id')
            ->leftJoin('project', 'project.id', '=', 'task.project_id')->where('employees_id', $employeesId)
            ->whereRaw("(status='ongoing' OR status='not_started')")
            ->get();  
        }else{
            $tasks = Task::select('task.*','task_assigned_to.*', 'project.*', 'task.description AS task_description')->leftJoin('task_assigned_to', 'task.id', '=', 'task_assigned_to.task_id')
            ->leftJoin('project', 'project.id', '=', 'task.project_id')->where('employees_id', $employeesId)
            ->where('status', $status)->get();
        }

        $projects  = Project::select('project.*')->join('task', 'project.id', '=', 'task.project_id')
        ->join('task_assigned_to', 'task.id', '=', 'task_assigned_to.task_id')
        ->where('employees_id', $employeesId)->groupBy('project.id')->orderBy('name')->get();
        $employees = array(
            298 => 'Agus Susanto',
            484 => 'Danti Iswandhari',
            105 => 'Mahrizal',
            500 =>  'Nafsirudin',
            526 => 'Wahyu Nur Cahyo'
         );

        return view('task::mytask.index', compact('employeesId', 'tasks', 'status', 'projects', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('task::mytask.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('task::mytask.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('task::mytask.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    function ajaxCreate(Request $request)
    {

        //print_r($_POST);
       // exit();
       
        $project_id  = $request->project_id;
        $task_id     = $request->task_id;
        $task_name   = $request->task_name;
        $date        = $request->date;
        $timestart   = $request->timestart;
        $timefinish  = $request->timefinish;
        $description = $request->description;
        $status      = $request->status;
        $project_timesheet_id      = $request->project_timesheet_id;
        $input_timesheet = $request->input_timesheet;

        $employees_id = $request->session()->get('employeesId');
        $timeduration = strtotime($timefinish)-strtotime($timestart);
        

        $taskDoing  = new TaskDoing;
        $taskDoing->date        = $date;
        $taskDoing->timestart   = $timestart;
        $taskDoing->timefinish  = $timefinish;
        $taskDoing->description = $description;
        $taskDoing->timeduration = $timeduration;
        $taskDoing->task_id = $task_id;
        $taskDoing->project_id = $project_id;
        $taskDoing->employees_id = $employees_id;
        $taskDoing->created_by   = $employees_id;
        $taskDoing->created_at = date('Y-m-d H:i:s');

        $taskDoing->save();
        
        $description_timesheet =  'Task : '.$task_name;
        if($description)
          $description_timesheet .= '<br/> Description :'.$description;

        // insert to timesheet
        if ($input_timesheet) {
            $timesheet = new Timesheet;
            $timesheet->date  = $date;
            $timesheet->date_input   = date('Y-m-d H:i:s');
            $timesheet->timestart    = $timestart;
            $timesheet->timefinish   = $timefinish;
            $timesheet->timeduration = $timeduration;
            $timesheet->employees_id = $employees_id;
            $timesheet->description  = $description_timesheet;
            $timesheet->tmode_id     = 14;
            $timesheet->input_from   = 'it_project_management';
            $timesheet->project_id   = $project_timesheet_id;

            $timesheet->save();
            $timesheet_id = $timesheet->id;

            //insert to table timesheet_project
            $timesheetProject =  new TimesheetProject;
            $timesheetProject->timesheet_id = $timesheet_id;
            $timesheetProject->project_id = $project_timesheet_id;
            $timesheetProject->save();
        }

        // update task menjadi ongoing
    
        $task = Task::find($task_id);
        $task->status = $status;
        if ($status=='not_started') {
            $task->working_start_date = date('Y-m-d H:i:s');
            $task->status = 'ongoing';
        }

        if ($status=='done') {
            $task->working_finish_date = date('Y-m-d H:i:s');
        }

        $task->save();
        
        echo 'success';
       // return redirect('task/mytask/index/ongoing');

    }

    function test()
    {
        print_r($_POST);
    }
}
