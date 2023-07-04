<?php

namespace Modules\Project\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $connection = "mysql";
    protected $fillable = [];

    protected $table = "project";
    protected $primarykey = "id";

    public function pic()
    {
        return $this->belongsTo('App\Models\Employees', 'pic_employees_id', 'id');
    }
}
