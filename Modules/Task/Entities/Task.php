<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\Timesheet;
use Modules\Task\Entities\TaskDoing;

class Task extends Model
{
    protected $fillable = [];
    protected $table = "task";
    protected $primarykey = "id";

    public function assignedTo()
    {
     
            return $this->hasMany('Modules\Task\Entities\TaskAssignedTo', 'task_id', 'id');
    
    }

    public function project()
    {
        return $this->belongsTo('Modules\Project\Entities\Project', 'project_id', 'id');
    }

    public  function timespent($task_id)
    {
        $timeduration =  Taskdoing::where('task_id', $task_id)->sum('timeduration');
        return gmdate("H:i:s", $timeduration);
    }

    public static function timespentPerTeam($task_id, $employees_id)
    {
        $timeduration =  Taskdoing::where('task_id', $task_id)->where('employees_id', $employees_id)->sum('timeduration');
        return gmdate("H:i:s", $timeduration);
    }

    function created_by_fullname()
    {
        return $this->belongsTo('App\Models\Employees', 'created_by', 'id');

    }  
    
    public  function timesheet($project_timesheet_id, $employees_id)
    {
           $timeduration =  Timesheet::where('project_id', $project_timesheet_id)->where('employees_id', $employees_id)->orderBy('date', 'DESC')->orderBy('timestart', 'DESC')->get();
        return $timeduration;
    }

    public  function taskDoing($task_id, $employees_id)
    {
           $taskDoing =  TaskDoing::where('task_id', $task_id)->where('employees_id', $employees_id)->orderBy('date', 'DESC')->orderBy('timestart', 'DESC')->get();
        return $taskDoing;
    }

    
}
