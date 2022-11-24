<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;

class TaskAssignedTo extends Model
{
    protected $fillable   = [];
    protected $table      = "task_assigned_to";
    protected $primarykey = "id";
    public $timestamps    = FALSE;

    public function employees()
    {
      
         return $this->hasOne('App\Models\Employees', 'id', 'employees_id');
      
    }

    public function task_employees()
    {
      
         return $this->belongsTo('App\Models\Employees', 'employees_id',  'id');
      
    }
}
