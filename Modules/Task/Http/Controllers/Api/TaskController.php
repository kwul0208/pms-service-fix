<?php

namespace Modules\Task\Http\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Task\Entities\Task;
use Illuminate\Routing\Controller;
use Modules\Project\Entities\Project;
use Illuminate\Support\Facades\Validator;
use Modules\Task\Entities\TaskAssignedTo;
use Illuminate\Contracts\Support\Renderable;

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
        // return $request->all();
        $loop = false;
        if($request->employees_id){
            $array_employees_id = $request->employees_id;
            $loop = true;
        }else{
            $array_employees_id = $request->user_id;
        }

        $task = new Task;

        #print_r($_POST);exit();
        $task->task_name = $request->name;
        $task->description = $request->description;
        $task->status  = $request->status;
        $task->project_id  = $request->project_id;
        $task->start_date  =$request->start_date;
        $task->due_date    = $request->due_date;
        $task->category    = $request->category;

        $task->save();
        $task_id = $task->id;

        if ($loop == true) {
            foreach($array_employees_id as $key => $employees_id):

                $taskAssignedTo =  new TaskAssignedTo;
                $taskAssignedTo->task_id = $task_id;
                $taskAssignedTo->project_id = $request->project_id;
                $taskAssignedTo->employees_id = $employees_id;
                $taskAssignedTo->save();
              //   echo $taskAssignedTo->id;
             endforeach;
        }else{
            $taskAssignedTo =  new TaskAssignedTo;
                $taskAssignedTo->task_id = $task_id;
                $taskAssignedTo->project_id = $request->project_id;
                $taskAssignedTo->employees_id = $array_employees_id;
                $taskAssignedTo->save();
        }

        

      return response([
        'status' => 200,
        'data' => $task,
        'task_id' => $task_id
      ]);

       
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request, $id)
    {
     
        $task    = Task::select('task.*', 'project.name', 'project.project_timesheet_id')->leftJoin('project', 'project.id', '=', 'task.project_id')->find($id);
         $status = $task->status;
         $taskAssignedTo = TaskAssignedTo::leftJoin('net_hrd.employees', 'net_hrd.employees.id', '=', 'task_assigned_to.employees_id')->where('task_id', $id)->select('task_assigned_to.employees_id', 'net_hrd.employees.fullname')->get();

         $timesheets = [];
         foreach ($task->taskDoing($id, 500) as $key => $timesheet) {
            array_push($timesheets, $timesheet);
         }

         return response([
            'status' => 200,
            'data' => compact('task', 'taskAssignedTo', 'status', 'timesheets')
         ]);
         
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
        // return $request->employees_id;

        $validator = Validator::make($request->all(), [
            'task_name' => 'required|min:3',
            'category' => 'required'
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 422,
                'message' => $validator->errors()->first()
            ]);
        }

        
        Task::where('id', $id)->update([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'project_id' => $request->project_id,
            'category' => $request->category,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
        ]);

        if ($request->change_assign == true) {
            TaskAssignedTo::where('task_id', $id)->delete();

            foreach($request->employees_id as $key => $employees_id):

                $taskAssignedTo =  new TaskAssignedTo;
                $taskAssignedTo->task_id = $id;
                $taskAssignedTo->project_id = $request->project_id;
                $taskAssignedTo->employees_id = $employees_id;
                $taskAssignedTo->save();
             endforeach;
        }

        return response([
            'status' => 200,
            'message' => 'success'
        ]);
    }

    // update name task
    public function quickUpdate(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'task_name' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 422,
                'message' => $validator->errors()->first()
            ]);
        }

        
        Task::where('id', $id)->update([
            'task_name' => $request->task_name,
        ]);


        return response([
            'status' => 200,
            'message' => 'success'
        ]);
    }

    // update status task
    public function statusUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 422,
                'message' => $validator->errors()->first()
            ]);
        }

        
        Task::where('id', $id)->update([
            'status' => $request->status,
        ]);


        return response([
            'status' => 200,
            'message' => 'success'
        ]);
    }



    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Task::where('id', $id)->delete();
        TaskAssignedTo::where('task_id', $id)->delete();
        return response([
            'status' => 200,
            'message' => 'success'
        ]);
    }
}
