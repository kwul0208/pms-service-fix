<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimesheetProject extends Model
{
    use HasFactory;
    protected $table = "net_muc.timesheet_project";
    protected $primarykey = "id";
    public $timestamps   = FALSE;
}
