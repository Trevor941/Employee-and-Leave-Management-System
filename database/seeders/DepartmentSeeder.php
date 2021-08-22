<?php

namespace Database\Seeders;
use App\Models\Department;

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department1 = Department::create([
            'name'=>'I.T'
        ]);
        $department2 = Department::create([
            'name'=>'Accounts'
        ]);
        $department3 = Department::create([
            'name'=>'Administration'
        ]);
        $department4 = Department::create([
            'name'=>'Purchasing'
        ]);
    }
}
