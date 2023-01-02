<?php

namespace Modules\Project\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ProjectTimesheet;
use Illuminate\Routing\Controller;
use Modules\Project\Entities\Project;

use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource. x
     * @return Renderable
     */
    public function index(Request $request)
    {
        $page = 'Project';
        $employeesId = $request->user_id;
        if ($employeesId=='105') {
            $projects  = Project::leftJoin('task', 'task.project_id', '=', 'project.id')
                            ->leftJoin('task_doing', 'task.id', '=', 'task_doing.task_id')
                            ->leftJoin('net_hrd.employees', 'task_doing.employees_id', '=', 'employees.id')->orderBy('task_doing.created_at', 'DESC')
                            ->groupBy('project.id')
                            ->select('project.id', 'project.name', 'project.description', 'task_doing.created_at AS last_update', 'employees.fullname AS update_by')->paginate();
        }else{
            $projects  = Project::select('project.*')
                        ->join('task_assigned_to', 'project.id', '=', 'task_assigned_to.project_id')
                        ->where('task_assigned_to.employees_id',$employeesId )->groupBy('project.id')
                        ->orderBy('name')->paginate(10);
        }
        return response([
            'status' => 200,
            'data' => compact('projects', 'page')
        ]);
        // return view('project::index', compact('projects', 'page'));
    }

    public function all(Request $request)
    {
        $employeesId = $request->user_id;

        $projects  = Project::select('project.id', 'project.name')
                        ->join('task_assigned_to', 'project.id', '=', 'task_assigned_to.project_id')
                        ->where('task_assigned_to.employees_id',$employeesId )->groupBy('project.id')
                        ->orderBy('name')->get();
        return response([
            'status' => 200,
            'data' => $projects
        ]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'created_start_date' => 'required',
            'employees_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 422,
                'message' => $validator->errors()->first()
            ]);
        }

        try {
            $project = new Project;
            $employeesId = $request->employees_id;

            $project->name = $request->name;
            $project->description = $request->description;
            $project->created_start_date = $request->created_start_date;
            $project->created_by = $employeesId;
            $project->created_at = date('Y-m-d H:i:s');

            $project->save();
            $project_id = $project->id;

            //insert ke project timesheet
            $projectTimesheet = new ProjectTimesheet;
            $projectTimesheet->title = $request->name;
            $projectTimesheet->description = $request->description;
            $projectTimesheet->created_date = date('Y-m-d H:i:s');
            $projectTimesheet->start_date = $request->created_start_date;
            $projectTimesheet->status_date = date('Y-m-d H:i:s');
            $projectTimesheet->created_by = $employeesId;
            $projectTimesheet->it_project_management_id = $project_id;
            $projectTimesheet->save();

            $projectTimesheetId = $projectTimesheet->id;

            $project = Project::find($project_id);
            $project->project_timesheet_id = $projectTimesheetId;
            $project->save();

            return response([
                'status' => 200,
                'message' => 'sucess'
            ]);

        } catch (\Throwable $th) {
            \Log::error($th);
            return  response()->json([
                'status' => 402,
                'message' => "failed! something wrong",
                'error' => $th->getMessage(),
                'line' => $th->getLine(),
                'data' => []
            ]);
        }
 
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $project = Project::find($id);

        return response([
            'status' => 200,
            'data' => $project
        ]);
        
        // return view('project::show', compact('project'));
    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    { 

            Project::where(['id'=> $id])->delete();

            return response([
                'status' => 200
            ]);

    }
}
