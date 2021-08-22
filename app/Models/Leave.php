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
}
