<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadComment extends Model
{
    use HasFactory;
    function agent()  {
        return $this->belongsTo(Agent::class,'agent_id');
    }
    function old_agent()  {
        return $this->belongsTo(Agent::class,'old_agent_id');
    }
}
