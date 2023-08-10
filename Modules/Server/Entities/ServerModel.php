<?php

namespace Modules\Server\Entities;

use Illuminate\Database\Eloquent\Model;

class ServerModel extends Model
{
    protected $table = 'server';
    protected $guarded = [];

    function employees(){
        return $this->hasMany(ServerEmployeeModel::class, 'server_id');
    }
    
}
