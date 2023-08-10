<?php

namespace Modules\Server\Entities;

use App\Models\Employees;
use Illuminate\Database\Eloquent\Model;

class ServerEmployeeModel extends Model
{
    protected $table = 'server_employees';
    protected $guarded = [];

    function employees_detail(){
        return $this->hasOne(Employees::class, 'id', 'employees_id');

    }
}
