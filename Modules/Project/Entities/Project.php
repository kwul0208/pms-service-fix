<?php

namespace Modules\Project\Entities;

use App\Models\Employees;
use Illuminate\Database\Eloquent\Model;
use Modules\Server\Entities\ProjectServerModel;
use Modules\Server\Entities\ServerEmployeeModel;
use Modules\Server\Entities\ServerModel;
use Modules\Teams\Entities\TeamsModel;

class Project extends Model
{
    public $connection = "mysql";
    protected $fillable = [];

    protected $table = "project";
    protected $primarykey = "id";

    public function pic()
    {
        return $this->hasOne(Employees::class, 'id', 'pic');
    }

    public function teams()
    {
        return $this->hasMany(TeamsModel::class, 'project_id', 'id');
    }

    public function servers(){
        return $this->hasMany(ProjectServerModel::class, 'project_id', 'id');
    }
}
