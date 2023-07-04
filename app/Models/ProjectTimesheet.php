<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTimesheet extends Model
{
    use HasFactory;
    public $connection = "muc";
    protected $table = "net_muc.project";
    protected $primarykey = "id";
    public $timestamps   = FALSE;
}
