<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;
    protected $table = "net_muc.timesheet";
    protected $primarykey = "id";
    public $timestamps   = FALSE;

    public function project()
    {
        return $this->belongsTo('App\Models\ProjectTimesheet', 'project_id', 'id');
    }
}
