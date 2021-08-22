<?php

namespace Database\Seeders;
use App\Models\MaritalStatus;
use Illuminate\Database\Seeder;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status1 = MaritalStatus::create([
            'status'=> 'Single'
        ]);
        $status2 = MaritalStatus::create([
            'status'=> 'Married'
        ]);
        $status1 = MaritalStatus::create([
            'status'=> 'Divorced'
        ]);
        $status1 = MaritalStatus::create([
            'status'=> 'Widowed'
        ]);
    }
}
