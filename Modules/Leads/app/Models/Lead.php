<?php

namespace Modules\Leads\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    function agent()  {
        return $this->belongsTo(Agent::class,'agent_id');
    }
    function project()  {
        return $this->belongsTo(Project::class,'project_id');
    }
    function compaign()  {
        return $this->belongsTo(Compaign::class,'compaign_id');
    }
}
