<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function staff(){
        return $this->belongsTo(User::class,'user_id','id');
    }


    public function leaveType(){
        return $this->belongsTo(LeaveType::class,'leave_type_id','id');
    }
}
