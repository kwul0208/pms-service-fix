<?php

namespace Modules\Project\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\ProjectTimesheet;

use Modules\Project\Entities\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
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
                            ->select('project.id', 'project.name', 'project.description', 'task_doing.created_at AS last_update', 'employees.fullname AS update_by')->get();
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
        //
        $project = new Project;
        $employeesId = $request->session()->get('employeesId');

        $project->name = $request->get('name');
        $project->description = $request->get('description');
        $project->created_start_date = $request->get('created_start_date');
        $project->created_by = $employeesId;
        $project->created_at = date('Y-m-d H:i:s');

        $project->save();
        $project_id = $project->id;

        //insert ke project timesheet
        $projectTimesheet = new ProjectTimesheet;
        $projectTimesheet->title = $request->get('name');
        $projectTimesheet->description = $request->get('description');
        $projectTimesheet->created_date = date('Y-m-d H:i:s');
        $projectTimesheet->start_date = $request->get('created_start_date');
        $projectTimesheet->status_date = date('Y-m-d H:i:s');
        $projectTimesheet->created_by = $employeesId;
        $projectTimesheet->it_project_management_id = $project_id;
        $projectTimesheet->save();

        $projectTimesheetId = $projectTimesheet->id;

        $project = Project::find($project_id);
        $project->project_timesheet_id = $projectTimesheetId;
          $project->save();
    

        return redirect('project/'.$project_id);
       // print_r($_POST);
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

        $project = Project::find($id);
        $project_timesheet_id =  $project->project_timesheet_id;

        // hapus project
        $project = Project::find($id);
        $project->delete();

        // hapus project timesheet
        $projectTimesheet = ProjectTimesheet::find($project_timesheet_id);
        $projectTimesheet->delete();

        return redirect('project');
    }
}
