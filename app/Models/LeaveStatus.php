<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveStatus extends Model
{
    use HasFactory;

    public function leave(){
        return $this->hasOne(Leave::class);
    }
}
