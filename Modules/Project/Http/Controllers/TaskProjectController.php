<?php

namespace Modules\Project\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Task\Entities\Task;
use Modules\Task\Entities\TaskAssignedTo;
use Modules\Project\Entities\Project;


class TaskProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $project_id)
    {
        $tasks = Task::where('project_id', $project_id)->orderBy('start_date','DESC')->orderBy('task_name', 'DESC')->get();
        $project = Project::find($project_id);
        $employees = array(
            298 => 'Agus Susanto',
            484 => 'Danti Iswandhari',
            105 => 'Mahrizal',
            500 =>  'Nafsirudin',
            526 => 'Wahyu Nur Cahyo'
         );
        return view('project::task_project.index', compact('tasks','project_id', 'project', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('project::create');
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
        $task->task_name   = $request->name;
        $task->status      = $request->status;
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

        endforeach;
       

        return redirect('project/task/'.$request->project_id);
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('project::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('project::edit');
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
