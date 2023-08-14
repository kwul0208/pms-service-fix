<?php

namespace Modules\Teams\Entities;

use App\Models\Employees;
use Illuminate\Database\Eloquent\Model;

class TeamsModel extends Model
{
    protected $fillable = [];
    protected $table = 'team';
    protected $guarded = [];

    public function employee(){
        return $this->hasOne(Employees::class, 'id', 'employees_id');
    }
}
