<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingCormet extends Model
{
    
        use HasFactory;
        protected $table = "cormet.cormet";
        protected $primarykey = "id";
        public $timestamps   = FALSE;
    
    
    
}
