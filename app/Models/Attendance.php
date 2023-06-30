<?php

namespace App\Models;

use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function staff(){
        return $this->belongsTo(User::class,'user_id','id');
    } 


    protected static function boot(){
        parent::boot();
        static::saving(function ($attendance)
        {
            $attendance->user_id = Auth::user()->id ?? null;
            if(is_null($attendance->punch_in)){
                $attendance->punch_in = date('Y-m-d H:i:s');
            }
        });
    }

    public function getProductionTimeAttribute(Type $var = null)
    {
        $duration = round((new Carbon($this->punch_in))->diffInMinutes(new Carbon($this->punch_out ?? now())) / 60, 2);
        return $duration > 24 ? "Didn't punch out" : $duration . " hrs";
    }
}
