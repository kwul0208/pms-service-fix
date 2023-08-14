<?php

namespace Modules\Server\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectServerModel extends Model
{
    protected $fillable = [];
    protected $table = 'project_server';
    protected $guarded = [];

    public function server(){
        return $this->hasOne(ServerModel::class, 'id', 'server_id');
    }
}
