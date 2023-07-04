<?php

namespace Modules\Sprint\Entities;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    public $connection = "mysql";
    protected $fillable = [];
    protected $table = 'sprint';
    public $timestamps =false;
}
