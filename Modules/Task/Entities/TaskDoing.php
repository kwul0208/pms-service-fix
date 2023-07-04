<?php

namespace Modules\Task\Entities;

use Illuminate\Database\Eloquent\Model;

class TaskDoing extends Model
{
    public $connection = "mysql";
    protected $fillable   = [];
    protected $table      = "task_doing";
    protected $primarykey = "id";
    public $timestamps    = FALSE;

    public function employees()
    {
      
         return $this->hasOne('App\Models\Employees', 'id', 'employees_id');
      
    }

   
}
