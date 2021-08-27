<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LeaveState;
class LeaveStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state1 = LeaveState::create([
            'name' => 'Active'
        ]);
        $state2 = LeaveState::create([
            'name' => 'Inactive'
        ]);

        $state3 = LeaveState::create([
            'name' => 'Expired'
        ]);
    }
}
