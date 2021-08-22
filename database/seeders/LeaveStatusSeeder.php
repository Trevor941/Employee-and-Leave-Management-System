<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LeaveStatus;

class LeaveStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status1 = LeaveStatus::create([
            'name'=>'Pending'
        ]);
        $status2 = LeaveStatus::create([
            'name'=>'Approved'
        ]);
        $status3 = LeaveStatus::create([
            'name'=>'Rejected'
        ]);
    }
}
