<?php

namespace Modules\Task\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskAssignedTo;
use Modules\Project\Entities\Project;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($status='all', $employeesId=FALSE)
    {

        if ($status == 'all') {
            $tasks = Task::select('task.*')->orderBy('id', 'DESC')->get();
        }
        else{
            $tasks = Task::select('task.*')->where('status', $status)->orderBy('id', 'DESC')->get(); 
        }

        if($employeesId)
        {
            if ($status == 'all') {
                $tasks = Task::select('task.*')->join('task_assigned_to', 'task.id', '=', 'task_assigned_to.task_id')->where('employees_id', $employeesId)->orderBy('task.id', 'DESC')->get(); 
            }
            else{
                $tasks = Task::select('task.*')->join('task_assigned_to', 'task.id', '=', 'task_assigned_to.task_id')->where('status', $status)->where('employees_id', $employeesId)->orderBy('task.id', 'DESC')->get(); 
            }

            
        }
        $employees = array(
            105 => 'Mahrizal',
            298 => 'Agus Susanto',
            484 => 'Danti Iswandhari', 
            500 =>  'Nafsirudin',
            526 => 'Wahyu Nur Cahyo'
         );
        $projects  = Project::orderBy('name')->get();
        return view('task::index', compact('tasks', 'status', 'projects', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('task::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //

        $task = new Task;
        $array_employees_id = $request->employees_id;

#print_r($_POST);exit();
        $task->task_name = $request->name;
        $task->description = $request->description;
        $task->status  = $request->status;
        $task->project_id  = $request->project_id;
        $task->start_date  = $request->start_date;
        $task->due_date    = $request->due_date;
        $task->category    = $request->category;

        $task->save();
        $task_id = $task->id;

        foreach($array_employees_id as $key => $employees_id):

           $taskAssignedTo =  new TaskAssignedTo;
           $taskAssignedTo->task_id = $task_id;
           $taskAssignedTo->project_id = $request->project_id;
           $taskAssignedTo->employees_id = $employees_id;
           $taskAssignedTo->save();
         //   echo $taskAssignedTo->id;
        endforeach;

        $redirect  = $request->redirect;
       return redirect($redirect);

       
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request, $id)
    {
        $employees = array(
            105 => 'Mahrizal',
            298 => 'Agus Susanto',
            484 => 'Danti Iswandhari',
            
            500 =>  'Nafsirudin',
            526 => 'Wahyu Nur Cahyo'
         );
     
        $task    = Task::find($id);
         $status = $task->status;
         $taskAssignedTo = TaskAssignedTo::where('task_id', $id)->get();
         
        return view('task::show', compact('task', 'taskAssignedTo', 'status', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('task::edit');
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
}
