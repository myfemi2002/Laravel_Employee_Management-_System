<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalTracking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function staff(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function goalType(){
        return $this->belongsTo(GoalType::class,'goal_type_id','id');
    }
}

