<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
        'StartingDate',
        'EndingDate',
        'leave_statuses_id',
        'user_id',
        'leave_states_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function leaveStatus(){
        return $this->belongsTo(LeaveStatus::class, 'leave_statuses_id');
    }

    public function leaveState(){
        return $this->belongsTo(LeaveState::class, 'leave_states_id');
    }
}
